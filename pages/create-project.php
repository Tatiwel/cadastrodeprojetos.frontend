<?php
include '../includes/header.php';
include '../api/project_api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = ['name' => $_POST['name'], 'description' => $_POST['description'], 'status' => $_POST['status']];
    api_post("/projects", $data);
    header("Location: home.php");
    exit;
}
?>

<h2>Criar Projeto</h2>
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
      <option value="ativo">Ativo</option>
      <option value="pausado">Pausado</option>
      <option value="finalizado">Finalizado</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php include '../includes/footer.php'; ?>
