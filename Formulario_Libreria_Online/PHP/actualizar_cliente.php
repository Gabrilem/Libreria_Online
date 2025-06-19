<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}


require 'conexion2.php'; // Conexión centralizada

// Verificar que se hayan recibido todos los datos
if (
    !isset($_POST['ID_cliente']) ||
    !isset($_POST['Tipo_Identificacion']) ||
    !isset($_POST['Numero_Identificacion']) ||
    !isset($_POST['Nombre']) ||
    !isset($_POST['Apellidos']) ||
    !isset($_POST['Email']) ||
    !isset($_POST['Telefono']) ||
    !isset($_POST['Contraseña'])
) {
    // Mensaje centralizado en la pantalla con mayor estetica
    die('
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <title>Registro exitoso</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="text-center">
                    <div class="alert alert-success shadow p-5 rounded" role="alert">
                        <h2 class="mb-3"> Actualizacion Exitosa </h2>
                        <p class="fs-5"> ! Gracias¡ <strong></strong>.</p>
                        <a href="consultar.php" class="btn btn-primary mt-3">Intentar de nuevo</a>
                    </div>
                </div>
            </body>
            </html>
            ');
}

// Guarda los datos recibidos del formulario
$id = $_POST['ID_cliente'];
$tipo_ident = $_POST['Tipo_Identificacion'];
$numero = $_POST['Numero_Identificacion'];
$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$email = $_POST['Email'];
$telefono = $_POST['Telefono'];
$contrasena = $_POST['Contraseña'];

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
            WHERE ID_cliente = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$tipo_ident, $numero, $nombre, $apellidos, $email, $telefono, $contrasena, $id]);

    // Redirige a la lista de clientes después de actualizar
    header("Location: actualizar_cliente.php?mensaje=actualizado");
    exit();

} catch (PDOException $e) {
    die("❌ Error al actualizar: " . $e->getMessage());
}
?>
