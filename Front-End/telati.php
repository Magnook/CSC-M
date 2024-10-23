<?php
session_start();

// Conectar ao banco de dados e buscar todos os chamados
// $conn = new mysqli("host", "username", "password", "database");
// $result = $conn->query("SELECT * FROM chamados");

?>

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
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><?php echo $row['usuario_id']; ?></td> <!-- Aqui você pode puxar o nome do usuário em vez do ID -->
      <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
