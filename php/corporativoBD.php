<?php 
class BD{
	function getDatos($columna,$tabla){
		$link = mysqli_connect('localhost','root','') or die ("Error1"); 
		$consulta="SELECT *FROM $tabla";
		mysqli_select_db($link,"medicapp_company") or die ("Error2");
		$result=mysqli_query($link,$consulta);
		$row =mysqli_fetch_array($result);
		return $row[$columna];
		mysqli_close($link); 
    }
    
    function setDatos(){
        $nombre=$_POST["nombre"];
        $telefono=$_POST["telefono"];
        $email=$_POST["email"];
        $cliente=$_POST["cliente"];
        $solicitud=$_POST["solicitud"];
        $mensaje=$_POST["mensaje"];
        $aceptar=$_POST["aceptar"];

			$sesion=session_start();
			require '../Conexion/conexion_bd.php';
			require '../funcs/funcs.php';

			if(!isset($_SESSION["ID_persona"])){
				header("Location: INDEX.html");
			}

			error_reporting(error_reporting() & ~E_NOTICE);

			$idUsuario = $_SESSION['ID_persona'];

			$sql = "SELECT ID_persona, Nombre_persona FROM usuarios_personas WHERE ID_persona = '$idUsuario'";
			$result = $conexion->query($sql);

			$row = $result->fetch_assoc();
		
        if($aceptar=='on' && $mensaje!=''){
			
			 

			
			
            $link = mysqli_connect('localhost','root','') or die ("Error1"); 
            mysqli_select_db($link,"medicapp_company") or die ("Error2");
            $insertar="INSERT INTO `medicapp_company`.`contactenos` (`Nombre`, `Telefono`, `Email`, `Cliente`, `Solicitud`, `Mensaje`) VALUES ('$nombre', '$telefono', '$email', '$cliente', '$solicitud', '$mensaje')";
            mysqli_query($link,$insertar) or die("Error3");
            mysqli_close($link);
            echo "hecho";
			if($sesion==true){
				 header('Status: 301 Moved Permanently', false, 301);
            	header('Location: ../contactenos_sesion.php');
			}else{
				header('Status: 301 Moved Permanently', false, 301);
				header('Location: ../contactenos.html');
			}
           
        }else{
			
            echo "fail";
            if($sesion==true){
				 header('Status: 301 Moved Permanently', false, 301);
            	header('Location: ../contactenos_sesion.php');
			}else{
				header('Status: 301 Moved Permanently', false, 301);
				header('Location: ../contactenos.html');
			}
        }
        
    }
}
$bd= new BD;
//echo $bd->getDatos("Nombre","contactenos");
$bd->setDatos();
?> 
 