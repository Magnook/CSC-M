<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../Back-End/db.php'; // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $para = $_POST['para'];
    $servico = $_POST['servico'];
    $titulo = $_POST['titulo'];
    $assunto = $_POST['assunto'];
    $matricula = $_POST['matricula'];
    $anexo = $_FILES['anexo']['name'];
    $prioridade = $_POST['priority'];

    // Lógica para fazer upload do anexo, se necessário
    // move_uploaded_file($_FILES['anexo']['tmp_name'], "uploads/" . $anexo);

    // Preparar e executar a inserção no banco de dados
    $stmt = $conn->prepare("INSERT INTO chamados (para, servico, titulo, assunto, matricula, anexo, prioridade) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $para, $servico, $titulo, $assunto, $matricula, $anexo, $prioridade);

    if ($stmt->execute()) {
        echo "Chamado criado com sucesso.";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
