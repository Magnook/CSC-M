<?php
session_start();
$usuario_id = $_SESSION['usuario_id']; // O ID do usuário logado

// Conectar ao banco de dados e buscar os chamados do usuário
// $conn = new mysqli("host", "username", "password", "database");
// $result = $conn->query("SELECT * FROM chamados WHERE usuario_id = $usuario_id");

?>

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
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<a href="abrir_chamado.php">Abrir Novo Chamado</a>
