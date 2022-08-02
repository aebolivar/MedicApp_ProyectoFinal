<?php

	include("php/Validacion_sesion_activa.php");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- ICONO PESTAÑA -->
		<link rel="shortcut icon" href="IMAGENES\medicapp.ico">
		<!-- TITULO PESTAÑA -->
		<title>MedicApp</title>
		<!-- META -->
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
        
        <!-- BASE DE DATOS -->
        <script src="js/validar.js"></script>
        
        
        <!-- CAPTCHA -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        
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

<!-- CARRUSEL -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
      <li data-target="#myCarousel" data-slide-to="8"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="IMAGENES\CARRUSEL1.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Es un gusto tenerlo en MedicApp</p>
        </div>      
      </div>

      <div class="item">
        <img src="IMAGENES\CARRUSEL2.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Salvando vidas</p>
        </div>      
      </div>

      <div class="item">
        <img src="IMAGENES\CARRUSEL3.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Cuidado de la salud</p>
        </div>      
      </div>

             <div class="item">
        <img src="IMAGENES\CARRUSEL4.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Medicamentos para poblaciones de recursos limitados</p>
        </div>      
      </div>

       <div class="item">
        <img src="IMAGENES\CARRUSEL5.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Suministro de medicamentos</p>
        </div>      
      </div>

      <div class="item">
        <img src="IMAGENES\CARRUSEL6.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Donación de medicamentos</p>
        </div>      
      </div>

      <div class="item">
        <img src="IMAGENES\CARRUSEL7.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Contribución a la reducción de dificultades de acceso a medicamentos de alto costo</p>
        </div>      
      </div>

      <div class="item">
        <img src="IMAGENES\CARRUSEL8.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Aprovechamiento de los medicamentos</p>
        </div>      
      </div>

        <div class="item">
        <img src="IMAGENES\CARRUSEL9.jpeg" alt="Image">
        <div class="carousel-caption">
          <h3>MEDICAPP</h3>
          <p>Acceso a medicamentos esenciales</p>
        </div>      
      </div>

    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="container text-center">    
	<h1 class="bg-primary">¡Bienvenido!</h1></center>
</div>

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
