<?php
session_start();
require_once '../config/database.php';
require_once '../classes/user.php';

$db = (new Database())->connect();
$user = new User($db);

if (!$user->isLogged()) {
    header("Location: login.php");
    exit;
}
?>
<h1>Área restrita</h1>
<p>Bem-vindo, <?= $_SESSION['user']; ?>!</p>
<a href="logout.php">Sair</a>
