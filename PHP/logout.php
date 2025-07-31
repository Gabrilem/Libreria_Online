<?php
session_start();
session_unset();  // Limpia variables de sesión
session_destroy(); // Destruye la sesión
header("Location: ../index.php?logout=ok"); // Redirige a la página principal
exit;