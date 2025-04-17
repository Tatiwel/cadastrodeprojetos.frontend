<?php
include '../api/project_api.php';

$id = $_GET['id'] ?? null;
if ($id) {
    api_delete("/projects/$id");
}

header("Location: home.php");
exit;
