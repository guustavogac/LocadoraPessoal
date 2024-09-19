<?php
include 'db.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Prepara a query SQL para deletar o filme
    $sql = "DELETE FROM filmes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Filme excluído com sucesso!";
    } else {
        echo "Erro ao excluir filme: " . $conn->error;
    }

    // Redireciona para a página principal
    header('Location: index.php');
}

$conn->close();
?>
