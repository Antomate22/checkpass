<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>lista clientes</title>

</head>
<body>
	<table border="3">
		<tr><th colspan=5> Lista de clientes</tr></tr>
            <tr>
			<th>clave</th>
            <th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th>email</th>	
		</tr>
<?php
require "conexion.php";//realizo la conexion
$consulta=$conexion->prepare("SELECT * FROM clientes");
//preparo la consulta SQL
$consulta->execute();
$datos=$consulta->fetchALL(PDO::FETCH_ASSOC);
// con el resultado genero un diccionario
foreach ($datos as $elemento) {	
	echo"<tr>
		<td>".$elemento['id_cliente']."</td>";
	echo"<td>".$elemento['nombre'];
	echo"<td>".$elemento['apellido']."</td>";
	echo"<td>".$elemento['telefono']."</td>";
	echo"<td>".$elemento['email']."</td>";
	echo"</tr>";

}
echo"</table>";

?>
</body>
</html>