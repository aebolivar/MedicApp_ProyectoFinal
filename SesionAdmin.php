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

<!doctype html>
<html>
<head>
		<!-- ICONO PESTAÑA -->
		<link rel="shortcut icon" href="IMAGENES/medicapp.ico">
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
					
					<li><a href="Usuarios_personas/index.php"><span class="glyphicon glyphicon-log-in"> CRUD USUARIOS </span></a></li>
					<li><a href="CRUD_vitamina.php"><span class="glyphicon glyphicon-log-in"> CRUD VITAMINAS</span></a></li>
					<li><a href="CRUD_capsulas.php"><span class="glyphicon glyphicon-log-in"> CRUD CAPSULAS</span></a></li>
					
					<li><a href="php/logout.php"><span class="glyphicon glyphicon-log-in"> CERRAR SESION</span></a></li> 
				</ul>
			</div>	
		</nav>
        
        <div class="jumbotron">
            <CENTER>
                <h2><?php echo 'Bienvenid@ '.utf8_decode($row['Nombre_persona']); ?></h2>
            </CENTER>
            <br />
        </div>
				
				
	<!--<section id="catalogo">
		<figure id="chocolate_fig" >
			<a title="VITAMINAS" href="Productos_Vitamina.php">
				<img id="chocolate_img" src="IMAGENES/vitamina.png" alt="chocolate"/>
				<figcaption>Vitamina</figcaption>
			</a>
		</figure>
		
		<figure id="dulces_fig" >
			<a title=" CAPSULAS" href="Productos_Capsulas.php"><img id="dulces_img" src="IMAGENES/capsulas.jpg" alt="dulces"/>
			<figcaption>Capsulas</figcaption></a>
		</figure>
	</section>-->
	
	
	
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