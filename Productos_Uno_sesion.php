<?php

	include("php/Validacion_sesion_activa.php");

?>
<!doctype html>
<html>
<head>
		<!-- ICONO PESTAÑA -->
		<link rel="shortcut icon" href="IMAGENES\medicapp.ico">
		<!-- TITULO PESTAÑA -->
		<title>MedicApp</title>
		<!-- META -->
		<meta name="Description" content="Pagina principal de productos"/>
		<meta name="keywords" content="Capsulas, vitaminas" />
		<meta name="viewport"/>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
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
		<!-- BARRA SOCIAL -->
		<div class="barra_social">
			<ul>
			<li><a href="" class="icon-facebook"></a></li>
			<li><a href="" class="icon-whatsapp"></a></li>
			<li><a href="" class="icon-twitter"></a></li>
			<li><a href="" class="icon-instagram"></a></li>
			<li><a href="" class="icon-google-plus"></a></li>
			<li><a href="" class="icon-mail"></a></li>
			</ul>
		</div>

		<!-- INDEX -->
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
				  <li><a href="INDEX_sesion.php"><span class="glyphicon glyphicon-log-in"> INICIO </span></a></li>
				  <li><a href="corporativo_sesion.php"><span class="glyphicon glyphicon-log-in"> CORPORATIVO </span></a></li>
				  <li><a href="Productos_Uno_sesion.php"><span class="glyphicon glyphicon-log-in"> MEDICAMENTOS</span></a></li>
				  <li><a href="contactenos_sesion.php"><span class="glyphicon glyphicon-log-in"> CONTACTENOS</span></a></li>
				  
				  <li><a href="php/logout.php"><span class="glyphicon glyphicon-log-in"> CERRAR SESION</span></a></li>
				  <li><a href="#MODAL_CARRITO"><span  data-toggle="modal" data-target="#MODAL_CARRITO"><figure id="carrito"><img src="imagenes/carrito.png" alt="compras"></figure></span></a></li>
			  </ul>
			  
			<!-- modal carrito -->
			
	<div class="modal fade" id="MODAL_CARRITO" role="dialog">
		<div class="modal-dialog">

				  <!-- Contenedor M-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<center><h1 class="bg-primary">Carrito de solicitudes</h1></center>
				</div>
				<div class="modal-body">
					<!--form-->
					<form class="form-signin">
						<?php $total=0; ?>
						<?php
							include("ConexionPDO/conexion.php");
							$conexion=$base->query("SELECT * FROM productos_cliente");
							$registros=$conexion->fetchAll(PDO::FETCH_OBJ);
						?>
						<section id="secProductos">
							<?php  
								foreach($registros as $persona):
							?>
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
								<section id="producto">
								<figure id="figProducto">
									<img id="imgProducto" src="<?php echo $persona->Direccion ?>">
								</figure>
								<input style="text-align: center;width: 95%; margin: auto;" type="text" name="nom" value="<?php echo $persona->Nombre ?>" readonly>
								<input style="text-align: center;width: 80%; margin: auto;" type="text" name="pre" value="<?php echo $persona->Precio ?>" readonly>
								<a href="php/EliminarPC.php?Id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Eliminar Producto.'></a>
								<input style="visibility: hidden;" type="text" name="dir" value="<?php echo $persona->Direccion ?>" readonly>
								</section>
							</form>
							<?php 
								$total=$total+$persona->Precio;
							?>
							<?php
								endforeach;
							?>
							
						</section>
					</form>
					<section style="margin-top: 20px; width: 100%; height: 60px;">
						<form action="pagos.php" method="post">
							<a href="pagos.php"><input style="width: 100%; height: 100%;" type='submit' name='del' id='del' value='TOTAL A PAGAR: <?php echo $total; ?>. ' ></a>
							<input type="text" name="total" value="<?php echo $total; ?>" style="visibility: hidden" >
						</form>	 
					</section>
				</div>
			</div>
		</div>
	</div>
		</nav>
		</nav>

	<section id="catalogo">
		<figure id="chocolate_fig" >
			<a title="VITAMINAS" href="Productos_Vitamina_sesion.php">
				<img id="chocolate_img" src="IMAGENES/vitamina.png" alt="chocolate"/>
				<figcaption>Vitamina</figcaption>
			</a>
		</figure>
		
		<figure id="dulces_fig" >
			<a title="CAPSULAS" href="Productos_Capsulas_sesion.php"><img id="dulces_img" src="IMAGENES/capsulas.jpg" alt="dulces"/>
			<figcaption>Capsulas</figcaption></a>
		</figure>
	</section>
	
	
	
	<div class="footer" style="clear: both; border-top: 2px solid rgba(103,103,87,0.55); margin:20px auto; width: 80%" >
		<footer style="background-color: white">
			<figure id="logo_pie_fig" style="margin-bottom: 39px;"> 
				<a id="logo_pie_ref" title="Inicio" href="Productos_Uno.html"><img id="logo_pie_img" src="IMAGENES/Logo.png" alt="logopie"></a>
				<figcaption id="figcaption_pie"><small>Todos los derechos reservados.<br>
				Desarrollado por Universidad Distrital. </small>
				<time>2020-07-15.</time>
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
					<adress>Correo: caj@algo.com</adress>
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