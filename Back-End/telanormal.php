<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Front-End/index.html");
    exit();
}

// Conectar ao banco de dados
include '../Back-End/db.php';
$usuario_id = $_SESSION['usuario_id'];

// Consultar os chamados do usuário
$sql = "SELECT * FROM chamados WHERE usuario_id = $usuario_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Seus Chamados</title>
</head>
<body>
<h2>Seus Chamados</h2>
<table>
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
      <td><?php echo $row['titulo']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><?php echo $row['data_criacao']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="../Front-End/newcall.html">Abrir Novo Chamado</a>
</body>
</html>
