<?php
require_once "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $categoria = trim($_POST["categoria"]);
    $faixa_etaria = trim($_POST["faixa_etaria"]);
    $preco = $_POST["preco"];
    $quantidade_estoque = $_POST["quantidade_estoque"];

    if (empty($nome) || empty($categoria) || empty($faixa_etaria) || $preco < 0 || $quantidade_estoque < 0) {
        die("Preencha os dados corretamente.");
    }

    $sql = "INSERT INTO brinquedos (nome, categoria, faixa_etaria, preco, quantidade_estoque) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if (!$stmt) {
        die("Erro ao preparar o cadastro.");
    }

    mysqli_stmt_bind_param($stmt, "sssdi", $nome, $categoria, $faixa_etaria, $preco, $quantidade_estoque);

    if (!mysqli_stmt_execute($stmt)) {
        die("Erro ao cadastrar o brinquedo."); 
    }

    mysqli_stmt_close($stmt);

    header("Location: ../index.php");
    exit;
}
?>