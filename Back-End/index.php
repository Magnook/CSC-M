<?php
session_start();
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome']; 
    $senha = $_POST['senha']; 

    // Prepare e execute a consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nome = ? AND senha = ?");
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $user['id']; // Guardar o ID do usuário
        $_SESSION['tipo_usuario'] = $user['tipo']; // Guardar o tipo de usuário, se aplicável
        header("Location: dashboard.php"); // Redirecionar para o dashboard
        exit();
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>
