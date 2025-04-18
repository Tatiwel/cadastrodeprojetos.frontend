<?php
include '../includes/header.php';
include '../api/project_api.php';

// Pega o ID da URL (ex: detail.php?id=2)
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<p>ID do projeto não fornecido.</p>";
    include '../includes/footer.php';
    exit;
}

$project = api_get("/projects/$id");

if (!$project) {
    echo "<p>Projeto não encontrado.</p>";
    include '../includes/footer.php';
    exit;
}
?>

<h2>Detalhes do Projeto</h2>

<div class="form-container">
  <form method="POST">
    <div class="card-body">
      <h4 class="card-title mb-3"><?= htmlspecialchars($project['name']) ?></h4>
      <p><strong>ID:</strong> <?= $project['id'] ?></p>
      <p><strong>Descrição:</strong> <?= htmlspecialchars($project['description']) ?: 'Não informada' ?></p>
      <p><strong>Status:</strong>
        <span class="badge bg-<?php
          echo $project['status'] === 'Ativo' ? 'success' :
          ($project['status'] === 'Pausado' ? 'warning' : 'secondary');
        ?>">
          <?= ucfirst($project['status']) ?>
        </span>
      </p>

      <a href="edit-project.php?id=<?= $project['id'] ?>" class="btn btn-warning mt-3">Editar</a>
      <a href="home.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
  </form>
</div>


<?php include '../includes/footer.php'; ?>
