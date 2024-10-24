<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSC - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="login-body"> <!-- Classe adicionada para o estilo -->
    <div id="login-container"> <!-- ID para o contêiner -->
        <h1>Central de Serviços Compartilhados</h1>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<div class='error-message'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']); // Remove a mensagem após exibi-la
        }
        ?>
        <form action="../Back-End/login.php" method="post">
            <div class="input-group">
                <label for="username">Nome</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn">Entrar</button>
        </form>        
    </div>
</body>
</html>
