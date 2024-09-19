<?php 


$host = 'localhost';
$user = 'root';
$password = '';
$database = `LocadoraPessoal`;


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>

<!-- 
<a href="usuarios/login.php">Logar</a> -->