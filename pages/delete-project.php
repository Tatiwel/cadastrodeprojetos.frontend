<?php
include '../api/project_api.php';

$id = $_GET['id'] ?? null;
if ($id) {
    try {
    api_delete("/projects/$id");
    header("Location: home.php?status=success");
    exit;
} catch (Exception $e) {
    header("Location: home.php?status=error");
    exit;
}
}

header("Location: home.php");
exit;
