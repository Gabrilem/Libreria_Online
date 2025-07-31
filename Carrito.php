
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <style>
        .container {
            margin-top: 15px;
        }
        .product-img {
            width: 100px;
            height: auto;
            object-fit: cover;
        }
        .form-section {
            border: 2px solid #0a0a0a;
            padding: 20px;
            border-radius: 20px;
            background-color: #d1c4c4;
            width: 400px; 
            margin: 50 auto; /* Centrar el formulario */
        }
        footer {
            background-color: #0c0c0c;
            height: 70px; /* Altura fija */
            padding: 0.2%; /* Ajusta el padding */
            font-size: 18px; /* Ajusta el tamaño del texto */
            text-align: center;
            font-weight: bold;
            color: white;
        }
        footer .social a {
            margin: 0 15px;
        }
        footer .social img {
            width: 40px; /* Cambia el ancho de las imágenes */
            height: auto; /* Mantiene la proporción de las imágenes */
            vertical-align: middle; /* Alinea las imágenes verticalmente */
        }
    </style>
</head>
<body>
    <header class="p-3 text-white" style="background-color: #080808;">
        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none">
                <img src="./IMG/imgpaginas/Logo6G&P.png" alt="Logo" width="100" height="50" class="me-4">
                <span class="fs-2 d-block">G&P Literatura Cristiana
                    <span class="d-block" style="font-style: italic; font-size: 0.4em;">¡Palabras que dan vida!</span>
                </span> 
            </a>
            <form class="d-flex">
                <input type="search" class="form-control form-control-dark me-2" placeholder="Buscar...">
                <a href="index.php" class="btn btn-outline-light"><img src="./IMG/imgpaginas/flecha-izquierda.png" alt="Volver atras" width="30">Volver</a>
                <a href="login_cliente.php" class="btn btn-outline-light"><img src="./IMG/imgpaginas/usuario.png" alt="Usuario" width="30">login</a>
            </form>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Resumen de Productos</h4>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="IMG/Libros/Diario para esposasjovenes.png" alt="Producto" class="img-fluid product-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Diario para esposasjovenes</h5>
                                <p class="card-text">Diario para esposas jóvenes llevará tu vida a moverse de una zona de guerra a una en la que "todos los días pueden ser sábados".</p>
                                <p class="card-text"><strong>Precio:</strong> $XX.XX</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sección de formulario de pago -->
            <div class="col-md-6">
                <h4>Datos de Pago</h4>
                <div class="form-section">
                    <form id="formPago">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección de Envío</label>
                            <input type="text" class="form-control" id="direccion" required>
                        </div>
                        <div class="mb-3">
                            <label for="tarjeta" class="form-label">Número de Tarjeta</label>
                            <input type="text" class="form-control" id="tarjeta" required>
                        </div>
                        <div class="mb-3">
                            <label for="expiracion" class="form-label">Fecha de Expiración</label>
                            <input type="month" class="form-control" id="expiracion" required>
                        </div>
                        <div class="mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="number" class="form-control" id="cvv" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Pagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
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
    <script>
    document.getElementById('formPago').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe normalmente

    // Aquí podrías validar si quieres los campos antes de mostrar el mensaje

    Swal.fire({
      icon: 'success',
      title: '¡Pago realizado!',
      text: 'Disfruta de tu producto. Gracias por comprar con nosotros 💖',
      confirmButtonText: 'Aceptar',
      confirmButtonColor: '#198754' // Color Bootstrap "success"
    }).then(() => {
       window.location.href = 'index.php';
    });
  });
</script>

</body>
</html>
