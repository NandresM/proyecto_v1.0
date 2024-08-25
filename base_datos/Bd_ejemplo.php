<?php
$servidor = 'localhost';
$usuario = 'root';
$clave = ' '; 
$BaseDeDatos = 'Bd_ejemplo';

// Crear conexión
$conn = new mysqli($servidor, $usuario, $clave, $BaseDeDatos);

// Verifica conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibe los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Inserta los datos en la base de datos
$sql = "INSERT INTO contacto (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>