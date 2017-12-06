<?php
include "conexion.php";
$id = $_POST["id"];
$image = $_POST["imagen"];

if($id == 0){
	echo "No hay nada que eliminar";
	exit;
}

$query = "delete from contactos where id = ".$id;
$elimina = mysql_query($query);

if(!$elimina){
	die ("No se pudo eliminar el registros").mysql_error();
}

unlink($image);
mysql_close();
?>
<script>alert("Se ha eliminado el registro correctamente");</script>
<script>window.location = "index.php";</script>