<?php
$conexion = mysql_connect("localhost:3306","root","");
if(!$conexion){
	die ("No se pudo conectar a la base de datos").mysql_error();
}
$bd = mysql_select_db("agenda",$conexion);

?>