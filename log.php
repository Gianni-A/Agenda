<?php
include "conexion.php";
$usuario = $_POST["usuario"];
$pass = $_POST["password"];

if (empty($usuario) || empty($pass)) {
	?><script>alert("Debe rellenar todos los datos");</script><?php
	return false;
}

$query = mysql_query("select usuario, pass from usuarios where usuario = '$usuario' and pass = '$pass'");
$row = mysql_fetch_array($query);

if ($row["usuario"] == $usuario && $row["pass"] == $pass) {
	?><script>alert("Bienvenido");
	window.location = "index.php";
	</script><?php
}
else{
	?><script>alert("Los datos son incorrectos");
	window.location = "login.php";
	</script><?php
}

?>