<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}


require 'conexion.php'; // usamos la conexión común

// Verificar que se envió un ID por la URL
if (!isset($_GET['id'])) {
    die("❌ No se especificó el cliente a eliminar.");
}

$id = $_GET['id'];

try {
    // Preparar y ejecutar la eliminación
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id]);

    // Redirigir de nuevo a la lista con mensaje
    header("Location: consultar.php?mensaje=eliminado");
    exit();

} catch (PDOException $e) {
    die("❌ Error al eliminar cliente: " . $e->getMessage());
}
?>
