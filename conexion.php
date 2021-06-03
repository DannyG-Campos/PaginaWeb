<?php
    const SERVERURL = "http://localhost:8080/familywebmarket/";
    $server = "localhost";
    $db ="db_ciudad";
    $user = "root";
    $pass = "";
    

    $conexion = mysqli_connect($server, $user, $pass, $db);
    mysqli_set_charset($conexion,"utf8");



    ?>