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
    api_put("/projects/$id", $data);
    header("Location: home.php");
    exit;
}
?>

<h2>Editar Projeto</h2>
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
      <option value="ativo" <?= $project['status'] === 'ativo' ? 'selected' : '' ?>>Ativo</option>
      <option value="pausado" <?= $project['status'] === 'pausado' ? 'selected' : '' ?>>Pausado</option>
      <option value="finalizado" <?= $project['status'] === 'finalizado' ? 'selected' : '' ?>>Finalizado</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<?php include '../includes/footer.php'; ?>
