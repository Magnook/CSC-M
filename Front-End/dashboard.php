<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Chamados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Dashboard de Chamados</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Corpo</th>
                <th>Status</th>
                <th>Prioridade</th>
            </tr>
        </thead>
        <tbody>
            <?php include '../Back-End/fetch_tickets.php'; ?>
        </tbody>
    </table>

    <button onclick="window.location.href='NEWCALL.PHP'">Abrir Novo Chamado</button>
</body>
</html>
