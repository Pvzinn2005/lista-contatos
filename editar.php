<?php
include 'conexao.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->execute([$id]);
$contato = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    $stmt = $conn->prepare("UPDATE contatos SET nome = ?, telefone = ?, email = ?, endereco = ? WHERE id = ?");
    $stmt->execute([$nome, $telefone, $email, $endereco, $id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
    <link rel="stylesheet" href="./editar.css">
</head>
<body>
    <h1>Editar Contato</h1>
    <form method="POST">
        <label>Nome: <input type="text" name="nome" value="<?= $contato['nome'] ?>" required></label><br>
        <label>Telefone: <input type="text" name="telefone" value="<?= $contato['telefone'] ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?= $contato['email'] ?>"></label><br>
        <label>Endereço: <input type="text" name="endereco" value="<?= $contato['endereco'] ?>"></label><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
