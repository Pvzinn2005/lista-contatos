<?php
include 'conexao.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM contatos WHERE id = ?");
    $stmt->execute([$id]);
    $contato = $stmt->fetch();
    if (!$contato) {
        echo "Contato não encontrado.";
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Contato</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Detalhes do Contato</h1>
    <p><strong>Nome:</strong> <?= htmlspecialchars($contato['nome']) ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($contato['telefone']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($contato['email']) ?></p>
    <p><strong>Endereço:</strong> <?= htmlspecialchars($contato['endereco']) ?></p>
    <a href="index.php" class="btn">Voltar</a>
</body>
</html>
