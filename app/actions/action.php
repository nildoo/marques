<?php

session_start();

$response = (object)['error' => false, 'msg' => null, 'data' => null];

require_once '../../libs/Db.php';
require_once '../../libs/Functions.php';

$Db = new Db();
$Functions = new Functions();

switch ($_POST['action']) {
    case 'contato':

        require_once '../../libs/email/MailUtils.php';
        $MailUtils = new  MailUtils();

        $nome = $_POST['nome'];
        $empresa = $_POST['empresa'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $projeto = $_POST['projeto'];

        $bodymail = '<!doctype>
        <html>
        <head>
            <meta http-equiv="content-Type" content="text/html; charset=UTF-8" />
        </head>
        <body>
        <div style="padding:10px; background: #fff; border-radius: 5px; width: 90%; margin: 10px auto;">
            <fieldset style="border-radius: 5px;">
                <legend>Contato pelo Site</legend>
                <table cellpadding="5" cellspacing="5" style="width: 95%; margin: 2% auto;">
                    <tr>
                        <td style="width:50px; border-bottom: solid 1px #CCCCCC; text-align: right; font-weight:bold; color:#333333;">Nome</td>
                        <td style="border-bottom: solid 1px #CCCCCC;">' . $_POST['nome'] . '</td>
                    </tr>
                    <tr>
                        <td style="width:50px; border-bottom: solid 1px #CCCCCC; text-align: right; font-weight:bold; color:#333333;">Empresa</td>
                        <td style="border-bottom: solid 1px #CCCCCC;">' . $_POST['empresa'] .'</td>
                    </tr>
                    <tr>
                        <td style="width:50px; border-bottom: solid 1px #CCCCCC; text-align: right; font-weight:bold; color:#333333;">E-mail</td>
                        <td style="border-bottom: solid 1px #CCCCCC;">' . $_POST['email'] . '</td>
                    </tr>
                    <tr>
                        <td style="width:50px; border-bottom: solid 1px #CCCCCC; text-align: right; font-weight:bold; color:#333333;">Telefone</td>
                        <td style="border-bottom: solid 1px #CCCCCC;">' . $_POST['telefone'] . '</td>
                    </tr>
                    <tr>
                        <td style="width:150px; border-bottom: solid 1px #CCCCCC; text-align: right; font-weight:bold; color:#333333;">Qual é o seu projeto?</td>
                        <td style="border-bottom: solid 1px #CCCCCC;">' . str_replace("\r\n"," ",trim($_POST['projeto'])) . '</td>
                    </tr>
                </table>
		    </fieldset>
        </div>
    </body>
</html>';

        if ($_POST['email']){
            $MailUtils->sendMail($_POST['nome'], $_POST['email'], 'Contato pelo Site', $bodymail);
        } else {
            $response->error = true;
            $response->msg = "Erro ao enviar mensagem!";
        }

        break;

   //ENVIO RH
   case 'envio-rh':

    /* Valores recebidos do formulário  */
    $arquivo = $_FILES['arquivo'];
    $nome = $_POST['nome'];
    $replyto = $_POST['email']; // Email que será respondido
    $telefone = $_POST['telefone'];
    $comentario = $_POST['mensagem'];
    $assunto = 'Curriculum de ' . $_POST['nome'];

    /* Destinatário e remetente - EDITAR SOMENTE ESTE BLOCO DO CÓDIGO */
    $to = "rhpessoal@marquesmontagens.com.br";
    $remetente = "rhpessoal@marquesmontagens.com.br"; // Deve ser um email válido do domínio

    /* Cabeçalho da mensagem  */
    $boundary = "XYZ-" . date("dmYis") . "-ZYX";
    $headers = "MIME-Version: 1.0\n";
    $headers .= "From: $remetente\n";
    $headers .= "Reply-To: $replyto\n";
    $headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
    $headers .= "$boundary\n";

    /* Layout da mensagem  */
    $corpo_mensagem = " 
    <br>Formulário via site
    <br>--------------------------------------------<br>
    <br><strong>Nome:</strong> $nome
    <br><strong>Email:</strong> $replyto
    <br><strong>Telefone:</strong> $telefone
    <br><strong>Mensagem:</strong> $comentario
    <br><br>--------------------------------------------
    ";

    /* Função que codifica o anexo para poder ser enviado na mensagem  */
    if (file_exists($arquivo["tmp_name"]) and !empty($arquivo)) {

      $fp = fopen($_FILES["arquivo"]["tmp_name"], "rb"); // Abri o arquivo enviado.
      $anexo = fread($fp, filesize($_FILES["arquivo"]["tmp_name"])); // Le o arquivo aberto na linha anterior
      $anexo = base64_encode($anexo); // Codifica os dados com MIME para o e-mail 
      fclose($fp); // Fecha o arquivo aberto anteriormente
      $anexo = chunk_split($anexo); // Divide a variável do arquivo em pequenos pedaços para poder enviar
      $mensagem = "--$boundary\n"; // Nas linhas abaixo possuem os parâmetros de formatação e codificação, juntamente com a inclusão do arquivo anexado no corpo da mensagem
      $mensagem .= "Content-Transfer-Encoding: 8bits\n";
      $mensagem .= "Content-Type: text/html; charset=\"utf-8\"\n\n";
      $mensagem .= "$corpo_mensagem\n";
      $mensagem .= "--$boundary\n";
      $mensagem .= "Content-Type: " . $arquivo["type"] . "\n";
      $mensagem .= "Content-Disposition: attachment; filename=\"" . $arquivo["name"] . "\"\n";
      $mensagem .= "Content-Transfer-Encoding: base64\n\n";
      $mensagem .= "$anexo\n";
      $mensagem .= "--$boundary--\r\n";
    } else // Caso não tenha anexo
    {
      $mensagem = "--$boundary\n";
      $mensagem .= "Content-Transfer-Encoding: 8bits\n";
      $mensagem .= "Content-Type: text/html; charset=\"utf-8\"\n\n";
      $mensagem .= "$corpo_mensagem\n";
    }
    require_once '../../libs/email/MailUtils.php';
    $Mail = new MailUtils();

    /* Função que envia a mensagem  */
   $envio =  mail($to, $assunto, $mensagem, $headers);

    if(!$envio){
      $response->erro = true;
      $response->msg = "Error 01 - Tente novamente mais tarde!";
    }

    break;

}

echo json_encode($response);