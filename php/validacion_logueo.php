<?php
    session_start();
    require '../Conexion/conexion_bd.php';
    require '../funcs/funcs.php';
    
    $errors = array();
    
    if(!empty($_POST)) {
        $correousuario = $conexion->real_escape_string($_POST['usuario']);
        $password = $conexion->real_escape_string($_POST['clave']);
        
        if(isNullLogin($correousuario, $password)) {
            $errors[]="Debe llenar todos los campos";;
        }
        
        $errors[] = login($correousuario, $password);
        //echo resultBlock($errors);

        // show the array as javascript object
        echo "<script type='text/javascript'> alert(".json_encode($errors).") 
                window.history.go(-1);
              </script>";
    }


?>
