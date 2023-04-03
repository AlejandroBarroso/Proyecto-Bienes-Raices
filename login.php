<?php

require 'includes/app.php';
$db = conectarDB();

$errores = [];

// autenticar el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));  // asigna los valores de POST  las variables
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "Debes añadir un e-mail valido";
    }
    if (!$password) {
        $errores[] = "Debes añadir un password valido";
    }

    if (empty($errores)) {
        //revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email' ";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            // revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // verificar password
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                // el usuario esta autenticado
                session_start();

                //llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location: /admin');

            } else {
                $errores[] = 'Password Incorrecto';
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>


    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu e-mail" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password">

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate('footer');
?>