<?php

// IMPORTAR LA CONEXION

// incluye el header
require 'includes/app.php';
$db = conectarDB();

// crear e mail  y  password
$email = "correo@correo.com";
$password = "123456";

// hashear el password
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//query para crear el usuario
$query = " INSERT INTO usuarios (email, password) VALUES ( '$email', '$passwordHash' ) ";

//echo $query;

// agregarlo a la base de datos
mysqli_query($db, $query);
