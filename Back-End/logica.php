<?php
session_start();
if (!isset($_SESSION['tipo_usuario'])) {
    header("Location: login.php");
    exit();
}

// Verificar se o tipo de usuário é permitido para essa página
if ($_SESSION['tipo_usuario'] != 'analista_ti') {
    header("Location: dashboard_usuario.php");
    exit();
}
?>
