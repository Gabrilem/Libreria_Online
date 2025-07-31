<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2>🧑‍💼 Bienvenido, <?= $_SESSION['admin'] ?> </h2>
            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>

        <hr>

        <div class="list-group">
            <a href="consultar.php" class="list-group-item list-group-item-action">
                📋 Ver y gestionar clientes
            </a>
            <a href="admin_productos.php" class="list-group-item list-group-item-action">
                📦 Gestión de productos
            </a>
        </div>
    </div>
</body>
</html>
