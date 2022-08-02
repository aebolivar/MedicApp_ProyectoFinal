<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizar Producto Vitamina</title>
<link rel="shortcut icon" href="../IMAGENES/medicapp.ico">

</head>

<body>

<h1>ACTUALIZAR</h1>

	
	<?php
	
		include("../ConexionPDO/conexion.php");
	
		if(!isset($_POST["bot_actualizar"])){
			
			$id=$_GET["Id"];
			$nom=$_GET["nom"];
			$pre=$_GET["pre"];
			$dir=$_GET["dir"];
			
		}else{
			
			$id=$_POST["id"];
			$nom=$_POST["nom"];
			$pre=$_POST["pre"];
			$dir=$_POST["dir"];
			
			$sql="UPDATE productos_vitaminas SET Nombre=:miNom, Precio=:miPre, Direccion=:miDir WHERE id=:miId";
			
			$resultado=$base->prepare($sql);
			
			$resultado->execute(array(":miId"=>$id, ":miNom"=>$nom, ":miPre"=>$pre, ":miDir"=>$dir));
			
			header("Location:../CRUD_vitamina.php");
		}
	?>
	
	
	
<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
    </tr>
    <tr>
      <td>Precio</td>
      <td><label for="pre"></label>
      <input type="text" name="pre" id="pre" value="<?php echo $pre ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>