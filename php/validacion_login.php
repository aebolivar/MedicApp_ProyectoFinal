<?php

include ("../ConexionPDO/conexion.php");

$correousuario = $_POST["usuario"];
$password = $_POST["clave"];
$contador=0;


$sql="SELECT * FROM usuarios_personas WHERE Correo_persona= '$correousuario'";
	
	$resultado=$base->prepare($sql);	
		
	$resultado->execute(array(":Correo_persona"=>$correousuario));
		
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
			
			//echo "Usuario: " . $registro['Correo_persona'] . " Contraseña: " . $registro['Password_persona'] . "<br>";	
            if(password_verify($password, $registro['Password_persona'])){
                
                $contador++;
                
            }
					
			
		}

        if($contador>0){
            
            header('Location: ../SesionCliente.php');
            
        }else{
            echo '<script>
                    alert("Login incorrecto. Intente nuevamente");
                    window.history.go(-1);
                  </script>';
        }
		
							
		
		
		$resultado->closeCursor();




?>





