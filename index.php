<!--Iterfaz pagina inicio-->
<?php session_start(); ?>

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
    <?php if (isset($_GET['logout']) && $_GET['logout'] === 'ok'): ?>
        <div class="alert alert-info text-center mt-3">Sesión cerrada correctamente.</div>
    <?php endif; ?>
    <div class="d-flex align-items-center justify-content-between">
      
      <!-- Logo + Nombre -->
      <a href="#" class="d-flex align-items-center text-white text-decoration-none">
        <img src="./IMG/imgpaginas/Logo6G&P.png" alt="Logo" width="100" height="50" class="me-4">
        <span class="fs-2 d-block">
          G&P Literatura Cristiana
          <span class="d-block" style="font-style: italic; font-size: 0.4em;">¡Palabras que dan vida!</span>
        </span>
      </a>
      <!-- Menú desplegable -->
      <div class="dropdown me-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
          Menú
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <li><button class="dropdown-item" type="button">Quiénes Somos</button></li>
          <li><button class="dropdown-item" type="button">Categorías</button></li>
          <li><button class="dropdown-item" type="button">Ayuda</button></li>
          <li><button class="dropdown-item" type="button">Contacto</button></li>
        </ul>
      </div>
      <!-- Buscar + carrito + sesión -->
      <form class="d-flex align-items-center">
        <input type="search" class="form-control me-2" placeholder="Buscar...">
        
        <!-- Icono de carrito -->
        <a href="Carrito.html" class="btn btn-outline-light me-2">
          <img src="./IMG/imgpaginas/carrito-de-compras.png" alt="Carrito" width="30">
        </a>
        <a href="registro_cliente.php" class="btn btn-danger float-end">Registrate</a>
        <!-- Usuario / Login -->
        <?php if (isset($_SESSION['cliente_nombre'])):
            $partes = explode(' ', $_SESSION['cliente_nombre']);
            $iniciales = strtoupper(($partes[0][0] ?? '') . ($partes[2][0] ?? ''));
        ?>
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="clienteMenu"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $iniciales ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="clienteMenu">
                    <li><a class="dropdown-item" href="perfil_cliente.php">Actualizar mis datos</a></li>
                    <li><a class="dropdown-item" href="PHP/logout.php">Cerrar sesión</a></li>
                </ul>
            </div>
            <?php else: ?>
            <a href="login_cliente.php"><img src="./IMG/imgpaginas/usuario.png" alt="Login" width="30"></a>
            <?php endif; ?>

      </form>
    </div>
  </header>
 
        <div class="d-flex" style="min-height: calc(80vh - 86px);"> 
            <!-- Sidebar -->
            <nav id="sidebar" class="flex-shrink-0 p-3" style="width: 350px;  position: sticky; top: 80px;">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item"><a href="#quienesSomos" class="nav-link text-white" data-bs-toggle="collapse">Quiénes Somos</a></li>
                    <div class="collapse" id="quienesSomos">
                        <li><a href="#" class="nav-link text-white ps-4">Nuestra Historia</a></li>
                    </div>
                    <li class="nav-item"><a href="#categorias" class="nav-link text-white" data-bs-toggle="collapse">Categorías</a></li>
                    <div class="collapse" id="categorias">
                        <li><a href="#" class="nav-link text-white ps-4">Biblias</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Biblias de estudios</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Biblias para niños</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Teologia</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Diccionarios</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Comentarios</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Libros</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Libros para niños</a></li>
                    </div>
                    <li class="nav-item"><a href="#ayuda" class="nav-link text-white" data-bs-toggle="collapse">Ayuda</a></li>
                    <div class="collapse" id="ayuda">
                        <li><a href="#" class="nav-link text-white ps-4">Preguntas Frecuentes</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Política de Devoluciones</a></li>
                    </div>
                    <li class="nav-item"><a href="#contacto" class="nav-link text-white" data-bs-toggle="collapse">Contacto</a></li>
                    <div class="collapse" id="contacto">
                        <li><a href="#" class="nav-link text-white ps-4">Email</a></li>
                        <li><a href="#" class="nav-link text-white ps-4">Teléfono</a></li>
                    </div>
                </ul>
            </nav>

            <main class="flex-fill p-4">
                <div class="row justify-content-center">
                    <!-- Imagenes -->
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./IMG/Bibliasestudio/Bibliadeestudioparalamujer.jpg" class="card-img-top" alt="Bibliadeestudioparalamujer">
                            <div class="card-body">
                                <h5 class="card-title">Biblia de Estudio Para la mujer</h5>
                                <p class="card-price">$000.000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./IMG/Bibliasestudio/Bibliadeestudioparamujeres.jpg" class="card-img-top" alt="Bibliadeestudioparamujeres">
                            <div class="card-body">
                                <h5 class="card-title">Biblia de estudio para mujeres</h5>
                                <p class="card-price">$000.000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./IMG/Comentarios/Comentariosdelossalmos.jpg" class="card-img-top" alt="Comentariosdelossalmos">
                            <div class="card-body">
                                <h5 class="card-title">Comentarios de los salmos</h5>
                                <p class="card-price">$000.000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./IMG/Libros/Elpoderdelacruz.png" class="card-img-top" alt="Elpoderdelacruz">
                            <div class="card-body">
                                <h5 class="card-title">El poder de la Cruz</h5>
                                <p class="card-price">$000.000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./IMG/Biblias/Biblia ediciondepromesasPEQ.png" class="card-img-top" alt="Biblia ediciondepromesasPEQ">
                            <div class="card-body">
                                <h5 class="card-title">Biblia edicion promesas</h5>
                                <p class="card-price">$000000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agragar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="IMG/Biblias/Bibliacompactaletragrande.png" class="card-img-top" alt="Bibliacompactaletragrande">
                            <div class="card-body">
                                <h5 class="card-title">Biblia compacta letra grande</h5>
                                <p class="card-price">~000000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agragar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./IMG/Biblias/Bibliaedicioncompacta peq.png" class="card-img-top" alt="Bibliaedicioncompacta">
                            <div class="card-body">
                                <h5 class="card-title">Biblia edicion compacta Pequeña</h5>
                                <p class="card-price">$0000000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agragar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./IMG/Biblias/Biblianegrabordedorado.png" class="card-img-top" alt="Biblianegrabordedorado">
                            <div class="card-body">
                                <h5 class="card-title">Biblia Negra</h5>
                                <p class="card-price">$000000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agragar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./IMG/Libros/Diario para esposasjovenes.png" class="card-img-top" alt="Diario para esposasjovenes">
                            <div class="card-body">
                                <h5 class="card-title">Diario para esposas jovenes</h5>
                                <p class="card-price">$0000000</p>
                                <a href="Carrito.php" class="btn btn-primary">Agragar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Versículo diario + Ubicación -->
                <section id="info-api" class="bg-light rounded shadow text-center p-4"
                         style="max-width: 700px; margin: 50px auto 80px 250px;">
                <h4 class="mb-3">🌿 Versículo del día</h4>
                <div class="card-body">
                <p id="versiculo">Cargando versículo...</p>
                </div>
                <button class="btn btn-outline-primary btn-sm mb-3" onclick="cargarVersiculo()">Ver otro versículo</button>

                <h5>📍 Tu ubicación</h5>
                <div id="ubicacion" class="text-muted small"></div>
                </section>
            </main>
            <!-- Video  -->
                <div style="position: fixed; bottom: 10px; left: 10px; z-index: 1030; width: 350px;">
                <div class="ratio ratio-16x9 mb-2 border rounded shadow">
                    <iframe src="https://www.youtube.com/embed/7TtmkXURhIM"
                            title="Video superior"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
                <div class="ratio ratio-16x9 border rounded shadow">
                    <iframe src="https://www.youtube.com/embed/FKuXW8z0nO0"
                            title="Video inferior"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
                </div>
        </div>
    </div>
    <a href="./PHP/login_admin.php" class="btn btn-danger float-end">Acceso Admin</a>
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
<script>
    setTimeout(function () {
        const alerta = document.querySelector('.alert');
        if (alerta) {
            alerta.classList.add('fade-out');
            setTimeout(() => alerta.remove(), 1000); // Espera a que termine la animación
        }
    }, 2000);
</script>
<script>
 const versiculos = [
    `"Porque de tal manera amó Dios al mundo, que ha dado a su Hijo unigénito..." - Juan 3:16`,
    `"Jehová es mi pastor; nada me faltará." - Salmo 23:1`,
    `"Todo lo puedo en Cristo que me fortalece." - Filipenses 4:13`,
    `"Clama a mí, y yo te responderé..." - Jeremías 33:3`,
    `"En el principio creó Dios los cielos y la tierra." - Génesis 1:1`
  ];

  function cargarVersiculo() {
    const index = Math.floor(Math.random() * versiculos.length);
    document.getElementById("versiculo").innerText = versiculos[index];
  }

  cargarVersiculo();

  // Geolocalización
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      function (pos) {
        const lat = pos.coords.latitude;
        const lon = pos.coords.longitude;
        const link = `https://www.google.com/maps?q=${lat},${lon}`;
        document.getElementById("ubicacion").innerHTML = `<a href="${link}" target="_blank">Ver en Google Maps</a>`;
      },
      function () {
        document.getElementById("ubicacion").innerText = "No se pudo obtener la ubicación.";
      }
    );
  } else {
    document.getElementById("ubicacion").innerText = "Tu navegador no permite geolocalización.";
  }
</script>


</body>

</html>
