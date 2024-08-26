<?php
    // Datos de la conexión a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $BaseDeDatos = "base_datos";
 
    // Establecer la conexión
    $enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);
 
    // Verificar la conexión
    if (!$enlace) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <form action="#" name="ejemplo" method="post">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="text" name="mensaje" placeholder="mensaje" required>
        <!-- Botones-->
        <input type="submit" name="registro" value="Registrar">
        <input type="reset" value="Limpiar">
    </form>
 
    <?php
        // Verificar si se ha enviado el formulario
        if(isset($_POST['registro'])){
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje']; 
 
            // Preparar la consulta SQL para insertar los datos en la base de datos
            $insertardatos = "INSERT INTO datos (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$telefono')";
 
            // Ejecutar la consulta SQL
            $ejecutarInsertar = mysqli_query($enlace, $insertardatos);
 
            // Verificar si la inserción fue exitosa
            if($ejecutarInsertar){
                echo "Datos registrados correctamente.";
            } else {
                echo "Error al registrar los datos: " . mysqli_error($enlace);
            }
        }
 
        // Verificar si se ha solicitado eliminar un registro
        if (isset($_GET['eliminar'])) {
            $id = $_GET['eliminar'];
            $eliminar = "DELETE FROM datos WHERE id = $id";
            $ejecutarEliminar = mysqli_query($enlace, $eliminar);
 
            if ($ejecutarEliminar) {
                echo "Registro eliminado correctamente.";
            } else {
                echo "Error al eliminar el registro: " . mysqli_error($enlace);
            }
        }
 
        // Consultar los datos de la base de datos para mostrarlos en una tabla
        $consulta = "SELECT * FROM datos";
        $resultado = mysqli_query($enlace, $consulta);
 
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>mensaje</th>
                        <th>Acciones</th>
                    </tr>";
            while($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>
                        <td>".$fila['id']."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['correo']."</td>
                        <td>".$fila['mensaje']."</td>
                        <td><a href='?eliminar=".$fila['id']."'>Eliminar</a></td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos registrados.";
        }
    ?>
 
    <?php
        // Cerrar la conexión
        mysqli_close($enlace);
    ?>
</body>
</html>