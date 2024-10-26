<?php
session_start();
include './db.php'; // Conexão com o banco de dados

// Verifica se o ID do chamado foi passado na URL
if (!isset($_GET['id'])) {
    header('Location: dashboard.php'); // Redireciona se não houver ID
    exit();
}

$chamado_id = $_GET['id'];

// Prepara a consulta para obter os detalhes do chamado
$query = "SELECT * FROM chamados WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $chamado_id); // "i" para integer
$stmt->execute();
$result = $stmt->get_result();

// Verifica se o chamado foi encontrado
if ($result->num_rows > 0) {
    $chamado = $result->fetch_assoc();
} else {
    header('Location: dashboard.php'); // Redireciona se o chamado não for encontrado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Chamado</title>
    <link rel="stylesheet" href="../Front-End/styles.css">
</head>

<body>
    <div id="Central">
        <!-- Cabeçalho -->
        <div id="Header">
            <h1 class="CompanyName">
                <a href="#" class="titulo">Central de Serviços</a>
            </h1>
            <div id="Logo"></div>
        </div>
        <div class="chamado-details">
            <h2>Detalhes do Chamado</h2>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> <?php echo $chamado['id']; ?></p>
                    <p><strong>Título:</strong> <?php echo $chamado['title']; ?></p>
                    <p><strong>Assunto:</strong> <?php echo $chamado['assunto']; ?></p>
                    <p><strong>Data de Criação:</strong> <?php echo $chamado['created_at']; ?></p>
                    <p><strong>Status:</strong> <?php echo $chamado['status']; ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Anexo:</strong> <?php echo $chamado['anexo'] ? $chamado['anexo'] : 'Nenhum anexo'; ?></p>
                    <p><strong>Para:</strong> <?php echo $chamado['para']; ?></p>
                    <p><strong>Prioridade:</strong> <?php echo $chamado['priority']; ?></p>
                    <p><strong>Matrícula:</strong> <?php echo $chamado['matricula']; ?></p>
                </div>
            </div>
            <a href="../Back-End/dashboard.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</body>

</html>