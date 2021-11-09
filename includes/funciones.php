<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');

function incluirTemplate($nombre, $inicio = false) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

// function estaAutenticado() : bool {
//     session_start();
//     $auth = $_SESSION['login'];
//     if ($auth) {
//         return true;
//     }
//     return false;
// }

function estaAutenticado() : bool {
    session_start();
    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debuguear($variable) {   
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}