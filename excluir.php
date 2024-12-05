<?php
include 'conexao.php';
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM contatos WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
?>
