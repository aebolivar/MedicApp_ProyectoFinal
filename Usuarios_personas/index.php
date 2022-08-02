<?php
require 'usuarios.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- ICONO PESTAÑA -->
		<link rel="shortcut icon" href="..\IMAGENES\medicapp.ico">
		<!-- TITULO PESTAÑA -->
		<title>MedicApp</title>
		<!-- META -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- BOOOTSTRAP -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<body>
            
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-row">
        <label for="">Tipo de documento:</label>
          
                <div class="form-group col-md-12">
                <input type="text" class="form-control <?php echo (isset($error['Tipo_documento']))?"is-invalid":"";?>" name="txtTipo_documento" value="<?php echo $txtTipo_documento;?>" placeholder="" id="txtTipo_documento">
                <div class="invalid-feedback">
                <?php echo (isset($error['Tipo_documento']))?$error['Tipo_documento']:"";?>
                </div>
                <br>
                </div>
                
                <div class="form-group col-md-12">
                <label for="">Nº de documento (ID):</label>
                <input type="text" class="form-control <?php echo (isset($error['ID']))?"is-invalid":"";?>" name="txtID" value="<?php echo $txtID;?>" placeholder="" id="txtID">
                <div class="invalid-feedback">
                <?php echo (isset($error['ID']))?$error['ID']:"";?>
                </div>
                <br>
                </div>
                
                <div class="form-group col-md-4">    
                <label for="">Nombres:</label>
                <input type="text" class="form-control <?php echo (isset($error['Nombres']))?"is-invalid":"";?>"  name="txtNombres" value="<?php echo $txtNombres;?>" placeholder="" id="txtNombres">
                <div class="invalid-feedback">
                <?php echo (isset($error['Nombres']))?$error['Nombres']:"";?>
                </div>
                <br>
                </div>
                    
        
                <div class="form-group col-md-4">        
                <label for="">Apellidos:</label>
                <input type="text" class="form-control <?php echo (isset($error['Apellidos']))?"is-invalid":"";?>" name="txtApellidos" value="<?php echo $txtApellidos;?>" placeholder="" id="txtApellidos">
                <div class="invalid-feedback">
                <?php echo (isset($error['Apellidos']))?$error['Apellidos']:"";?>
                </div>
                <br>
                </div>
                
                <div class="form-group col-md-4">  
                <label for="">Dirección:</label>
                <input type="text" class="form-control <?php echo (isset($error['Direccion']))?"is-invalid":"";?>" name="txtDireccion" name="txtDireccion" value="<?php echo $txtDireccion;?>" placeholder="" id="txtDireccion">
                <div class="invalid-feedback">
                <?php echo (isset($error['Direccion']))?$error['Direccion']:"";?>
                </div>
                <br>
                </div>
                
                <div class="form-group col-md-6"> 
                <label for="">Correo:</label>
                <input type="email" class="form-control <?php echo (isset($error['Correo']))?"is-invalid":"";?>" name="txtCorreo" name="txtCorreo" value="<?php echo $txtCorreo;?>" placeholder="" id="txtCorreo">
                <div class="invalid-feedback">
                <?php echo (isset($error['Correo']))?$error['Correo']:"";?>
                </div>
                <br>
                </div>
          
                
                <div class="form-group col-md-6">
                <label for="">Password:</label>
                <input type="text" class="form-control <?php echo (isset($error['Password']))?"is-invalid":"";?>" name="txtPassword" name="txtPassword" value="<?php echo $txtPassword;?>" placeholder="" id="txtPassword">
                <div class="invalid-feedback">
                <?php echo (isset($error['Password']))?$error['Password']:"";?>
                </div>
                <br>
                </div>
                
                <div class="form-group col-md-12">
                <label for="">Foto:</label>
                <?php if($txtFoto!=""){?>
                <br/>
                <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../fotos/<?php echo $txtFoto;?>" />
                <br/>
                <br/>                    
                <?php }?>
                    
                <input type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto;?>" placeholder="" id="txtFoto">
                <br>
                </div>
                
                <div class="form-group col-md-12"> 
                <label for="">Fecha de registro:</label>
                <input type="text" class="form-control <?php echo (isset($error['Fec_reg']))?"is-invalid":"";?>" name="txtFecha_registro" name="txtFecha_registro" value="<?php echo $txtFecha_registro;?>" placeholder="" id="txtFecha_registro">
                <div class="invalid-feedback">
                <?php echo (isset($error['Fec_reg']))?$error['Fec_reg']:"";?>
                </div>
                <br>
                </div>
      </div>
      </div>
      <div class="modal-footer">
        <button value="btnAgregar" <?php echo $accionAgregar;?> class="btn btn-success" type="submit" name="accion">Agregar</button>
        <button value="btnModificar" <?php echo $accionModificar;?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" onclick="return Confirmar('¿Desea eliminar el registro?');" <?php echo $accionEliminar;?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar" <?php echo $accionCancelar;?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<br/>
<br/>
<!-- Button trigger modal -->
<CENTER><a href="../SesionAdmin.php"><span class="glyphicon glyphicon-log-in"> Regresar a pagina principal</span></a></CENTER>
<br>
<br> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar registro +
</button>
<br>
<br>            
       
            </form>
            
            <div class="row">
                
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark"><!--Cabecera-->
                        <tr>
                            <th>Tipo de documento</th>
                            <th>Nº de documento (ID)</th>
                            <th>Nombre completo</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Password</th>
                            <th>Foto</th>
                            <th>Fecha de registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                <?php foreach($listaUsuarios as $usuario){ ?>
                    <tr>
                        <td><?php echo $usuario['Tipo_documento'] ?></td>
                        <td><?php echo $usuario['ID_persona'] ?></td>
                        <td><?php echo $usuario['Nombre_persona'] ?> <?php echo $usuario['Apellidos_persona'] ?></td>
                        <td><?php echo $usuario['Direccion_persona'] ?></td>
                        <td><?php echo $usuario['Correo_persona'] ?></td>
                        <td><?php echo $usuario['Password_persona'] ?></td>
                        <td><img class="img-thumbnail" width="100px" src="../fotos/<?php echo $usuario['Foto_persona'] ?>"/></td>
                        <td><?php echo $usuario['Fecha_registro'] ?></td>
                        <td>
                            
                            <form action="" method="post">
                            
                            <input type="hidden" name="txtID" value="<?php echo $usuario['ID_persona'] ?>">
                                
                            <CENTER><input type="submit" value="Seleccionar" class="btn btn-info" name="accion"></CENTER>
                            <br>
                            <CENTER><button value="btnEliminar" onclick="return Confirmar('¿Desea eliminar el registro?');" type="submit" class="btn btn-danger" name="accion">Eliminar</button> </CENTER>   
                            
                            </form>
                            
                        </td>
                    </tr>
    
                <?php } ?>
                    
                </table>
            
            </div>
            <?php if($mostrarModal){?>
                <script>
                    $('#exampleModal').modal('show');        
                </script>
            <?php }?>
            <script>
                function Confirmar(Mensaje){
                    return (confirm(Mensaje))?true:false;
                }
            </script>
        </div>
    </body>
</html>