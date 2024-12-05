<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexao.php';
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    $stmt = $conn->prepare("INSERT INTO contatos (nome, telefone, email, endereco) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $telefone, $email, $endereco]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Contato</title>
    <link rel="stylesheet" href="./adicionar.css">
</head>
<body>
    <h1>Adicionar Contato</h1>
    <form method="POST">
        <label>Nome: <input type="text" name="nome" required></label><br>
        <label>Telefone: <input type="text" name="telefone" required></label><br>
        <label>Email: <input type="email" name="email"></label><br>
        <label>Endereço: <input type="text" name="endereco"></label><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
