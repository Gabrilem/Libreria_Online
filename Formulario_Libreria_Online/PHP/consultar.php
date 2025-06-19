<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}


require 'conexion2.php'; // Conecta a la base de datos

$sql = "SELECT * FROM clientes";
$stmt = $conexion->query($sql);
$clientes = $stmt->fetchAll(); // Arreglo con todos los clientes
?>

<!-- Interfaz HTML para mostrar los resultados -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <a href="logout.php" class="btn btn-danger float-end">Cerrar sesión</a>
        <h2 class="mb-4 text-center">📋 Lista de Clientes Registrados</h2>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tipo ID</th>
                    <th>Número ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'): ?>
                        <div class="alert alert-danger text-center">
                            🗑️ Cliente eliminado correctamente.
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'actualizado'): ?>
                        <div class="alert alert-success text-center">
                            ✅ Cliente actualizado correctamente.
                        </div>
                    <?php endif; ?>


                <tr>
                    <td><?= $cliente['ID_cliente'] ?></td>
                    <td><?= $cliente['Tipo_Identificacion'] ?></td>
                    <td><?= $cliente['Numero_Identificacion'] ?></td>
                    <td><?= $cliente['Nombre'] ?></td>
                    <td><?= $cliente['Apellidos'] ?></td>
                    <td><?= $cliente['Email'] ?></td>
                    <td><?= $cliente['Telefono'] ?></td>
                    <td>
                        <!-- Enlace para editar -->
                        <a href="perfil_cliente.php?id=<?= $cliente['ID_cliente'] ?>" class="btn btn-sm btn-warning">Editar</a>

                        <!-- Enlace para eliminar -->
                        <a href="eliminar_cliente.php?id=<?= $cliente['ID_cliente'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="panel_admin.php" class="btn btn-danger float-end">Volver</a>
    </div>
</body>
</html>