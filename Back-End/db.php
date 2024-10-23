<?php
$host = 'localhost';  // ou o endereço do seu servidor MySQL
$id = 'root';   // seu usuário do MySQL
$password = 'Mag.137580';       // sua senha do MySQL
$dbname = 'csc_db';      // o nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($host, $id, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
