<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1>Agenda de Contatos</h1>
    <a href="adicionar.php" class="btn">Adicionar Novo Contato</a>
    <!--cria a estrutura de uma tabela -->
    <table>
        <!--thead cabeçalho da tabela criada -->
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexao.php';
            $stmt = $conn->query("SELECT * FROM contatos");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['nome']}</td>
                        <td>{$row['telefone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['endereco']}</td>
                        <td>
                        
                            <a href='visualizar.php?id={$row['id']}'>Visualizar</a> 
                            <a href='editar.php?id={$row['id']}'>Editar</a> 
                            <a href='excluir.php?id={$row['id']}' onclick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>