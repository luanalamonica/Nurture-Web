<?php
    include "conexao.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    
    $usuario = $_POST['username'];
    $senha   = $_POST['password1'];
    $retorno;

    $query = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $query = "UPDATE usuario SET senha = ? WHERE email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ss',$senha, $usuario);
        $result = $stmt->execute();
        if ($result) {
            // Exemplo de uso
            $para = $usuario;
            $assunto = 'Mudanca de Senha';
            $mensagem = '<p>Sua senha foi alterada com sucesso.</p>';
            
            $retorno = enviarEmail($para, $assunto, $mensagem);
        }else{
            $retorno = array('success'=>FALSE, 'type'=>'danger', 'msg'=>'Não foi possível alterar a senha!');
        }
    } else {
        $retorno     = array('success'=>FALSE, 'type'=>'danger', 'msg'=>'Usuário não encontrado!');
    }
    die(json_encode($retorno));

    function enviarEmail($para, $assunto, $mensagem) {
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Defina o servidor SMTP para enviar o e-mail
            $mail->SMTPAuth   = true;
            $mail->Username   = 'rafael.ceschim@unesp.br'; // Seu endereço de e-mail SMTP
            $mail->Password   = ''; // Sua senha do SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita a criptografia TLS
            $mail->Port       = 587; // Porta TCP para conexão
    
            // Remetente e destinatários
            $mail->setFrom('rafa.ceschim@gmail.com', 'Nurture');
            $mail->addAddress($para); // Adiciona um destinatário
    
            // Conteúdo do e-mail
            $mail->isHTML(true); // Define o formato de e-mail para HTML
            $mail->Subject = $assunto;
            $mail->Body    = $mensagem;
            $mail->AltBody = strip_tags($mensagem); // Corpo alternativo em texto simples
    
            $mail->send();
            return array('success' => true, 'msg' => 'E-mail enviado com sucesso!');
        } catch (Exception $e) {
            return array('success' => false, 'msg' => "Erro ao enviar e-mail: {$mail->ErrorInfo}");
        }
    }
?>