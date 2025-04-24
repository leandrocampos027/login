<?php
session_start();
require_once '../config/database.php';
require_once '../classes/user.php';

$db = (new Database())->connect();
$user = new User($db);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($user->exists($email)) {
    $_SESSION['error'] = "Já existe uma conta com esse e-mail.";
    header("Location: register.php");
    exit;
}

if ($user->register($email, $password)) {
    $_SESSION['success'] = "Conta criada com sucesso! Faça o login.";
    header("Location: register.php");
    exit;
} else {
    $_SESSION['error'] = "Erro ao criar a conta. Tente novamente.";
    header("Location: register.php");
    exit;
}
