<?php
// Faz a requisição para a API FastAPI
$api_url = "http://127.0.0.1:8000/projects/projects-status";
$response = @file_get_contents($api_url);
$data = $response ? json_decode($response, true) : [];

$Ativos = $data['Ativo'] ?? 0;
$Pausados = $data['Pausado'] ?? 0;
$Finalizados = $data['Finalizado'] ?? 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Projeto CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/styles/global.css">
  <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage === 'home.php') {
      echo '<link rel="stylesheet" href="../assets/styles/home.css">';
    }
  ?>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <a class="navbar-brand mb-0 h1" href="../pages/home.php">Projeto CRUD</a>
        <div class="status-indicators ms-4">
          <span class="status Ativo">Ativos: <?= $Ativos ?></span>
          <span class="status Pausado">Pausados: <?= $Pausados ?></span>
          <span class="status Finalizado">Finalizados: <?= $Finalizados ?></span>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
