<?php
session_start();
require 'PHP/conexion.php'; 

if ($accion === 'crear') {
    $tipo_ident = $_POST["Tipo_Identificacion"];
    $nit = $_POST['Numero_Identificacion'];
    $nombre = $_POST['Nombre'];
    $apellidos = $_POST['Apellidos'];
    $email = $_POST['Email'];
    $telefono = $_POST['Telefono'];
    $contrasena = $_POST['Contraseña'];

    try {
        $verificar = $conexion->prepare("SELECT * FROM cliente WHERE NUmero_Identificacion = ? OR Email = ? OR (Nombres = ? AND Apellidos = ?) OR Contraseña = ?");
        $verificar->execute([$nit, $email, $nombres, $apellidos, $contrasena ]);
        if ($verificar->rowCount() > 0) {
            echo "<script>alert('Ya existe un usuario con esa información. Intente con datos diferentes.'); window.history.back();</script>";
            exit();
        }
        $sql = "INSERT INTO clientes (Tipo_Identificacion, Numero_Identificacion, Nombre, Apellidos, Email, Telefono, Contraseña)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$tipo_ident, $nit, $nombre, $apellidos, $email, $telefono, $contrasena]);

        /* Cuadro de mensaje exitoso centrado sobre la pantalla */
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
                        <a href="index.php" class="btn btn-primary mt-3">Volver a inicio</a>
                    </div>
                </div>
            </body>
            </html>
            ';
            exit;
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
                            <a href="index.php" class="btn btn-primary mt-3">Volver a inicio</a>
                        </div>
                    </div>
                </body>
                </html>
                ';

        } else {
            echo "❌ Error al registrar: " . $e->getMessage();
        }
    }
} else {
    /*echo "⚠️ Acción no válida.";*/
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G&P Literatura Cristiana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles2.css">
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <header class="p-3 text-white" style="background-color: #040404;">
            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none">
                    <img src="./IMG/imgpaginas/Logo6G&P.png" alt="Logo" width="100" height="50" class="me-4">
                    <span class="fs-2 d-block">G&P Literatura Cristiana
                        <span class="d-block" style="font-style: italic; font-size: 0.4em;">¡Palabras que dan vida!</span>
                    </span>                  
                </a>   
                 <form class="d-flex">
                    <a href="index.php" class="btn btn-outline-light"><img src="./IMG/imgpaginas/usuario.png" alt="Usuario" width="30">Volver</a>
                </form>
            </div>
        </header>

       <main class="contenedor-login">
        <div class="formulario-wrapper">
            <div class="form-registro">
                <h5 class="card-title text-center">Registrate</h5>
                <form action="./PHP/conexion.php" method="post">
                        <input type="hidden" name="accion" value="crear">

                        <div class="mb-3">
                            <label>Tipo de Identificación</label>
                            <select name="Tipo_Identificacion" class="form-select">
                                <option value="cc">Cédula de Ciudadanía</option>
                                <option value="ce">Cédula de Extranjería</option>
                                <option value="ti">Tarjeta de Identidad</option>
                                <option value="ps">Pasaporte</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Identificación</label>
                            <input type="number" name="Numero_Identificacion" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nombres</label>
                            <input type="text" name="Nombre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Apellidos</label>
                            <input type="text" name="Apellidos" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="Telefono" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Contraseña</label>
                            <input type="password" name="Contraseña" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
            </div>
        </div>
        </main>

        <!-- Footer -->
    <footer >
        <div class="social">
            <a href="#">
                <img src="./IMG/imgpaginas/facebook.png" alt="Facebook" class="footer-img">
            </a>
            <a href="#">
                <img src="./IMG/imgpaginas/linkedin.png" alt="LinkedIn" class="footer-img">
            </a>
            <a href="mailto:igabrieloficial7@gmail.com">
                <img src="./IMG/imgpaginas/gmail.png" alt="Gmail" class="footer-img">
            </a>
            <a href="https://wa.me/+573154035782">
                <img src="./IMG/imgpaginas/whatsapp.png" alt="WhatsApp" class="footer-img">
            </a>
        </div>
        <h6>2024 Derechos reservados - G&P Literatura cristiana</h6>


    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
