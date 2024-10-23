<?php
include 'db.php'; // Incluindo o arquivo de conexão

// Consulta os chamados do banco de dados
$result = $conn->query("SELECT * FROM chamados");

// Verifica se há resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['titulo']}</td>
                <td>{$row['corpo']}</td>
                <td>{$row['status']}</td>
                <td>{$row['prioridade']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhum chamado encontrado.</td></tr>";
}
$conn->close(); // Fecha a conexão
?>
