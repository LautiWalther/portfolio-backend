<?php
    /*
        id
        name
        lastname
        nickname
        password
        email
        token
    */
    $conexion = new mysqli("localhost", "root", "", "portfolio");
    if (mysqli_connect_error()) {
        echo "Error de conexion con la base de datos";
    }
    $conexion->set_charset("utf8");
?>
