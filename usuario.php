<?php


require 'includes/app.php';
$db = conectarDB();

$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}'); ";

echo $query;

mysqli_query($db, $query); 