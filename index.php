<html>
	<head>
	<title>Agenda de contactos</title>	
	<script>
		function ree(id){
			window.location = "index.php?id="+id;
		}
	</script>
	</head>
	<body>
		<?php
			include "conexion.php";
			if(isset($_GET['id'])){
				$idGet = $_GET["id"];
			}
			else{
				$idGet = 0;
			}
			
			if($idGet == 0){
				$nombre = "";
				$apellido = "";
				$edad = "";
				$telefono = "";
				$imagen = "";
			}else{
				$query = "select * from contactos where id = ".$idGet;
				$ejecuta = mysql_query($query);
				$row = mysql_fetch_array($ejecuta);
				$nombre = $row["nombre"];
				$apellido = $row["apellido"];
				$edad = $row["edad"];
				$telefono = $row["telefono"];
				$imagen = $row["imagen"];
			}
		?>
		<form action="datos.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$idGet?>">
			<input type="text" name="nombre" placeholder="nombre" value="<?=$nombre?>"><br>
			<input type="text" name="apellido" placeholder="apellido" value="<?=$apellido?>"><br>
			<input type="number" name="edad" placeholder="edad" value="<?=$edad?>"><br>
			<input type="text" name="telefono" placeholder="telefono" value="<?=$telefono?>"><br>
			<input type="file" name="imagen" value="<?=$imagen?>"><br>
			
			<input type="submit" value="Guardar Datos">
		</form>

		<table border="1">
		<tr>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Edad</td>
			<td>Telefono</td>
			<td>Imagen</td>
			<td></td>
			<td></td>
		</tr>
		<?php
			include "conexion.php";
			$query = "select * from contactos";
			$peticion = mysql_query($query);
			while($file = mysql_fetch_array($peticion)){
				?>
					<tr>
						<td><?=$file["nombre"];?></td>
						<td><?=$file["apellido"];?></td>
						<td><?=$file["edad"];?></td>
						<td><?=$file["telefono"];?></td>
						<td><img src="img/<?=$file["imagen"];?>" alt="" width="100px" heigh="50px"></td>
						<td>
							<button onclick="ree(<?=$file['id']?>)">Edita</button>
						</td>
						<td>
							<form action="elimina.php" method="post">
								<input type="hidden" value="<?=$file['id']?>" name="id">
								<input type="hidden" value="img/<?=$file['imagen'];?>" name="imagen">
								<input type="submit" value="Eliminar">
							</form>
						</td>
					</tr>
				<?php
			}
		?>
		</table>
	</body>
</html>
