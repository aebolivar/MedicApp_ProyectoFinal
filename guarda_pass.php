<?php

    require 'Conexion/conexion_bd.php';
    require 'funcs/funcs.php';

    //campos ocultos
    $user_id = $conexion->real_escape_string($_POST['user_id']);
    $token = $conexion->real_escape_string($_POST['token']);
    $password = $conexion->real_escape_string($_POST['password']);
    $con_password = $conexion->real_escape_string($_POST['con_password']);

    if(validaPassword($password, $con_password)){
        
        $pass_hash = hashPassword($password);

        if(cambiaPassword($pass_hash, $user_id, $token)){
            echo "<script type='text/javascript'> 
						 alert('Contraseña modificada con exito.');
						 window.location.replace('index.html');
                  </script>";
        } else{
            echo "<script type='text/javascript'> 
						 alert('Error al modificar la contraseña');
						 window.location.replace('index.html');
                </script>";
        }
    } else {
        echo "<script type='text/javascript'> 
						 alert('Las contraseñas no coinciden');
						 window.location.replace('index.html');
               </script>";
    }

?>