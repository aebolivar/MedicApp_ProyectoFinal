<?php
include '../Conexion/conexion_bd.php';

$tipo_documento = $_POST["Tipo_documneto"];
$id = trim($_POST["ID"]);
$nombres = trim($_POST["NAME"]);
$apellidos = trim($_POST["APELL"]);
$direccion = trim($_POST["DIREC"]);
$correo = trim($_POST["CORREO"]);
$password = trim($_POST["inputPassword"]);
$imagen = '';//Error, img invalidad - espacio vacío
$fecha_registro = date("d/m/y");
$recaptcha = $_POST['g-recaptcha-response'];

$tipo_usuario = 2;

$pass_cifrado = password_hash($password, PASSWORD_DEFAULT);

//VALIDACION FOTO
if (isset($_FILES["archivo"])) {
    $file = $_FILES["archivo"];
    $nombre = $file["name"];
    $tipo = $file["type"];//confirmacion imagen
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];//bits - control de archivos grandes
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../fotos/";
    if ($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
        echo "Error, el archivo no es una imagen";
    }
    else if ($size > 3*1024*1024) {
        echo "Error, el tamaño máximo permitido es de 3MB";
    }
    else{
        $Fecha = new DateTime();
        $src = $carpeta.$Fecha->getTimestamp()."_".$nombre;//guardar
        move_uploaded_file($ruta_provisional, $src);
        $imagen = "".$Fecha->getTimestamp()."_".$nombre;//nombre
    }
    
}


//RECAPTCHA
if($recaptcha != ''){
    $secret = "6LeessEZAAAAACMRbnDq1j9LecVsGUj79w1G_rfL";
    $ip = $_SERVER['REMOTE_ADDR'];
    $var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha&remoteip=$ip");
    $array = json_decode($var, true);
    if($array['success']){
        
        //REGISTRO USUARIO
        $insertar = "INSERT INTO usuarios_personas (Tipo_documento, ID_persona, Nombre_persona, Apellidos_persona, Direccion_persona, Correo_persona, Password_persona, Foto_persona, Fecha_registro, id_tipo) VALUES ('$tipo_documento', '$id','$nombres','$apellidos','$direccion','$correo','$pass_cifrado', '$imagen','$fecha_registro', '$tipo_usuario')";

        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios_personas WHERE ID_Persona = '$id'");
        if (mysqli_num_rows($verificar_usuario) > 0) {
            echo '<script>
                    alert("El usuario ya está registrado");
                    window.history.go(-1);
                  </script>';
            exit;
        }

        $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios_personas WHERE Correo_persona = '$correo'");
        if (mysqli_num_rows($verificar_correo) > 0) {
            echo '<script>
                    alert("El correo ya está registrado");
                    window.history.go(-1);
                  </script>';
            exit;
        }


        $resultado = mysqli_query($conexion, $insertar);

        if (!$resultado) {
             echo '<script>
                    alert("Error al registrarse.");
                    window.history.go(-1);
                  </script>';
        } else {
             echo '<script>
                    alert("Usuario registrado exitosamente.");
                    window.history.go(-1);
                  </script>';
        }

        mysqli_close($conexion);
        
        
        
    }else{
        //Recaptcha
        echo '<script>
                alert("Error al comprobar catpcha");
                window.history.go(-1);
             </script>';
    }
}else{
    echo '<script>
            alert("Por favor verifica la realizacion del Captcha");
            window.history.go(-1);
          </script>';
}

