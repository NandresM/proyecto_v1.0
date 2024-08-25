<?php

$servidor = 'localhost';
$usuario = 'root';
$clave = ' '; 
$BaseDeDatos = 'Bd_ejemplo';

// Establecer la conexión
$enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);

// Verificar la conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>