<?php
//DB
require '../../includes/config/database.php';
$db = conectarDB();

//Consulta obtener vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = mysqli_real_escape_string($db,  $_POST['titulo']);
    $precio = mysqli_real_escape_string($db,  $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db,  $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db,  $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db,  $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db,  $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db,  $_POST['vendedor']);
    $creado = date('Y/m/d');

    $imagen = $_FILES['imagen'];

    if(!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if(!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if(strlen($descripcion) < 50) {
        $errores[] = "La descripcion es muy corta";
    }

    if(!$habitaciones) {
        $errores[] = "Debes añadir el numero de habitaciones";
    }

    if(!$wc) {
        $errores[] = "Debes añadir el numero de baños";
    }

    if(!$estacionamiento) {
        $errores[] = "Debes añadir el numero de estacionamientos";
    }

    if(!$vendedorId) {
        $errores[] = "Debes asignar un vendedor";
    }

    if(!$imagen['name'] || $imagen['error']) {
        $errores[] = 'La imagen es obligatoria';
    }

    //validar tamaño imagen
    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = 'La imagen es muy pesada';
    }

    if (empty($errores)) {

        //Subida de archivos
        
        //Crear carpeta
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        //Generar nombre unico para imagen
        $nombreImagen = md5(uniqid(rand(), true) . ".jpg");

        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        //Insert
        $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId)
        VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones','$wc', '$estacionamiento', '$creado', '$vendedorId') ";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
        header('Location: /admin?registrado=1');
        }
    }


}

require '../../includes/funciones.php';
incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error"><?php echo $error; ?></div> 
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Numero Habitaciones" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Numero Baños" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamientos:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Numero Estacionamientos" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="" selected disabled>-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id'] ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" name="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>