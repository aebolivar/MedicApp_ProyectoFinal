<?php

try{
	
	$base=new PDO('mysql:host=localhost; dbname=medicapp_company', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$base->exec("SET CHARACTER SET UTF8");
	
}catch(Exception $e){
	die('Error' . $e->getMessage());
	echo "Linea del error " . $e->getLine();
	
}

?>

