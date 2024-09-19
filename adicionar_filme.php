<?php
require('conexao.php'); // Ajuste o caminho conforme necessário


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];
    $diretor = !empty($_POST['diretor']) ? $_POST['diretor'] : NULL; 

    $stmt = $conn->prepare("INSERT INTO filmes (titulo, genero, ano, diretor) VALUES ($titulo, $genero, $ano, $diretor)");

    if ($stmt) {
        $stmt->bind_param('ssis', $titulo, $genero, $ano, $diretor);
        
        if ($stmt->execute()) {
            echo "Filme adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar filme: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conn->error;
    }

    header('Location: index.php');
    exit();
}




$conn->close();
?>
