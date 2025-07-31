<?php

// Codigo de conexion a BD libreriavirtual en phpmyadmin
$host = "localhost";
$port = 3306;
$user = "root";
$password = "";
$database = "libreriavirtual";
$motor = "mysql";

try {
    $dsn = "$motor:host=$host;port=$port;dbname=$database;charset=utf8mb4";
    $conexion = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$accion = $_POST['accion'] ?? '';

//Crea usuario

if ($accion === 'crear') {
    $tipo_ident = $_POST["Tipo_Identificacion"];
    $nit = $_POST['Numero_Identificacion'];
    $nombre = $_POST['Nombre'];
    $apellidos = $_POST['Apellidos'];
    $email = $_POST['Email'];
    $telefono = $_POST['Telefono'];
    $contrasena = $_POST['Contraseña'];

    try {
        $sql = "INSERT INTO clientes (Tipo_Identificacion, Numero_Identificacion, Nombre, Apellidos, Email, Telefono, Contraseña)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$tipo_ident, $nit, $nombre, $apellidos, $email, $telefono, $contrasena]);

        /*  mensaje exitoso */
        echo '
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
                        <h2 class="mb-3">✔️ Registro exitoso</h2>
                        <p class="fs-5">Bienvenido/a, <strong>' . htmlspecialchars($nombre) . '</strong>.</p>
                        <a href="../index.php" class="btn btn-primary mt-3">Volver a inicio</a>
                    </div>
                </div>
            </body>
            </html>
            ';
//Mensaje correo ya registrado
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo '
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
                            <h2 class="mb-3">Correo ya registrado</h2>
                            <p class="fs-5">Intentalo con otro <strong>' . htmlspecialchars($nombre) . '</strong>.</p>
                            <a href="../index.php" class="btn btn-primary mt-3">Volver a inicio</a>
                        </div>
                    </div>
                </body>
                </html>
                ';

        } else {
            echo "❌ Error al registrar: " . $e->getMessage();
        }
    }
} 
?>

