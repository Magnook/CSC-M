<?php
$servername = "localhost"; // Ou o IP do servidor, se não for local
$username = "root"; // Substitua pelo seu usuário do MySQL
$password = "Mag.61754";   // Substitua pela sua senha do MySQL
$dbname = "csc_db";      // Substitua pelo nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}

?>
