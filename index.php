<?php
//Inicia una nueva sesión o reanuda la existente
session_start();

// Un array asociativo que contiene los nombres de usuario y sus contraseñas hasheadas
$usuarios = [
    "matthias" => "$2y$10$.W5hBgYf/2bas.5bFQHpL.FTlS8xzUgixvyeEiPk0VeKuMxR5A1CK",

];

// Comprueba si se han enviado los campos "username" y "password" del formulario
if (isset($_POST["username"], $_POST["password"])) {
    // El usuario ha enviado el formulario de inicio de sesión

    //Comprueba si el nombre de usuario proporcionado existe en el array de usuarios
    if (isset($usuarios[$_POST["username"]])) {
        // El nombre de usuario proporcionado es correcto, ahora valida la contraseña
        $hashContraseñaEsperada = $usuarios[$_POST["username"]];

        // Comprueba si la contraseña proporcionada, una vez hasheada, coincide con el hash almacenado
        if (
            password_verify($_POST["password"], $hashContraseñaEsperada)
        ) {
            // La contraseña proporcionada tambien es correcta

            // Almacena el nombre de usuario del usuario que acaba de iniciar sesión
            $_SESSION["usuario_autenticado"] = $_POST["username"];

            // Redirige a /Autentificación/secret.php
            header("Location: ./secret.php");
            exit;
        } else {
            // La contraseña no coincide
            echo "Contraseña incorrecta";
        }
    }
}

?>

<?php
require_once "includes/header.php";
?>

<h1>Inicie sesión</h1>

<!-- Formulario de inicio de sesión -->
<form method="post">
    <!-- Campo de entrada para el nombre de usuario -->
    <div>
        <label for="username">
            Nombre de usuario:
        </label>
        <input type="text" name="username" id="username">
    </div>
    <!-- Campo de entrada para la contraseña -->
    <div>
        <label for="password">
            Contraseña:
        </label>
        <input type="password" name="password" id="password">
    </div>
    <!-- Botón para enviar el formulario -->
    <div>
        <button type="submit">Enviar</button>
    </div>
</form>

<?php
require_once "includes/footer.php";
?>
