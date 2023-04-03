<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Conoce más sobre nosotros</h1>

    <div class="contenido-nosotros">
        <div class="imagen">
            <source srcset="build/img/nosotros.webp" type="image/webp">
            <source srcset="build/img/nosotros.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/nosotros.jpg" alt="anuncio">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>
                25 Años de experiencia
            </blockquote>
            <p>Sit amet consectetur adipisicing elit. Esse consectetur dolorem perspiciatis alias delectus! Nesciunt totam mollitia blanditiis. Nihil qui quos optio similique numquam! Eum deserunt ab aliquam maxime modi.it amet consectetur adipisicing elit. Esse consectetur dolorem perspiciatis alias delectus! Nesciunt totam mollitia blanditiis. Nihil qui quos optio similique numquam! Eum deserunt ab aliquam maxime modi</p>
            <p>Amet consectetur adipisicing elit. Ratione iusto illo aperiam aut, consequatur praesentium eaque! Quam culpa, unde deleniti cumque dolorum obcaecati sapiente sed? Voluptates quibusdam alias nam accusantium.</p>
        </div>
    </div>
</main>
<section class="contenedor seccion">
    <h1>Mas Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
            <H3>Seguridad</H3>
            <p>Voluptates quod perspiciatis quis quos atque adipisci sit cupiditate unde eveniet. Libero quos, nisi
                voluptate distinctio iusto obcaecati odio sapiente sit aut.Voluptates quod perspiciatis quis quos
                atque adipisci sit cupiditate unde eveniet. </p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <H3>Precio</H3>
            <p>Voluptates quod perspiciatis quis quos atque adipisci sit cupiditate unde eveniet. Libero quos, nisi
                voluptate distinctio iusto obcaecati odio sapiente sit aut. Libero quos, nisi voluptate distinctio
                iusto obcaecati odio sapiente sit aut</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <H3>A Tiempo</H3>
            <p>Libero quos, nisi voluptate distinctio iusto obcaecati odio sapiente sit aut.Voluptates quod
                perspiciatis quis quos atque adipisci sit cupiditate unde eveniet. Libero quos, nisi voluptate
                distinctio iusto obcaecati odio sapiente sit aut</p>
        </div>
    </div>
</section>

<?php
incluirTemplate('footer');
?>