<?php
include '../includes/header.php';
include '../api/project_api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = ['name' => $_POST['name'],
  'description' => $_POST['description'],
  'status' => $_POST['status']
];
  try {
  api_post("/projects", $data);
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

<h2>Criar Projeto</h2>
<div class="form-container">
  <form method="POST">
  <form method="POST">
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control">
      <option value="Ativo">Ativo</option>
      <option value="Pausado">Pausado</option>
      <option value="Finalizado">Finalizado</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary me-2">Salvar</button>
  <a href="home.php" class="btn btn-secondary">Voltar</a>
</form>
  </form>
</div>


<?php include '../includes/footer.php'; ?>
