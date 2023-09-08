<?php

session_start();

$response = (object)['error' => false, 'msg' => null, 'data' => null];

require_once '../../libs/Db.php';
require_once '../../libs/Functions.php';

$Db = new Db();
$Functions = new Functions();

switch ($_POST['action']) {
    case 'contato':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $_POST['mensagem'];

        $email_headers = implode("\n", array("From: claudio@imoveisemitajaisc.com.br", "Reply-To: $email", "Subject: Contato pelo Site", "Return-Path: claudio@imoveisemitajaisc.com.br", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

        $bodymail = "<!doctype><html><body style=\"background: #000000; padding: 20px 0; text-align: center; font-family: 'Apex New Light', Arial, serif\"><div style=\"width: 500px; margin-bottom: 15px; display: inline-block\"><img src=\"http://www.iversonautomoveis.com.br/app/assets/img/iverson.png\" height=\"62px\" alt=\"Iverson\" style=\"width: 227px; display: inline-block; padding: 10px\"><div style=\"background: #ffffff; padding: 15px; border-radius: 5px; text-align: left\">
<h2 style='margin: 0'>Nome: $nome</h2>
<h2 style='margin: 0'>Email: $email</h2>
<h2 style='margin: 0'>Telefone: $telefone</h2>
<h2 style='margin: 0'>Mensagem: $mensagem</h2>
</div></div></body></html>";

        if (mail('claudio@imoveisemitajaisc.com.br', 'Contato pelo Site', $bodymail, $email_headers)) {
            $response->erro = false;
        } else {
            $response->erro = true;
            $response->msg = "Erro ao enviar contato!";
        }
        break;

    case 'proposta':

        require_once '../../libs/email/MailUtils.php';
        $MailUtils = new MailUtils();

        $Db->setParams([
            'table' => 'veiculo',
            'free_condition' => "id = '{$_POST['id_veiculo']}'"
        ]);
        $r = $Db->result()[0];

        $nome = $r->nome;
        $url = $r->url;
        $ano = $r->ano_modelo;
        $id = $_POST['id_veiculo'];

        $Db->setParams([
            'table' => 'proposta',
            'data' => [
                'id_veiculo' => $_POST['id_veiculo'],
                'nome' => $nome,
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'proposta' => $_POST['mensagem'],
                'lido' => 0
            ]
        ]);

        if ($Db->insert()) {
            $url = "http://www.iversonautomoveis.com.br/veiculo-" . $id . "-" . $url . "-" . $ano;
            //$url = "http://localhost/projetos/iverson/veiculo-" . $id . "-" . $url . "-" . $ano;
            $msg = "Modelo Veículo: <a target='_blank' href='$url'>$nome</a><br><br>Proposta: " . $_POST['mensagem'] . "<br><br> Contato: " . $_POST['telefone'];
            $MailUtils->sendMail($_POST['nome'], $_POST['email'], 'Proposta', $msg);
        } else {
            $response->error = true;
            $response->msg = "Erro ao enviar prosta!";
        }

        break;
}

echo json_encode($response);