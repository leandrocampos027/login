<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

class Mailer {
    public static function sendRecoveryEmail($email, $token, $encodedEmail) {
        $mail = new PHPMailer(true);

        try {
            // Configuração do servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'leandrocampos027@gmail.com'; // Seu Gmail
            $mail->Password   = 'avbz gxfd znjl jaqc';    // Senha de app
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Remetente e destinatário
            $mail->setFrom('leandrocampos027@gmail.com', 'Sistema de Login');
            $mail->addAddress($email);

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Recuperação de Senha';
            $mail->Body = "
                <h2>Recuperação de Senha</h2>
                <p>Você solicitou uma alteração de senha. </p>               
                <p>Clique no link e use o código abaixo para confirmar:</p>
                 <h3>$token</h3>
                <a href='$encodedEmail'>Redefinir Senha</a>
                <br><br>
                <small>Este link expira em 30 minutos.</small>
            ";

            $mail->send();
            return true;

        } catch (Exception $e) {
            // Você pode ativar logs aqui se quiser debug
            return false;
        }
    }
}
