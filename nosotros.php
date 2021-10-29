<?php
require 'includes/app.php';
incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre Nosotros" loading="lazy">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 años de experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est maxime adipisci atque ut dolorum, earum provident, vel iure sed voluptas incidunt,
                     enim voluptatibus nobis itaque accusamus neque reiciendis. Eos, atque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Est maxime adipisci atque ut dolorum, earum provident, vel iure sed voluptas incidunt,
                     enim voluptatibus nobis itaque accusamus neque reiciendis. Eos, atque!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Est maxime adipisci atque ut dolorum, earum provident, vel iure sed voluptas incidunt,
                     enim voluptatibus nobis itaque accusamus neque reiciendis. Eos, atque!
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Est maxime adipisci atque ut dolorum, earum provident, vel iure sed voluptas incidunt,
                     enim voluptatibus nobis itaque accusamus neque reiciendis. Eos, atque!
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, laborum natus amet excepturi mollitia tempora repellendus dolor, id aut optio, voluptas a. Assumenda pariatur quia explicabo vitae ab vel est.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, laborum natus amet excepturi mollitia tempora repellendus dolor, id aut optio, voluptas a. Assumenda pariatur quia explicabo vitae ab vel est.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, laborum natus amet excepturi mollitia tempora repellendus dolor, id aut optio, voluptas a. Assumenda pariatur quia explicabo vitae ab vel est.</p>
        </div>
    </section>

<?php
    incluirTemplate('footer');
?>