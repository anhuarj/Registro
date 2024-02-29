<?php
// Inicia una nueva sesión o reanuda la existente
session_start();

// Comprueba si el usuario está autenticado
if (!isset($_SESSION['usuario_autenticado'])) {
    // Si el usuario no está autenticado, redirige a index.php
    header('Location: /index.php');
    exit;

}
?>


<?php
require_once "./includes/header.php";
?>


    <!-- Mensaje especial para los usuarios que han iniciado sesión -->
    <p>Aquí hay algo especial para los usuarios que han iniciado sesión:</p>
    <!-- Imagen de un elefante PHP (elephpant) -->
    <p><img src="elephpant.jpg" alt="Un elephpant"></p>



    <?php
    require_once "./includes/footer.php";
?>