<?php
$host = 'localhost';
$dbname = 'agenda';
$user = 'root';  // Altere conforme seu ambiente
$password = '';  // Altere conforme seu ambiente

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
