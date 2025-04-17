<?php include '../includes/header.php';
include '../api/project_api.php';

$projects = api_get("/projects");
?>

<h2>Projetos</h2>
<a href="create-project.php" class="btn btn-success mb-3">Criar Novo Projeto</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Status</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($projects as $project): ?>
    <tr>
      <td><?= $project['id'] ?></td>
      <td><?= $project['name'] ?></td>
      <td><?= $project['status'] ?></td>
      <td>
        <a href="project-details.php?id=<?= $project['id'] ?>" class="btn btn-info btn-sm">Detalhes</a>
        <a href="edit-project.php?id=<?= $project['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
        <a href="delete-project.php?id=<?= $project['id'] ?>" class="btn btn-danger btn-sm"
          onclick="return confirm('Deseja deletar este projeto?');">Deletar</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../includes/footer.php'; ?>
