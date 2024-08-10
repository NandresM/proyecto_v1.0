<?php

Class Cconexion {

    public function ConexionBD(){
        $host = 'localhost';
        $dbname = 'Bd_ejemplo';
        $username 'root';
        $password = ' ';
    }

    try {
        $conn new PDO("mysql:host=$host;$dbname",$username, $password) ;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Se conectó correctamente a la base de datos";
    } catch (PDOException $error){
    echo "No se logró conectar a la base de datos: $dbname, error: " . $error ->getAttribute;
    }

    return $conn;
    }
}
?>