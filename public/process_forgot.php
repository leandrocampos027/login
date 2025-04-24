<?php
session_start();
require_once '../config/database.php';
require_once '../classes/user.php';
require_once '../classes/resetsenha.php';
require_once '../classes/mailer.php';

$email = $_POST['email'] ?? '';

if (empty($email)) {
    $_SESSION['error'] = "Por favor, informe seu e-mail.";
    header("Location: forgot_password.php");
    exit;
}

$db = (new Database())->connect();
$user = new User($db);
$reset = new PasswordReset($db);
$mailer = new Mailer();

if (!$user->exists($email)) {
    $_SESSION['error'] = "E-mail não encontrado.";
    header("Location: forgot_password.php");
    exit;
}

// Gerar token e código
$token = bin2hex(random_bytes(16));
$code = rand(100000, 999999); // código de 6 dígitos

// Salvar no banco
$reset->createToken($email, $token, $code);

// Codificar o token na URL
$encodedToken = urlencode(base64_encode($token));

$link = "http://localhost/loginsystem/public/reset_password.php?token=$encodedToken";

if ($mailer->sendRecoveryEmail($email, $code, $link)) {
    $_SESSION['success'] = "Enviamos o link de recuperação para seu e-mail!";
} else {
    $_SESSION['error'] = "Erro ao enviar o e-mail. Tente novamente.";
}

header("Location: forgot_password.php");
exit;
