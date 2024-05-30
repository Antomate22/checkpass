<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>lista clientes</title>

</head>
<body>
   <h1>detalles</h1> 
   <table border="3">
		<tr></tr>
            <tr>
			<th>evento</th>
            <th>cliente</th>
			<th>tipo evento</th>
			<th>cantidad invitados</th>
			<th>fecha</th>	
            <th>hora</th>
		</tr>


<?php
require "conexion.php";//realizo la conexion
$consulta=$conexion->prepare("SELECT * FROM eventos");
//preparo la consulta SQL
$consulta->execute();
$datos=$consulta->fetchALL(PDO::FETCH_ASSOC);
// con el resultado genero un diccionario


foreach ($datos as $elemento) {	
	echo"<tr>
		<td>".$elemento['id_evento']."</td>";
	echo"<td>".$elemento['id_cliente'];
	echo"<td>".$elemento['tipoevento']."</td>";
	echo"<td>".$elemento['cantidadinvitados']."</td>";
	echo"<td>".$elemento['fecha']."</td>";
    echo"<td>".$elemento['hora']."</td>";
	echo"</tr>";
    $cantidad =$elemento['cantidadinvitados'];
}
echo"</table>";

?>
</body>
</html>