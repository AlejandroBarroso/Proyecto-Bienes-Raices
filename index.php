<?php
require 'includes/app.php';
incluirTemplate('header', $inicio = true);
?>

<main class="contenedor seccion">

    <h1>Mas Sobre Nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Voluptates quod perspiciatis quis quos atque adipisci sit cupiditate unde eveniet. Libero quos, nisi
                voluptate distinctio iusto obcaecati odio sapiente sit aut.Voluptates quod perspiciatis quis quos
                atque adipisci sit cupiditate unde eveniet. </p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>Voluptates quod perspiciatis quis quos atque adipisci sit cupiditate unde eveniet. Libero quos, nisi
                voluptate distinctio iusto obcaecati odio sapiente sit aut. Libero quos, nisi voluptate distinctio
                iusto obcaecati odio sapiente sit aut</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Libero quos, nisi voluptate distinctio iusto obcaecati odio sapiente sit aut.Voluptates quod
                perspiciatis quis quos atque adipisci sit cupiditate unde eveniet. Libero quos, nisi voluptate
                distinctio iusto obcaecati odio sapiente sit aut</p>
        </div>
    </div>
</main>
<section class="seccion contenedor">
    <h2>Casas y Departamenos en Venta</h2>

    <?php
       include 'includes/templates/anuncios.php';
    ?>

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver Todos los Anuncios</a>
    </div>

</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y a la brevedad un asesor se comunicara contigo</p>
    <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Consejos para contruir una terraza en el techo de tu casa, con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu casa con esta guia. Aprende a convinar muebles y colores para darle
                        vida a tu hogar.</p>
                </a>
            </div>
        </article>
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>El personal se comporto de una excelente manera, muy buena atencion. la casa que me
                mostraron cumple con las expectativas.
            </blockquote>
            <p>- Alejandro Barroso</p>
        </div>
    </section>
</div>

<?php
incluirTemplate('footer');
?>