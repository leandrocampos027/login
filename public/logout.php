<?php
session_start();
require_once '../config/database.php';
require_once '../classes/user.php';

$db = (new Database())->connect();
$user = new User($db);
$user->logout();

header("Location: login.php");
exit;
