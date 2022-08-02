<?php

$txtTipo_documento=(isset($_POST['txtTipo_documento']))?$_POST['txtTipo_documento']:"";
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";
$txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtPassword=(isset($_POST['txtPassword']))?$_POST['txtPassword']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";
$txtFecha_registro=(isset($_POST['txtFecha_registro']))?$_POST['txtFecha_registro']:"";

$tipo_usuario = 2;

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;


include ("../ConexionPDO/conexion.php");

switch($accion){
    case "btnAgregar":
        
        if($txtTipo_documento==""){
            $error['Tipo_documento']="Escribe el tipo de documento";
        }
        if($txtID==""){
            $error['ID']="Escribe el Nº de identificación";
        }
        if($txtNombres=="" || (!preg_match("/^[a-zA-Zñáéíóú ]*$/",$txtNombres))){

            $error['Nombres']="Escribe los nombres";
        }
        if($txtApellidos=="" || (!preg_match("/^[a-zA-Zñáéíóú ]*$/",$txtApellidos))){

            $error['Apellidos']="Escribe los apellidos";
        }
        if($txtDireccion==""){
            $error['Direccion']="Escribe la dirección";
        }
        if(!filter_var($txtCorreo, FILTER_VALIDATE_EMAIL)){

            $error['Correo']="Escribe el correo";
        }
        if($txtPassword==""){
            $error['Password']="Escribe el password";
        }
        if($txtFecha_registro==""){
            $error['Fec_reg']="Escribe la fecha de registro";
        }
        
        if(count($error)>0){
            $mostrarModal=true;
            break;
        }
        
            $sentencia=$base->prepare("INSERT INTO usuarios_personas (Tipo_documento, ID_persona, Nombre_persona, Apellidos_persona, Direccion_persona, Correo_persona, Password_persona, Foto_persona, Fecha_registro, id_tipo) VALUES (:Tipo_documento, :ID_persona, :Nombre_persona, :Apellidos_persona, :Direccion_persona, :Correo_persona, :Password_persona, :Foto_persona, :Fecha_registro, :id_tipo)");
        
            $sentencia->bindParam(':Tipo_documento', $txtTipo_documento);
            $sentencia->bindParam(':ID_persona', $txtID);
            $sentencia->bindParam(':Nombre_persona', $txtNombres);
            $sentencia->bindParam(':Apellidos_persona', $txtApellidos);
            $sentencia->bindParam(':Direccion_persona', $txtDireccion);
            $sentencia->bindParam(':Correo_persona', $txtCorreo);
            $sentencia->bindParam(':Password_persona', $txtPassword);
            $sentencia->bindParam(':id_tipo', $tipo_usuario);
            
        
            $Fecha = new DateTime();
            $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";
        
            error_reporting(error_reporting() & ~E_NOTICE);
        
            $tmpFoto = $_FILES["txtFoto"]["tmp_name"];
        
            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"../fotos/".$nombreArchivo);
            }
            
            
            $sentencia->bindParam(':Foto_persona', $nombreArchivo);
            $sentencia->bindParam(':Fecha_registro', $txtFecha_registro);
            $sentencia->execute();       
            header('Location:index.php');
        
    break;
        
    case "btnModificar":
        
            $sentencia=$base->prepare(" UPDATE usuarios_personas SET Tipo_documento=:Tipo_documento, ID_persona=:ID_persona, Nombre_persona=:Nombre_persona, Apellidos_persona=:Apellidos_persona, Direccion_persona=:Direccion_persona, Correo_persona=:Correo_persona, Password_persona=:Password_persona, Fecha_registro=:Fecha_registro WHERE ID_persona=:ID_persona");
        
            $sentencia->bindParam(':Tipo_documento', $txtTipo_documento);
            $sentencia->bindParam(':ID_persona', $txtID);
            $sentencia->bindParam(':Nombre_persona', $txtNombres);
            $sentencia->bindParam(':Apellidos_persona', $txtApellidos);
            $sentencia->bindParam(':Direccion_persona', $txtDireccion);
            $sentencia->bindParam(':Correo_persona', $txtCorreo);
            $sentencia->bindParam(':Password_persona', $txtPassword);
            $sentencia->bindParam(':Fecha_registro', $txtFecha_registro);
            $sentencia->execute();
        
            $Fecha = new DateTime();
            $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";
        
            error_reporting(error_reporting() & ~E_NOTICE);
        
            $tmpFoto = $_FILES["txtFoto"]["tmp_name"];
        
            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"../fotos/".$nombreArchivo);
                
                $sentencia=$base->prepare("SELECT Foto_persona FROM usuarios_personas WHERE ID_persona=:ID_persona");
                $sentencia->bindParam(':ID_persona',$txtID);
                $sentencia->execute();
                $usuario=$sentencia->fetch(PDO::FETCH_LAZY);
                print_r($usuario);

                if (isset($usuario["Foto"])){
                    if (file_exists("../fotos/".$usuario["Foto"])){
                        if ($usuario['Foto']!="imagen.jpg"){                        
                            unlink("../fotos/".$usuario["Foto"]);
                        }

                    }
                }
                
                $sentencia=$base->prepare(" UPDATE usuarios_personas SET Foto_persona=:Foto_persona WHERE ID_persona=:ID_persona");
        
                $sentencia->bindParam(':Foto_persona', $nombreArchivo);
                $sentencia->bindParam(':ID_persona', $txtID);
                $sentencia->execute();
            }
        
            header('Location: index.php');
        
    break; 
        
    case "btnEliminar":
        
            $sentencia=$base->prepare("SELECT Foto_persona FROM usuarios_personas WHERE ID_persona=:ID_persona");
            $sentencia->bindParam(':ID_persona',$txtID);
            $sentencia->execute();
            $usuario=$sentencia->fetch(PDO::FETCH_LAZY);
            print_r($usuario);
        
            if(isset($usuario["Foto"])&&($item['Foto']!="imagen.jpg")){
                if(file_exists("../fotos/".$usuario["Foto"])){
                   
                    unlink("../fotos/".$usuario["Foto"]);
                }
                
            }
        
            $sentencia=$base->prepare(" DELETE FROM usuarios_personas WHERE ID_persona=:ID_persona");
            $sentencia->bindParam(':ID_persona', $txtID);
            $sentencia->execute();
            header('Location: index.php');
        
    break;
        
    case "btnCancelar":
        header('Location: index.php');
    break;
        
    case "Seleccionar":
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal=true;
        
        $sentencia=$base->prepare("SELECT * FROM usuarios_personas WHERE ID_persona=:ID_persona");
        $sentencia->bindParam(':ID_persona',$txtID);
        $sentencia->execute();
        $usuario=$sentencia->fetch(PDO::FETCH_LAZY);
        
        $txtTipo_documento=$usuario['Tipo_documento'];
        $txtID=$usuario['ID_persona'];
        $txtNombres=$usuario['Nombre_persona'];
        $txtApellidos=$usuario['Apellidos_persona'];
        $txtDireccion=$usuario['Direccion_persona'];
        $txtCorreo=$usuario['Correo_persona'];
        $txtPassword=$usuario['Password_persona'];
        $txtFoto=$usuario['Foto_persona'];
        $txtFecha_registro=$usuario['Fecha_registro'];
        
    break;
}

    $sentencia = $base->prepare("SELECT * FROM `usuarios_personas`");
    $sentencia->execute();
    $listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    //print_r($listaUsuarios);

?>

