<?php
// Dados para conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = ""; // Deixe vazio se estiver usando o XAMPP com a configuração padrão
$dbname = "formulario_db"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
