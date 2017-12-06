<?php
include "conexion.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$edad = $_POST["edad"];
$telefono = $_POST["telefono"];
$imagen = $_FILES['imagen']['name'];

if(empty($nombre) || empty($apellido) || empty($edad) || empty($telefono)){
	echo "Debe rellenar todos los campos";
	exit;
}

if($id == 0){
$query = "insert into contactos (nombre,apellido,edad,telefono,imagen) VALUES ('$nombre','$apellido',$edad,'$telefono','$imagen')";
}
else{
	$query = "update contactos set nombre = '$nombre', apellido = '$apellido', edad = $edad, telefono = '$telefono', imagen = '$imagen' where id = $id";
}
$ejecuta = mysql_query($query);

if(!$ejecuta){
	die ("No se pudo ejecutar la query").mysql_error();
}
if (!empty($imagen)){
	move_uploaded_file($_FILES['imagen']['tmp_name'], 'img/'.$_FILES['imagen']['name']);
}


mysql_close();
?>
<script>alert("Los datos se han actualizado correctamente");</script>
<script>window.location="index.php";</script>