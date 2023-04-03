<?php

require '../includes/app.php'; //Importa las funciones y proteje la sesion
estaAutenticado();

use App\Propiedad; 

//Implementa  un metodo para obtener todas las propiedades usando ACTIVE REVORD
$propiedades =  Propiedad::all();




//Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        $query = "SELECT imagen FROM propiedades WHERE id = $id"; // Elimina l archivo
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $propiedad['imagen']);

        $query = "DELETE FROM propiedades WHERE id = $id"; //Elimina la propiedad
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            header('location: /admin?resultado=3');
        }
    }
}
//Incluye el template
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Anuncio actualizado correctamente</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta exito">Anuncio eliminado correctamente</p>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- 4 mostrar los resultados-->
            <?php foreach( $propiedades as $propiedad ): ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?></td>
                    <td> <?php echo $propiedad->titulo; ?></td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">

                        </form>

                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-azul-block">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
// 5 Cerrar la conexion
mysqli_close($db);

incluirTemplate('footer');
?>