<?php
session_start();
include '../Back-End/db.php'; // Conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletando dados do formulário
    $title = $_POST['title']; // Título do chamado
    $servico = $_POST['servico']; // Serviço
    $assunto = $_POST['assunto']; // Corpo do chamado
    $matricula = $_POST['matricula']; // Matrícula do funcionário
    $usuario_id = $_SESSION['usuario_id']; // ID do usuário logado
    $status = 'aberto'; // Status inicial

    // Verificar se um arquivo foi enviado
    $anexo = '';
    if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] == 0) {
        // Lógica para salvar o arquivo
        $anexo = $_FILES['anexo']['name']; // Armazena o nome do arquivo
        // Move o arquivo para um diretório (opcional)
        move_uploaded_file($_FILES['anexo']['tmp_name'], "../uploads/" . $anexo);
    }

    // Preparar a consulta SQL para inserir o chamado
    $query = "INSERT INTO chamados (title, servico, description, status, matricula, usuario_id, anexo) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssiss", $title, $servico, $assunto, $status, $matricula, $usuario_id, $anexo); // Adicionei a descrição

    if ($stmt->execute()) {
        echo "Chamado criado com sucesso!";
    } else {
        echo "Erro ao criar chamado: " . $stmt->error;
    }
}
?>
