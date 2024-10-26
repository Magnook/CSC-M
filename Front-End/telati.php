<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo_usuario'] != 'analista') {
    header("Location: ../Front-End/index.html");
    exit();
}

// Conectar ao banco de dados
include '../Back-End/db.php';

// Consultar todos os chamados
$sql = "SELECT * FROM chamados";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Todos os Chamados</title>
</head>
<body>
<h2>Todos os Chamados</h2>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Status</th>
      <th>Usuário</th>
      <th>Data de Criação</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['titulo']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><?php echo $row['usuario_id']; ?></td>
      <td><?php echo $row['data_criacao']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>
