<?php include '../includes/header.php';
include '../api/project_api.php';

$projects = api_get("/projects");
?>

<?php if (isset($_GET['status'])): ?>
  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    <?php
      if ($_GET['status'] === 'success') {
        echo "Ação realizada com sucesso!";
      } elseif ($_GET['status'] === 'error') {
        echo "Ocorreu um erro ao processar a ação.";
      }
    ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
  </div>
<?php endif; ?>

<script>
  setTimeout(function () {
    let alert = document.querySelector('.alert');
    if (alert) {
      alert.classList.remove('show');
      alert.classList.add('hide');
    }
  }, 4000);
</script>

<h2>Projetos</h2>
<a href="create-project.php" class="btn btn-success mb-3">Criar Novo Projeto</a>

<table class="table table-striped table-bordered table-fit">
  <thead>
    <tr>
      <!-- nova coluna de contador -->
      <th>#</th>

      <th>ID</th>
      <th>Nome</th>
      <th>Status</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <!-- capturamos o índice no foreach -->
    <?php foreach ($projects as $index => $project): ?>
      <tr>
        <!-- exibe o contador (começa em 1) -->
        <td><?= $index + 1 ?></td>

        <!-- colunas já existentes -->
        <td><?= $project['id'] ?></td>
        <td><?= $project['name'] ?></td>
        <td><?= $project['status'] ?></td>
        <td class="col-actions">
          <a href="project-details.php?id=<?= $project['id'] ?>"
            class="btn btn-info btn-sm btn-actions">Detalhes</a>
          <a href="edit-project.php?id=<?= $project['id'] ?>"
            class="btn btn-warning btn-sm btn-actions">Editar</a>
          <a href="delete-project.php?id=<?= $project['id'] ?>"
            class="btn btn-danger btn-sm btn-actions"
            onclick="return confirm('Deseja deletar este projeto?');">
            Deletar
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<?php include '../includes/footer.php'; ?>
