<?php

	include("../ConexionPDO/conexion.php");

	$Id=$_GET["Id"];

	$base->query("DELETE FROM productos_capsulas WHERE ID='$Id'");
	
	header("Location:../CRUD_capsulas.php");

?>