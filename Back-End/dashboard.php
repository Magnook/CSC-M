<?php
session_start();
include '../Back-End/db.php'; // Conexão com o banco de dados

// Verifica o tipo de usuário logado
$usuario_id = $_SESSION['usuario_id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

// Preparar a consulta de acordo com o tipo de usuário
if ($tipo_usuario == 'analista_ti') {
    // T.I: Mostrar todos os chamados
    $query = "SELECT * FROM chamados"; // Você pode adicionar cláusulas WHERE conforme necessário
} else {
    // Supervisores e Coordenadores: Mostrar apenas os chamados do usuário
    $query = "SELECT * FROM chamados WHERE usuario_id = ?";
}

$stmt = $conn->prepare($query);
if ($tipo_usuario != 'analista_ti') {
    $stmt->bind_param("i", $usuario_id); // "i" para integer
}
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Chamados</title>
    <link rel="stylesheet" href="../Front-End/styles.css">
</head>

<body>
<div id="Central">
    <!-- Cabeçalho -->
    <div id="Header">
        <h1 class="CompanyName">
            <a href="#">Central de Serviços</a>
        </h1>
        <div id="Logo"></div>
    </div>

    <!-- Navegação -->
    <div id="Navigation">
        <ul>
            <li><a href="../Front-End/newcall.php" accesskey="n" title="Novo Chamado (n)">Novo Chamado</a></li>
            <li><a href="#" accesskey="m" title="Meus Chamados (m)">Meus Chamados</a></li>
            <li><a href="#" accesskey="p" title="Pesquisar Chamados (p)">Pesquisar Chamados</a></li>
        </ul>
    </div>
</div>

</body>

</html>