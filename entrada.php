<?php
require 'includes/app.php';
incluirTemplate('header'); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img src="build/img/destacada2.jpg" alt="imagen de la Propiedad" loading="lazy">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Est maxime adipisci atque ut dolorum, earum provident, vel iure sed voluptas incidunt,
                enim voluptatibus nobis itaque accusamus neque reiciendis. Eos, atque!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Est maxime adipisci atque ut dolorum, earum provident, vel iure sed voluptas incidunt,
                enim voluptatibus nobis itaque accusamus neque reiciendis. Eos, atque!
            </p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>