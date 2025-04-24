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

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="container">
  <div class="dashboard-container">
    <div class="dashboard-header">
      <h2>Área Restrita</h2>
      <a href="logout.php" class="btn btn-danger">Sair</a>
    </div>

    <p class="welcome">Olá, seja bem-vindo ao seu painel!</p>
    <hr>

    <div class="row">
      <div class="col-md-4">
        <div class="card shadow-sm mb-4">
          <div class="card-body text-center">
            <h5 class="card-title">Perfil</h5>
            <p class="card-text">Veja e edite suas informações.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Acessar</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm mb-4">
          <div class="card-body text-center">
            <h5 class="card-title">Configurações</h5>
            <p class="card-text">Gerencie preferências da conta.</p>
            <a href="#" class="btn btn-outline-secondary btn-sm">Abrir</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm mb-4">
          <div class="card-body text-center">
            <h5 class="card-title">Segurança</h5>
            <p class="card-text">Atualize sua senha ou autenticação.</p>
            <a href="#" class="btn btn-outline-warning btn-sm">Ver mais</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
