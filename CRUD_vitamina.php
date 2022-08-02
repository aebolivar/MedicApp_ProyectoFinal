<?php

	include("php/Validacion_sesion_activa.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
		<title>CRUD VITAMINAS</title>
		<link rel="shortcut icon" href="IMAGENES/medicapp.ico">
		<link rel="stylesheet" type="text/css" href="css/style_Crud.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="css/fonts.css">
		<!-- BOOOTSTRAP -->
		<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  		<script src="js/jquery.min.js"></script>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/mensaje.js"> </script>
  		<!-- SOBRE-ESCRITURA BOOTSTRAP -->
		<link rel="stylesheet" type="text/css" href="css/sobreescritura_bootstrap.css">

</head>

<body>
	
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
					</button>
					<img src="IMAGENES\medicapp2.png" alt="Image"> <font color="white">MEDICAPP
					</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>      
				<ul class="nav navbar-nav navbar-right">
					<li><a href="SesionAdmin.php"><span class="glyphicon glyphicon-log-in"> INICIO </span></a></li>
					<li><a href="Usuarios_personas/index.php"><span class="glyphicon glyphicon-log-in"> CRUD USUARIOS </span></a></li>
					<li><a href="CRUD_vitamina.php"><span class="glyphicon glyphicon-log-in"> CRUD VITAMINAS</span></a></li>
					<li><a href="CRUD_capsulas.php"><span class="glyphicon glyphicon-log-in"> CRUD CAPSULAS</span></a></li>
					<li><a href="php/logout.php"><span class="glyphicon glyphicon-log-in"> CERRAR SESION</span></a></li> 
				</ul>
			</div>	
		</nav>
	
	<?php
		include("ConexionPDO/conexion.php");
	
		$conexion=$base->query("SELECT * FROM productos_vitaminas");
	
		$registros=$conexion->fetchAll(PDO::FETCH_OBJ);
	
		if(isset($_POST["cr"])){
			
			$nombre=$_POST["Nom"];
			$precio=$_POST["Pre"];
			$direccion=$_POST["Dir"];
			
			$sql="INSERT INTO productos_vitaminas (Nombre, Precio, Direccion) VALUES (:nom, :pre, :dir)";
			
			$resultado=$base->prepare($sql);
			
			$resultado->execute(array(":nom"=>$nombre,":pre"=>$precio,":dir"=>$direccion));
			
			header("Location:CRUD_vitamina.php");
		}
	?>

	<h1>CRUD VITAMINAS</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table style="width:70%; margin: auto;" width="50%" border="0" align="center">
			<tr >
				<td class="primera_fila">Id</td>
				<td class="primera_fila">Nombre</td>
				<td class="primera_fila">Precio</td>
				<td class="primera_fila">Dirección</td>
				<td class="sin">&nbsp;</td>
				<td class="sin">&nbsp;</td>
				<td class="sin">&nbsp;</td>
			</tr>
			<?php  
				foreach($registros as $persona):
			?>
			<tr style="height:  50px;">
			  <td><?php echo $persona->id ?></td>
			  <td><?php echo $persona->Nombre ?></td>
			  <td><?php echo $persona->Precio ?></td>
			  <td><?php echo $persona->Direccion ?></td>

			  <td class="bot"><a href="php/BorrarPC.php?Id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
			  <td class='bot'><a href="php/ActualizarPC.php?Id=<?php echo $persona->id ?> & nom=<?php echo $persona->Nombre ?> & pre=<?php echo $persona->Precio ?> & dir=<?php echo $persona->Direccion ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
			</tr>  

			<?php
				endforeach;
			?>
			<tr>
				<td></td>
				<td><input type='text' name='Nom' size='10' class='centrado' required></td>
				<td><input type='text' name='Pre' size='10' class='centrado' required></td>
				<td><input type='text' name=' Dir' size='10' class='centrado' required></td>
				<td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td> 
			</tr>    
		</table>
	</form>
			
	<div class="footer" style="clear: both; border-top: 2px solid rgba(103,103,87,0.55); margin:20px auto; width: 80%" >
		<footer style="background-color: white">
			<figure id="logo_pie_fig" style="margin-bottom: 39px;"> 
				<a id="logo_pie_ref" title="Inicio" href="Productos_Uno.html"><img id="logo_pie_img" src="IMAGENES/Logo.png" alt="logopie"></a>
				<figcaption id="figcaption_pie"><small>Todos los derechos reservados.<br>
				Desarrollado por Universidad Distrital. </small>
				<time>2022-08-02.</time>
				</figcaption>
			</figure>
			<section id="nosotros_footer" >
				<p class="p_foot"> NOSOTROS</p>
				<aside>
					<blockquote class="dat_foot"><a title="Productos" href="corporativo.html">Corporativo</a></blockquote>
					<blockquote class="dat_foot"><a title="Productos" href="Productos_Uno.html">Productos</a></blockquote>
					<blockquote class="dat_foot"><a title="Productos" href="contactenos.html">Contactenos</a></blockquote>
				</aside>
			</section>
			<section id="ayuda_footer" >
				<p class="p_foot"> AYUDA</p>
				<aside>
					<blockquote class="dat_foot" >
					<adress>Telefono: 445456656</adress>
					</blockquote>
					<blockquote class="dat_foot">
					<adress>Correo: usuario@correo.com</adress>
					</blockquote>
					<blockquote class="dat_foot">Corporativo</blockquote>
				</aside>
			</section>
			<section id="siguenos_footer" >
				<p class="p_foot"> SIGUENOS</p>
				<section id="siguenos_imgs">
					<figure class="img_foot"> <a title="Facebook" href="https://www.facebook.com/"><img class="img_red_foot" src="IMAGENES/facebook.png" alt="facebok"></a> </figure>
					<figure class="img_foot"> <a title="Instagram" href="https://www.instagram.com/?hl=es-la"><img class="img_red_foot" src="IMAGENES/instagram.png" alt="instagram"></a> </figure>
					<figure class="img_foot"> <a title="YouTube" href="https://www.youtube.com/"><img class="img_red_foot" src="IMAGENES/youtube.png" alt="youtube"></a> </figure>
				</section>
			</section>
		</footer>
	</div>
</body>
</html>