<?php
session_start();
include '../Back-End/db.php'; // Conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['username'];
    $password = $_POST['password'];

    // Preparar e executar a consulta SQL para buscar o usuário
    $query = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id); // "s" significa que o parâmetro é uma string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuário encontrado, agora verificar a senha
        $user = $result->fetch_assoc();
        if (hash('sha256', $password) === $user['senha']) {
            // Senha correta, agora salvar a sessão
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];

            // Redirecionar para a tela do dashboard com base no tipo de usuário
            if ($user['tipo_usuario'] == 'analista_ti') {
                header("Location: telati.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>
