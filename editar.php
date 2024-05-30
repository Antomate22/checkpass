<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stilos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
<div class="content">
    <div class="title"></div>
    <div class="info">
        <div class="lateral">
        </div>
        <div class="central">
            <form action="modificar.php">
                <?php
                    require "conexion.php";
                    $nroestudiante=filter_input(INPUT_GET,'nroestudiante');
                    $consulta=$conexion->prepare("SELECT * FROM participantes");
                    $consulta->execute();
                    $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                    echo"<table border=3>
                    <tr><th colspan=7> Lista de Participantes</tr></tr>
                    <tr>
                        <th> Carnet</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Curso</th>
                        <th>Telefono</th>
                    </tr>";
                    
                    $n=1;
                    foreach($datos as $elemento){
                        if($elemento['nroestudiante']==$nroestudiante){
                            echo"\n    <tr>
                        <td>".$elemento['nroestudiante']."</td>
                        <td><input size='10%' type='text' name='nombre' value='".$elemento['nombre']."' placeholder='".$elemento['nombre']."'></td>
                        <td><input size='10%' type='text' name='apellido' value='".$elemento['apellido']."' placeholder='".$elemento['apellido']."'></td>
                        <td><input size='10%' type='text' name='dni' value='".$elemento['dni']."' placeholder='".$elemento['dni']."'></td>
                        <td><input size='10%' type='text' name='curso' value='".$elemento['curso']."' placeholder='".$elemento['curso']."'></td>
                        <td><input size='10%' type='text' name='telefono' value='".$elemento['telefono']."' placeholder='".$elemento['telefono']."'></td>
                        <input type='hidden' name='nroestudiante' value='".$elemento['nroestudiante']."'>
                        <td><a style='font-size:80%;' href='eliminar.php?nroestudiante='".$elemento['nroestudiante']."'>Cancelar</a></td>
                        <td><input type='submit' value='Listo'></td>";
                        } else {
                            
                            echo"\n    <tr>
                        <td>".$elemento['nroestudiante']."</td>
                        <td>".$elemento['apellido']."</td>
                        <td>".$elemento['nombre']."</td>";
                        echo"<td>".$elemento['dni']."</td>";
	                    echo"<td>".$elemento['curso']."</td>";
	                    echo"<td>".$elemento['telefono']."</td>";
                        echo '<td><a style="font-size:80%;" href="eliminar.php?nroestudiante='.$elemento['nroestudiante'].'">Eliminar</a></td>';
                        echo '<td><a style="font-size:80%;" href="editar.php?nroestudiante='.$elemento['nroestudiante'].'">Editar</a></td>';
                        }
                        echo"\n    </tr>";
                        $n++;
                    }
                ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>
