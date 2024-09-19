<?php
include './conexao.php'; // Inclui a conexão com o banco de dados

// Consulta os filmes no banco de dados
$sql = "SELECT * FROM filmes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora de Filmes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Locadora de Filmes</h1>
        <h2>Filmes Disponíveis</h2>

        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Gênero</th>
                    <th>Ano</th>
                    <th>Ação</th>
                    <th>Diretor</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($row['genero']); ?></td>
                            <td><?php echo htmlspecialchars($row['Ano']); ?></td>
                            <td><?php echo htmlspecialchars($row['Diretor']); ?></td>
                            <td>
                                <form action="delete_movie.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhum filme disponível.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2>Adicionar Filme</h2>
        <form action="adicionar_filme.php" method="post">
            <label for="title">Título:</label>
            <input type="Varchar(255)" name="titulo" required><br>

            <label for="genre">Gênero:</label>
            <input type="Varchar(255)" name="genero" required><br>

            <label for="year">Ano:</label>
            <input type="number" name="ano" required><br>

            <label for="year">Diretor:</label>
            <input type="Varchar(255)" name="Diretor" required><br>


            <button type="button">Adicionar Filme</button> </a>

        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
