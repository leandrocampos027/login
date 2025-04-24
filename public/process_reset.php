<?php
session_start();
require_once '../config/database.php';
require_once '../classes/user.php';
require_once '../classes/resetsenha.php';

$db = (new Database())->connect();
$user = new User($db);
$reset = new PasswordReset($db);

$token = base64_decode(urldecode($_POST['token'] ?? ''));
$code = $_POST['code'] ?? '';
$newPassword = $_POST['new_password'] ?? '';

if ($reset->validateToken($token, $code)) {
    $email = $reset->getEmailByToken($token);
    if ($reset->updatePassword($email, $newPassword)) {
        $reset->deleteToken($token);
        $_SESSION['success'] = "Senha alterada com sucesso! Faça o login.";
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['error'] = "Erro ao atualizar a senha.";
    }
} else {
    $_SESSION['error'] = "Token ou código inválido ou expirado.";
}

header("Location: reset_password.php?token=" . urlencode(base64_encode($token)));
exit;
