<?php

// Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
require_once("PHPMailerAutoload.php");

class MailUtils
{

    protected $host = "smtp.marquesmontagens.com.br"; // smtp.uni5.net
    protected $username = "Marques Montagens";
    protected $email = "contato@marquesmontagens.com.br";
    protected $password = "ctt1290";

    public function sendMail($nome, $email, $assunto, $mensagem)
    {

        // Inicia a classe PHPMailer
        $mail = new PHPMailer();

        // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
        $mail->IsSMTP(); // Define que a mensagem será SMTP
        $mail->Host = $this->host; // Seu endereço de host SMTP
        $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
        $mail->Port = 587; // 465  Porta de comunicação SMTP - Mantenha o valor "587"
        $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
        $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
        $mail->Username = $this->email; // Conta de email existente e ativa em seu domínio
        $mail->Password = $this->password; // Senha da sua conta de email

        // DADOS DO REMETENTE
        $mail->Sender = $this->email; // Conta de email existente e ativa em seu domínio
        $mail->From = $email; // Sua conta de email que será remetente da mensagem
        $mail->FromName = $nome; // Nome da conta de email

        // DADOS DO DESTINATÁRIO
        $mail->AddAddress($this->email, $this->username); // Define qual conta de email receberá a mensagem
        //$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
        //$mail->AddCC('copia@dominio.net'); // Define qual conta de email receberá uma cópia
        //$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta

        // Definição de HTML/codificação
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

        // DEFINIÇÃO DA MENSAGEM
        $mail->Subject = $assunto; // Assunto da mensagem
        $mail->Body = $mensagem; // Texto da mensagem

        // ENVIO DO EMAIL
        $enviado = $mail->Send();

        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();

        // Exibe uma mensagem de resultado do envio (sucesso/erro)
        if ($enviado) {
            return true;
        } else {
            return false;
        }

    }

}