<?php

class Db
{

    private $pdo;
    private $conn = [
        'db_host' => 'mysql.marquesmontagens.com.br',
        'db_name' => 'marquesmontage02',
        'db_user' => 'marquesmontage02',
        'db_pass' => 'mydbweb1290'
    ];

    private $params;

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function __construct()
    {

        if ($_SERVER['REMOTE_ADDR'] == '::1') {
            $this->conn['db_host'] = 'localhost';
            $this->conn['db_name'] = 'marques';
            $this->conn['db_user'] = 'root';
            $this->conn['db_pass'] = '';
        }

        $dns = "mysql:host={$this->conn['db_host']};dbname={$this->conn['db_name']}";
        $db_user = $this->conn['db_user'];
        $db_pass = $this->conn['db_pass'];

        try {
            $this->pdo = new PDO($dns, $db_user, $db_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            $this->pdo->prepare("SET NAMES 'utf8'")->execute();
            $this->pdo->prepare('SET character_set_connection=utf8')->execute();
            $this->pdo->prepare('SET character_set_client=utf8')->execute();
            $this->pdo->prepare('SET character_set_results=utf8')->execute();
        } catch (Exception $exception) {
            echo $exception->getMessage();
            die;
        }
    }

    private function prepare($statement)
    {
        return $this->pdo->prepare($statement);
    }

    /* CRUD */

    public function result()
    {

        $sql = "SELECT";
        $condition = false;

        if (key_exists('fields', $this->params)) {
            $sql .= " {$this->params['fields']}";
        } else {
            $sql .= " *";
        }

        if (key_exists('table', $this->params)) {
            $sql .= " FROM {$this->params['table']}";
        } else {
            return "Table is required!";
        }

        if (key_exists('clause', $this->params)) {
            $sql .= " {$this->params['clause']}";
        }

        if (key_exists('free_condition', $this->params)) {

            $condition = $this->params['free_condition'];
            $sql .= " WHERE {$condition}";

        } else {

            if (key_exists('condition', $this->params)) {

                if (count($this->params['condition']) == 1) {

                    $key = key($this->params['condition']);
                    $p = strpos($key, '.');

                    $nick = "";
                    if ($p !== false) {
                        $pieces = explode('.', $key);
                        $key = $pieces[1];
                        $nick = $pieces[0] . '.';
                    }

                    $condition .= "{$nick}{$key} = :{$key}";

                } else {

                    foreach ($this->params['condition'] as $key => $value) {
                        $condition .= "{$key} = :{$key} AND ";
                    }

                    $condition = substr($condition, 0, strlen($condition) - 5);

                }

                $sql .= " WHERE {$condition}";

            }

        }

        if (key_exists('group', $this->params)) {
            if ($this->params['group'] !== '') {
                $sql .= " GROUP BY {$this->params['group']}";
            } else {
                return false;
            }
        }

        if (key_exists('order', $this->params)) {
            if ($this->params['order'] !== '') {
                $sql .= " ORDER BY {$this->params['order']}";
            } else {
                return false;
            }
        }

        if (key_exists('limit', $this->params)) {
            if ($this->params['limit'] !== '') {
                $sql .= " LIMIT {$this->params['limit']}";
            } else {
                return false;
            }
        }

        try {

            $stmt = $this->prepare($sql);
            if ($condition !== false && key_exists('condition', $this->params)) {
                foreach ($this->params['condition'] as $key => $value) {

                    $p = strpos($key, '.');

                    if ($p !== false) {
                        $key = explode('.', $key);
                        $key = $key[1];
                    }

                    $stmt->bindValue(":{$key}", "{$value}");
                }
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $error) {
            return $error->getMessage();
            // return false;
        }
    }

    public function insert()
    {

        if (!key_exists('table', $this->params)) {
            return "Table is required!";
        }

        if (!key_exists('data', $this->params)) {
            return "Data is required!";
        }

        $fields = [];
        $bind = [];

        foreach ($this->params['data'] as $key => $value) {
            array_push($fields, $key);
            array_push($bind, ':' . $key);
        }

        $fields = implode(', ', $fields);
        $bind = implode(', ', $bind);

        $sql = "INSERT INTO {$this->params['table']} ($fields) VALUES ($bind)";

        try {
            $stmt = $this->prepare($sql);
            foreach ($this->params['data'] as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }
            return $stmt->execute();
        } catch (PDOException $error) {
            return $error->getMessage();
            return false;
        }

    }

    public function update()
    {

        if (!key_exists('table', $this->params)) {
            return "Table is required!";
        }

        if (!key_exists('data', $this->params)) {
            return "Data is required!";
        }

        if (!key_exists('condition', $this->params)) {
            return "Condition is required!";
        }

        $sql = "UPDATE {$this->params['table']} SET ";

        $fields_values = "";

        if (count($this->params['data']) == 1) {
            $key = key($this->params['data']);
            $fields_values .= "{$key} = :{$key}";
        } else {
            foreach ($this->params['data'] as $key => $value) {
                $fields_values .= "{$key} = :{$key}, ";
            }
            $fields_values = substr($fields_values, 0, strlen($fields_values) - 2);
        }

        $sql .= $fields_values;

        $condition = "";

        if (count($this->params['condition']) == 1) {
            $key = key($this->params['condition']);
            $condition .= "{$key} = :{$key}";
        } else {
            foreach ($this->params['condition'] as $key => $value) {
                $condition .= "{$key} = :{$key} AND ";
            }
            $condition = substr($condition, 0, strlen($condition) - 5);
        }

        $sql .= " WHERE {$condition}";

        try {
            $stmt = $this->prepare($sql);
            foreach ($this->params['data'] as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }
            foreach ($this->params['condition'] as $key => $value) {
                $stmt->bindValue(":{$key}", "{$value}");
            }
            return $stmt->execute();
        } catch (PDOException $error) {
            // return $error->getMessage();
            return false;
        }
    }

    public function delete()
    {

        if (!key_exists('table', $this->params)) {
            return "Table is required!";
        }

        $sql = "DELETE FROM {$this->params['table']}";

        $condition = "";

        if (count($this->params['condition']) == 1) {
            $key = key($this->params['condition']);
            $condition .= "{$key} = :{$key}";
        } else {
            foreach ($this->params['condition'] as $key => $value) {
                $condition .= "{$key} = :{$key} AND ";
            }
            $condition = substr($condition, 0, strlen($condition) - 5);
        }

        $sql .= " WHERE {$condition}";

        try {
            $stmt = $this->prepare($sql);
            foreach ($this->params['condition'] as $key => $value) {
                $stmt->bindValue(":{$key}", "{$value}");
            }
            return $stmt->execute();
        } catch (PDOException $error) {
            // return $error->getMessage();
            return false;
        }
    }

    public function creteDb($db, $fields)
    {
        $sql = "CREATE TABLE '{$db}' (($fields))";
        try {
            $stmt = $this->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $error) {
            // return $error->getMessage();
            return false;
        }
    }

    public function truncateTable()
    {
        $sql = "TRUNCATE TABLE {$this->params['table']}";
        try {
            $stmt = $this->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $error) {
            // return $error->getMessage();
            return false;
        }
    }

    public function deleteDb($db)
    {
        $sql = "DROP TABLE $db";
        try {
            $stmt = $this->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $error) {
            // return $error->getMessage();
            return false;
        }
    }

}