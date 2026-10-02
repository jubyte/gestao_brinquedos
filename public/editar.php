<?php
require_once "../infra/conexao.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    die("Brinquedo não encontrado.");
}

$id = $_GET["id"];
$sql = "SELECT * FROM brinquedos WHERE id = ?";
$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    die("Erro ao consultar o brinquedo.");
}

mysqli_stmt_bind_param($stmt, "i", $id);

if (!mysqli_stmt_execute($stmt)) {
    die("Erro ao buscar o brinquedo.");
}

$resultado = mysqli_stmt_get_result($stmt);
$brinquedo = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt);

if (!$brinquedo) {
    die("Brinquedo não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar brinquedo</title>
</head>

<body>
    <h1>Editar brinquedo</h1>

    <form action="atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= $brinquedo["id"] ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($brinquedo["nome"]) ?>" required>

        <br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?= htmlspecialchars($brinquedo["categoria"]) ?>" required>

        <br><br>

        <label for="faixa_etaria">Faixa etária:</label>
        <input type="text" id="faixa_etaria" name="faixa_etaria" value="<?= htmlspecialchars($brinquedo["faixa_etaria"]) ?>" required>
        
        <br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" min="0" value="<?= $brinquedo["preco"] ?>" required>

        <br><br>

        <label for="quantidade_estoque">Quantidade em estoque:</label>
        <input type="number" id="quantidade_estoque" name="quantidade_estoque" min="0" value="<?= $brinquedo["quantidade_estoque"] ?>" required>

        <br><br>

        <button type="submit">Atualizar</button>
    </form>

    <br>

    <a href="../index.php">Voltar</a>
</body>

</html>