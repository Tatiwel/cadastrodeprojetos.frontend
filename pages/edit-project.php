<?php
include '../includes/header.php';
include '../api/project_api.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<p>ID do projeto não fornecido.</p>";
    include '../includes/footer.php';
    exit;
}

$project = api_get("/projects/$id");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'status' => $_POST['status']
    ];
    try {
      api_put("/projects/$id", $data);
      header("Location: home.php?status=success");
      exit;
  } catch (Exception $e) {
      header("Location: home.php?status=error");
      exit;
  }
      header("Location: home.php");
      exit;
}
?>

<h2>Editar Projeto</h2>
<div class="form-container">
  <form method="POST">
  <form method="POST">
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($project['name']) ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="description" class="form-control"><?= htmlspecialchars($project['description']) ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control">
      <option value="Ativo" <?= $project['status'] === 'Ativo' ? 'selected' : '' ?>>Ativo</option>
      <option value="Pausado" <?= $project['status'] === 'Pausado' ? 'selected' : '' ?>>Pausado</option>
      <option value="Finalizado" <?= $project['status'] === 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary me-2">Atualizar</button>
  <a href="home.php" class="btn btn-secondary">Voltar</a>
</form>
  </form>
</div>


<?php include '../includes/footer.php'; ?>
