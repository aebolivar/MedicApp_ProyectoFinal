<?php

function isNullLogin($correousuario, $password) {
    if(strlen(trim($correousuario)) < 1 || strlen(trim($password)) < 1) {
        return true;
    }else{
        return false;
    }
}


function login($correousuario, $password) {
    
		global $conexion;
		
		$stmt = $conexion->prepare("SELECT ID_persona, id_tipo, Password_persona FROM usuarios_personas WHERE Correo_persona = ?");
		$stmt->bind_param("s", $correousuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			
				
				$stmt->bind_result($ID_persona, $id_tipo, $passwd);
				$stmt->fetch();
            
				$validaPassw = password_verify($password, $passwd);
				
				if($validaPassw){
					
					lastSession($ID_persona);
                    $_SESSION['ID_persona'] = $ID_persona;
                    $_SESSION['tipo_usuario'] = $id_tipo;
                    
                    if($validaPassw && ($_SESSION['tipo_usuario'] = $id_tipo)==2){
                        header("location: ../SesionCliente.php");
                    }else{
                        header("location: ../SesionAdmin.php");
                    }
                    
					
					} else {
					
					$errors = "La contraseña es incorrecta";
				}
			} else {
			$errors = "El correo electronico no existe";
		}
		return $errors;
}


function resultBlock($errors) {
    if(count($errors) > 0) {
        
        echo "<div id='error' class='alert alert-danger' role='alert'> <a href='#' onclick=\"showHide('error');\">[X]</a> <ul>";
        foreach($errors as $error) {
            echo "<li>".$error."</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}

function lastSession($ID_persona){
    
    global $conexion;
    
    $stmt = $conexion->prepare("UPDATE usuarios_personas SET last_session=NOW(), token_password='', password_request=0 WHERE ID_persona = ?");
    $stmt->bind_param('s', $ID_persona);
    $stmt->execute();
    $stmt->close();
}

function emailExiste($email){
    
    global $conexion;
    
    $stmt = $conexion->prepare("SELECT Id_persona FROM usuarios_personas WHERE Correo_persona = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt->close();
    
    if($num > 0){
        
        return true;
        } else {
        return false;
    }
    
}

function getValor($campo, $campoWhere, $valor) {
    
    global $conexion;
    
    $stmt = $conexion->prepare("SELECT $campo FROM usuarios_personas WHERE $campoWhere = ? LIMIT 1");
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    
    if ($num > 0) {
        $stmt->bind_result($_campo);
        $stmt->fetch();
        return $_campo;
    } else {
			return null;	
    }
   
}

function generateToken() {
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
}

function hashPassword($password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}



function generaTokenPass($user_id) {
    
    global $conexion;
    
    $token = generateToken();
    
    $stmt = $conexion->prepare("UPDATE usuarios_personas SET token_password=?, password_request=1 WHERE ID_persona = ?");
    $stmt->bind_param('ss', $token, $user_id);
    $stmt->execute();
    $stmt->close();
    
    return $token;
}

function verificaTokenPass($user_id, $token){
    
    global $conexion;
    
    $stmt = $conexion->prepare("SELECT id_tipo FROM usuarios_personas WHERE ID_persona = ? AND token_password = ? AND password_request = 1 LIMIT 1");
    $stmt->bind_param('is', $user_id, $token);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    
    if ($num > 0) {
        
			$stmt->bind_result($id_tipo);
			$stmt->fetch();
			if($id_tipo == 2)
			{
				return true;
			}
			else 
			{
				return false;
			}
     } else {
			return false;	
     }

}

function cambiaPassword($password, $user_id, $token){
    
    global $conexion;
    
    $stmt = $conexion->prepare("UPDATE usuarios_personas SET Password_persona = ?, token_password='', password_request=0 WHERE ID_persona = ? AND token_password = ?");
    
    $stmt->bind_param('sis', $password, $user_id, $token);
    
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

function enviarEmail($email, $nombre, $asunto, $cuerpo){
    
    require_once 'PHPMailer/PHPMailerAutoload.php';
    
    $mail = new PHPMailer();
    $mail->isSMTP();//protocolo de envio
    $mail->SMTPAuth = true;//
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';//gmail para nuestro caso
    $mail->Port = 587; //Modificar
		
	$mail->Username = 'medicappcompany@gmail.com';
	$mail->Password = 'fhumanosPF22';
		
	$mail->setFrom('medicappcompany@gmail.com', 'MedicApp Company'); //Modificar
	$mail->addAddress($email, $nombre);
		
    $mail->Subject = $asunto;
	$mail->Body    = $cuerpo;
	$mail->IsHTML(true);
    
    if($mail->send()){
        return true;
    }else{
		return false;
    }
}

function isEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

function validaPassword($var1, $var2){
    
    if (strcmp($var1, $var2) !== 0){
        return false;
    } else {
        return true;
    }
}


    


?>
