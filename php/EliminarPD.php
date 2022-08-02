<?php

	include("../ConexionPDO/conexion.php");

	$Id=$_GET["Id"];

	$base->query("DELETE FROM productos_cliente WHERE ID='$Id'");
	
	header("Location:../productos_capsulas_sesion.php");

?>