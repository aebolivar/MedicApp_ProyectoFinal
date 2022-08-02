<?php

	include("php/Validacion_sesion_activa.php");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- ICONO PESTAÑA -->
    <link rel="shortcut icon" href="IMAGENES\medicapp.ico">
    <!-- TITULO PESTAÑA -->
    <title>MedicApp</title>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/themes/default.min.css" />
    <link rel="stylesheet" href="css/alertify.min.css" />
    <!-- BOOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mensaje.js">
    </script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/dinamiccorporativo.js" type="text/javascript"></script>
    <!-- SOBRE-ESCRITURA BOOTSTRAP -->
    <link rel="stylesheet" type="text/css" href="css/sobreescritura_bootstrap.css">
    <!--PAGOS-->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>


</head>
	<?php
		isset($_POST["total"]);
		$a=$_POST["total"];
		
	?>
<script>
    paypal.Buttons({
    style: {
        shape: 'pill',
        color: 'black',
        layout: 'vertical',
        label: 'paypal',

    },
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?php echo $a; ?>'
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
        });
    }
}).render('#paypal-button-container');
</script>


<body>
    <!-- INDEX -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>


                <img src="IMAGENES\medicapp2.png" alt="Image">
                <font color="white">MEDICAPP
                </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <ul class="nav navbar-nav navbar-right">
				  <li><a href="INDEX_sesion.php"><span class="glyphicon glyphicon-log-in"> INICIO </span></a></li>
				  <li><a href="corporativo_sesion.php"><span class="glyphicon glyphicon-log-in"> CORPORATIVO </span></a></li>
				  <li><a href="Productos_Uno_sesion.php"><span class="glyphicon glyphicon-log-in"> MEDICAMENTOS</span></a></li>
				  <li><a href="contactenos_sesion.php"><span class="glyphicon glyphicon-log-in"> CONTACTENOS</span></a></li>
				  
				  <li><a href="php/logout.php"><span class="glyphicon glyphicon-log-in"> CERRAR SESION</span></a></li>
				  
			  </ul>


                <!-- MODAL R.U. -->
                <div class="modal fade" id="MODAL_USUARIO" role="dialog">
                    <div class="modal-dialog">


                        <!-- FL-->

                        <form action="php/registrar_usuario.php" method="post" name="FRM_REGISTRO" id="FRM_REGISTRO">

                            <!-- CONTENEDOR R.U.-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <center>
                                        <h1 class="bg-primary">Registro</h1>
                                    </center>

                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="tdoc">Tipo de Documento:</label>
                                            <select class="form-control" name="Tipo_documneto" id="Tipo_documneto">
                                    <option value="900">Cedula de Ciudadania</option>
                                    <option value="901">Tarjeta de Identidad</option>
                                    <option value="902">Cedula de Extranjeria</option>
                                    <option value="903">NIT</option>
                                    </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="ID_persona">N° Identificación:</label>
                                            <input type="text" class="form-control" name="ID" id="ID" placeholder="N° de Documento">
                                        </div>

                                        <div class="form-group">
                                            <label for="Nombre_persona">Nombres:</label>
                                            <input type="text" class="form-control" name="NAME" id="NAME" placeholder="Nombres">
                                        </div>

                                        <div class="form-group">
                                            <label for="Apellidos_persona">Apellidos:</label>
                                            <input type="text" class="form-control" name="APELL" id="APELL" placeholder="Apellidos">
                                        </div>

                                        <div class="form-group">
                                            <label for="Dirección_persona">Dirección:</label>
                                            <input type="text" class="form-control" name="DIREC" id="DIREC" placeholder="Dirección de Residencia">
                                        </div>

                                        <div class="form-group">
                                            <label for="Dirección_persona">Password:</label>
                                            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="archivo">Foto: </label>
                                            <input type="file" id="archivo">
                                            <p class="help-block">Maximo 25MB</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" name="btn_resgistro" id="btn_resgistro" class="btn btn-primary">Registrar Usuario</button>
                                            <button type="Reset" class="btn btn-warning"> Borrar todo </button>
                                            <a href="consulta_persona.php" class="btn btn-primary">Consultar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                </form>

                <!-- FL -->
                <form action="php/validarusuario.php" method="post" name="FRM_INGRESO" id="FRM_INGRESO">

                    <!-- MODAL L -->

                    <div class="modal fade" id="MODAL_LOGIN" role="dialog">
                        <div class="modal-dialog">

                            <!-- Contenedor M-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">

                                    <div class="card card-container">

                                        <CENTER><img id="profile-img" class="profile-img-card" src="IMAGENES\usuario.jpeg" /></CENTER>
                                        <p id="profile-name" class="profile-name-card"></p>
                                        <form class="form-signin">
                                            <span id="reauth-email" class="reauth-email"></span>
                                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                            <BR>
                                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                            <div id="remember" class="checkbox">
                                                <label>
                                    <input type="checkbox" value="remember-me"> Recordarme
                                </label>
                                            </div>
                                            <button class="btn btn-lg btn-primary btn-block btn-signin" name="login_new" id="login_new">Ingresar</button>
                                        </form>
                                        <!-- /form -->
                                        <a href="#" class="forgot-password">
                            Olvide mi contraseña...
                        </a>
                                    </div>
                                </div>
                                <!-- contenedor -->
                            </div>
                        </div>
                    </div>
                </form>
    </nav>
    <h1 style="padding-top: 20px;margin: auto; width: 100%; text-align: center;">RESUMEN DE TU PEDIDO</h1>
    <div class="container-fluid" >
        <div class="page-header">
            
            <h2 style="width: 100%; text-align: center;">Envio gratis</h2>
            <h2 style="width: 100%; text-align: center;">TOTAL: <?php print($a)?></h2>
            
        </div>
    </div>

   	<center> <div id="paypal-button-container" style="
    padding-left: 20%; padding-right: 20%; padding-top: 4px;"></div></center>

    <div class="footer" style="clear: both; border-top: 2px solid rgba(103,103,87,0.55); margin:20px auto; width: 80%">
        <footer style="background-color: white">
            <figure id="logo_pie_fig" style="margin-bottom: 39px;">
                <a id="logo_pie_ref" title="Inicio" href="Productos_Uno.html"><img id="logo_pie_img" src="IMAGENES/Logo.png" alt="logopie"></a>
                <figcaption id="figcaption_pie"><small>Todos los derechos reservados.<br>
                    Desarrollado por Universidad Distrital. </small>
                    <time>2020-07-15.</time>
                </figcaption>
            </figure>
            <section id="nosotros_footer">
                <p class="p_foot"> NOSOTROS</p>
                <aside>
                    <blockquote class="dat_foot"><a title="Productos" href="corporativo.html">Corporativo</a></blockquote>
                    <blockquote class="dat_foot"><a title="Productos" href="Productos_Uno.html">Productos</a></blockquote>
                    <blockquote class="dat_foot"><a title="Productos" href="contactenos.html">Contactenos</a></blockquote>
                </aside>
            </section>
            <section id="ayuda_footer">
                <p class="p_foot"> AYUDA</p>
                <aside>
                    <blockquote class="dat_foot">
                        <adress>Telefono: 445456656</adress>
                    </blockquote>
                    <blockquote class="dat_foot">
                        <adress>Correo: usuario@correo.com</adress>
                    </blockquote>
                    <blockquote class="dat_foot">Corporativo</blockquote>
                </aside>
            </section>
            <section id="siguenos_footer">
                <p class="p_foot"> SIGUENOS</p>
                <section id="siguenos_imgs">
                    <figure class="img_foot">
                        <a title="Facebook" href="https://www.facebook.com/"><img class="img_red_foot" src="IMAGENES/facebook.png" alt="facebok"></a>
                    </figure>
                    <figure class="img_foot">
                        <a title="Instagram" href="https://www.instagram.com/?hl=es-la"><img class="img_red_foot" src="IMAGENES/instagram.png" alt="instagram"></a>
                    </figure>
                    <figure class="img_foot">
                        <a title="YouTube" href="https://www.youtube.com/"><img class="img_red_foot" src="IMAGENES/youtube.png" alt="youtube"></a>
                    </figure>
                </section>
            </section>
        </footer>
    </div>

</body>

</html>