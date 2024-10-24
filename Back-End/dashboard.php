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
    <title>Dashboard de Chamados</title>
    <link rel="stylesheet" href="../Front-End/styles.css">
</head>
<body id="dashboard-body">
    <div id="dashboard-container">
        <h2 id="dashboard-title">Dashboard de Chamados</h2>
        
        <form method="GET" action="">
            <label for="status">Filtrar por Status:</label>
            <select id="status" name="status">
                <option value="todos">Todos</option>
                <option value="aberto">Abertos</option>
                <option value="fechado">Fechados</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>

        <table id="dashboard-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <button onclick="window.location.href='../Front-End/newcall.php'">Abrir Novo Chamado</button>
    </div>
</body>
</html>
