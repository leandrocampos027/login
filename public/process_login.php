<?php
session_start();
require_once '../config/database.php';
require_once '../classes/user.php';

$db = (new Database())->connect();
$user = new User($db);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($user->login($email, $password)) {
    header("Location: dashboard.php");
    exit;
} else {
    $_SESSION['error'] = "E-mail ou senha incorretos!";
    header("Location: login.php");
    exit;
}
