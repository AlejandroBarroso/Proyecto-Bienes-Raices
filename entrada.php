<?php
require 'includes/app.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Terraza en el techo de tu casa</h1>

    <div class="imagen">
        <picture>
            <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/blog1.jpg" alt="anuncio">
        </picture>
    </div>

    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

    <div class="resumen-propiedad">

        <p>Sit amet consectetur adipisicing elit. Esse consectetur dolorem perspiciatis alias delectus! Nesciunt totam mollitia blanditiis. Nihil qui quos optio similique numquam! Eum deserunt ab aliquam maxime modi.it amet consectetur adipisicing elit. Esse consectetur dolorem perspiciatis alias delectus! Nesciunt totam mollitia blanditiis. Nihil qui quos optio similique numquam! Eum deserunt ab aliquam maxime modi</p>
        <p>Amet consectetur adipisicing elit. Ratione iusto illo aperiam aut, consequatur praesentium eaque! Quam culpa, unde deleniti cumque dolorum obcaecati sapiente sed? Voluptates quibusdam alias nam accusantium.</p>

    </div>
</main>

<?php
incluirTemplate('footer');
?>