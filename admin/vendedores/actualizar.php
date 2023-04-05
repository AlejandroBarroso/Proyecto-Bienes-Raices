<?php

require '../../includes/app.php';
use App\Vendedor;
estaAutenticado();

// Valida que sea un is valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
    header('Location: /admin');
}

// obtener el arreglo del vendedor (desde la DB)
$vendedor = Vendedor::find($id);

//Arreglo de mensajes de errores
$errores = Vendedor::getErrores();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // asignar los valores
    $args = $_POST['vendedor'];

// sincronizar el objeto en memoria con lo que el usuario escribio
    $vendedor->sincronizar($args);   
    
    // Validacion 
    $errores = $vendedor->validar();

    if(empty($errores)) {
        $vendedor->guardar();
    }
}

incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Actualizar datos del Vendedor/a</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" >
       <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
        
    </form>
</main>

<?php
incluirTemplate('footer');
?>