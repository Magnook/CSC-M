<?php
session_start();
include '../Back-End/db.php'; // Conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletando dados do formulário
    $para = $_POST['para'];
    $servico = $_POST['servico'];
    $title = $_POST['title'];
    $assunto = $_POST['assunto']; // Isso será o corpo do chamado
    $matricula = $_POST['matricula'];
    $status = 'aberto'; // Status inicial
    $usuario_id = $_SESSION['usuario_id']; // ID do usuário logado

    // Verificar se um arquivo foi enviado
    $anexo = '';
    if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] == 0) {
        // Aqui você pode implementar a lógica para salvar o arquivo
        $anexo = $_FILES['anexo']['name']; // Armazena o nome do arquivo
        // Move o arquivo para um diretório (opcional)
        move_uploaded_file($_FILES['anexo']['tmp_name'], "../uploads/" . $anexo);
    }

    // Preparar a consulta SQL para inserir o chamado
    $query = "INSERT INTO chamados (title, servico, assunto, status, matricula, usuario_id, anexo) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssis", $title, $servico, $assunto, $status, $matricula, $usuario_id, $anexo);

    if ($stmt->execute()) {
        echo "Chamado criado com sucesso!";
    } else {
        echo "Erro ao criar chamado: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Chamado</title>
    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>
</head>

<body>
    <h2>Novo Chamado</h2>
    <form action="newcall.php" method="POST" enctype="multipart/form-data">
        <!-- Campo PARA -->
        <label for="para">Para:</label>
        <select id="para" name="para" required>
            <option value="T.I">T.I</option>
            <option value="planejamento">Planejamento</option>
            <option value="coordenacao">Coordenação</option>
            <option value="manutencao">Manutenção</option>
        </select>

        <!-- Campo SERVIÇO -->
        <label for="servico">Serviço:</label>
        <select id="servico" name="servico" required>
            <option value="Teclado">Teclado</option>
            <option value="Perifericos">Periféricos</option>
            <option value="Ar Condicionado">Ar Condicionado</option>
        </select>

        <!-- Campo TÍTULO -->
        <label for="title">Título do Chamado:</label>
        <input type="text" id="title" name="title" required>

        <!-- Campo ASSUNTO (CKEDITOR) -->
        <label for="assunto">Corpo do Chamado:</label>
        <textarea id="assunto" name="assunto" required></textarea>

        <!-- Campo MAT -->
        <label for="matricula">Matrícula do Funcionário:</label>
        <input type="text" id="matricula" name="matricula" required>

        <!-- Campo ANEXO -->
        <label for="anexo">Anexo:</label>
        <input type="file" id="anexo" name="anexo">

        <!-- Campos adicionais como prioridade -->
        <label for="priority">Prioridade:</label>
        <select id="priority" name="priority" required>
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>

        <button type="submit">Abrir Chamado</button>
    </form>

    <!-- Inicializando o CKEditor -->
    <script>
        CKEDITOR.replace('assunto');
    </script>
</body>

</html>