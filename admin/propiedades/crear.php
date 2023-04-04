<?php

require '../../includes/app.php';

use App\Propiedad;

use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();

$db = conectarDB();

$propiedad = new Propiedad;

// Consulta la BD para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//Arreglo de mensajes de errores
$errores = Propiedad::getErrores();

//Ejecuta el codigo despues que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);

    //          **subida de archivos **
    // generar un nombre unico para las imagenes ( para que no se sobreescriban)
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Setear la imagen
    // Raliaza un resize a la imagen con INTERVENTION
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES ['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    //Validar  
    $errores = $propiedad->validar();

    //Revisa si el array este vacio...
    if (empty($errores)) {

        // Si esta vacio, crea la carpeta para subir imagenes
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }
        //Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Guarda en la DB
        $propiedad->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
       <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        
    </form>
</main>

<?php
incluirTemplate('footer');
?>