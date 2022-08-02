<?php
    session_start();
    require 'Conexion/conexion_bd.php';
    require 'funcs/funcs.php';
    
    if(!isset($_SESSION["ID_persona"])){
        header("Location: INDEX.html");
    }

    error_reporting(error_reporting() & ~E_NOTICE);

    $idUsuario = $_SESSION['ID_persona'];

    $sql = "SELECT ID_persona, Nombre_persona FROM usuarios_personas WHERE ID_persona = '$idUsuario'";
    $result = $conexion->query($sql);

    $row = $result->fetch_assoc();


?>