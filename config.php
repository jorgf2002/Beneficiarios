<?php
error_reporting(-1);
	$dbhost='localhost';
	$dbname='sianda';//monitore_cronograma
	$dbuser='root';//monitore
	$dbpass='';//EOF5s8m0Yc
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($db->connect_errno) {
	die ('<h1>Fallo al conectar a MySQL: ('.$db->connect_errno .')'.$db->connect_error.'</h1>');
}
//Configuracion de la conexion a base de datos
  $bd_host = $dbhost; 
  $bd_usuario =$dbuser ; 
  $bd_password = $dbpass; 
  $bd_base = $dbname;  
	$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
	mysql_select_db($bd_base, $con);
	  $conexion =  new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	
	
?>