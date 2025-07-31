<?php
session_start();

// Asegurar que el usuario haya iniciado sesión como cliente
if (!isset($_SESSION['id'])) {
    header("Location: login_cliente.php");
    exit();
}

require 'PHP/conexion.php'; // Conexión a la base de datos

// Obtener el ID del cliente desde la sesión
$id_cliente = $_SESSION['id'];

// Verificar que se hayan recibido todos los datos del formulario
if (
    !isset($_POST['Tipo_Identificacion']) ||
    !isset($_POST['Numero_Identificacion']) ||
    !isset($_POST['Nombre']) ||
    !isset($_POST['Apellidos']) ||
    !isset($_POST['Email']) ||
    !isset($_POST['Telefono']) ||
    !isset($_POST['Contraseña'])
) {
    die('
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Error en la actualización</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="text-center">
                <div class="alert alert-danger shadow p-5 rounded" role="alert">
                    <h2 class="mb-3">Faltan datos</h2>
                    <p class="fs-5">Por favor completa todos los campos.</p>
                    <a href="perfil_cliente.php" class="btn btn-danger mt-3">Volver</a>
                </div>
            </div>
        </body>
        </html>
    ');
}

// Captura y limpia los datos del formulario
$tipo_ident = $_POST['Tipo_Identificacion'];
$numero = $_POST['Numero_Identificacion'];
$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$email = $_POST['Email'];
$telefono = $_POST['Telefono'];
$contrasena = $_POST['Contraseña']; // Idealmente, deberías encriptar esta contraseña (con password_hash)

// Actualiza en la base de datos
try {
    $sql = "UPDATE clientes SET
                Tipo_Identificacion = ?,
                Numero_Identificacion = ?,
                Nombre = ?,
                Apellidos = ?,
                Email = ?,
                Telefono = ?,
                Contraseña = ?
            WHERE id = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$tipo_ident, $numero, $nombre, $apellidos, $email, $telefono, $contrasena, $id_cliente]);

    // Mensaje de éxito
    echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Actualización Exitosa</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="text-center">
                <div class="alert alert-success shadow p-5 rounded" role="alert">
                    <h2 class="mb-3">¡Actualización Exitosa!</h2>
                    <p class="fs-5">Tus datos han sido actualizados correctamente.</p>
                    <a href="index.php" class="btn btn-primary mt-3">Volver al perfil</a>
                </div>
            </div>
        </body>
        </html>
    ';

} catch (PDOException $e) {
    die("❌ Error al actualizar: " . $e->getMessage());
}
?>
