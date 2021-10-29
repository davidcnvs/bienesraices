<?php
require 'includes/app.php';
$db = conectarDB();

$errores = [];

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email no es valido";
    }
    if (!$password) {
        $errores[] = "La contraseña es obligatoria";
    }
    if (empty($errores)) {
        $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            $usuario = mysqli_fetch_assoc($resultado);

            $auth = password_verify($password, $usuario['password']);
            
            if ($auth) {
                session_start();
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
            }else{
                $errores[] = 'Contraseña incorrecta';
            }
        
        }else{
            $errores[] = "El usuario no existe";
        }
    }
}

incluirTemplate('header'); 
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Login</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Nombre</label>
            <input name="email" type="email" placeholder="Tu e-mail" id="email" required>

            <label for="password">E-mail</label>
            <input name="password" type="password" placeholder="Tu password" id="password" required>
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php
    incluirTemplate('footer');
?>