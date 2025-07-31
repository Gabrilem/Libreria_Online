<?php
session_start();

// Verificar si el cliente ha iniciado sesión
if (!isset($_SESSION['id'])) {
    header("Location: login_cliente.php");
    exit();
}

require('PHP/conexion.php');

// Obtener ID del cliente desde la sesión
$id = $_SESSION['id'];

// Consultar los datos del cliente con PDO
$sql = "SELECT * FROM clientes WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$id]);

$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cliente) {
    echo "Error al obtener datos del cliente.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>✏️ Editar datos del cliente</h2>

        <form action="actualizar_cliente.php" method="POST">
            <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

            <div class="mb-3">
                <label>Tipo de Identificación</label>
                <input type="text" name="Tipo_Identificacion" class="form-control" value="<?= $cliente['Tipo_Identificacion'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Número de Identificación</label>
                <input type="text" name="Numero_Identificacion" class="form-control" value="<?= $cliente['Numero_Identificacion'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="<?= $cliente['Nombre'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Apellidos</label>
                <input type="text" name="Apellidos" class="form-control" value="<?= $cliente['Apellidos'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" value="<?= $cliente['Email'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="Telefono" class="form-control" value="<?= $cliente['Telefono'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="Contraseña" class="form-control" value="<?= $cliente['Contraseña'] ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar Cambios</button>
            <a href="index.php" class="btn btn-danger float-end">Volver</a>
        </form>
    </div>
</body>
</html>
