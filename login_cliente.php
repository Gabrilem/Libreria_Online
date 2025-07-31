<?php
session_start();
require 'PHP/conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['accion'] === 'login') {
    $identificacion = $_POST['Numero_identificacion'];
    $pwd = $_POST['Contraseña'];

    $stmt = $conexion->prepare("SELECT id, Nombre, Apellidos, Contraseña FROM clientes WHERE Numero_identificacion = ?");
    $stmt->execute([$identificacion]);
    $user = $stmt->fetch();

    if ($user && $pwd === $user['Contraseña']) { // o password_verify si usas hashes
        $_SESSION['id'] = $user['id']; // <-- lo más importante
        $_SESSION['cliente_nombre'] = $user['Nombre'] . ' ' . $user['Apellidos'];
        $_SESSION['cliente_identificacion'] = $identificacion;
        header("Location: index.php"); // redirige a página principal
        exit;
    } else {
        $error = "Identificacion o contraseña incorrecta.";
    }
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
            <div class="form-login card p-4">
                <h5 class="card-title text-center">Iniciar Sesión</h5>
               <form action="login_cliente.php" method="POST">
                    <input type="hidden" name="accion" value="login">

                    <div class="mb-3">
                        <label for="loginTipoIdentificacion" class="form-label">Tipo de Identificación</label>
                        <select name="Tipo_Identificacion" id="loginTipoIdentificacion" class="form-select">
                            <option value="cc">Cédula de Ciudadanía</option>
                            <option value="ce">Cédula de Extranjería</option>
                            <option value="ti">Tarjeta de Identidad</option>
                            <option value="ps">Pasaporte</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="loginNumeroDocumento" class="form-label">Número de Documento</label>
                        <input type="text" name="Numero_identificacion" class="form-control" id="loginNumeroDocumento" required>
                    </div>

                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Contraseña</label>
                        <input type="password" name="Contraseña" class="form-control" id="loginPassword" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger mt-2"><?php echo $error; ?></div>
                    <?php endif; ?>
                </form>
                <a href="registro_cliente.php" class="btn btn-danger float-end">Registrate</a>
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
