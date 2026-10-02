<?php
require_once "../infra/conexao.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    die("Brinquedo não encontrado.");
}

$id = $_GET["id"];
$sql = "DELETE FROM brinquedos WHERE id = ?";
$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    die("Erro ao preparar a exclusão.");
}

mysqli_stmt_bind_param($stmt, "i", $id);

if (!mysqli_stmt_execute($stmt)) {
    die("Erro ao excluir o brinquedo.");
}

mysqli_stmt_close($stmt);

header("Location: ../index.php");
exit;
?>