<?php

	include("../ConexionPDO/conexion.php");

	$Id=$_GET["Id"];

	$base->query("DELETE FROM productos_vitaminas WHERE ID='$Id'");
	
	header("Location:../CRUD_vitamina.php");

?>