<?php 
if (isset($_POST['password'])) {

    // Recoge la contraseña del formulario 

    $password = $_POST['password'];

    // Convierte la contraseña hash 

    $hash = password_hash($passwprd, PASSWORD_DEFAULT);
}
?>

<?php 
require_once './includes/header.php';
?>

<h1>Ingrese su contraseña</h1>
<form method="post">
    Contraseña: <input type="password" name="password">
    <input type="submit">
</form>

<!-- Etiqueta label para mostrar el hash de la contraseña -->
<label for="hash" id="hashlabel">Hash de la contraseña:
    <?php echo isset($hash) ? $hash : ''; ?></label>


<?php
require_once './includes/footer.php';
?>