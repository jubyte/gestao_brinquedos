<?php
require_once "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = trim($_POST["nome"]);
    $categoria = trim($_POST["categoria"]);
    $faixa_etaria = trim($_POST["faixa_etaria"]);
    $preco = $_POST["preco"];
    $quantidade_estoque = $_POST["quantidade_estoque"];
    
    if (!is_numeric($id) || empty($nome) || empty($categoria) || empty($faixa_etaria) || !is_numeric($preco) || $preco < 0 || !is_numeric($quantidade_estoque) || $quantidade_estoque < 0) {
        die("Preencha os dados corretamente.");
    }

    $sql = "UPDATE brinquedos SET nome = ?, categoria = ?, faixa_etaria = ?, preco = ?, quantidade_estoque = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if (!$stmt) {
        die("Erro ao preparar a atualização.");
    }

    mysqli_stmt_bind_param($stmt, "sssdii", $nome, $categoria, $faixa_etaria, $preco, $quantidade_estoque, $id);

    if (!mysqli_stmt_execute($stmt)) {
        die("Erro ao atualizar o brinquedo.");
    }

    mysqli_stmt_close($stmt);

    header("Location: ../index.php");
    exit;
}
?>