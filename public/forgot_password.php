<!-- public/forgot_password.php -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Senha</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
  <div class="login-container">
    <h2 class="form-title">Recuperar Senha</h2>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
      <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <form action="process_forgot.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Digite seu e-mail:</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-warning">Enviar link de recuperação</button>
      </div>
    </form>

    <div class="form-link">
      <a href="login.php">Voltar ao login</a>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
