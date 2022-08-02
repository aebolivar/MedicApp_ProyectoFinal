<?php
include '../Conexion/conexion_bd.php';

$correousuario = $_POST["usuario"];
$password = $_POST["clave"];

$consulta = "SELECT * FROM usuarios_personas WHERE Correo_persona= '$correousuario' and Password_persona= '$password'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas>0) {
    header("location:../INDEX.html");//cambiar
}
else {
    echo "Error en la autenticación";
}

mysqli_free_result($resultado);
mysqli_close($conexion);


