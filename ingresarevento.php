<?php
    require 'conexion.php';

    $tipo=filter_input(INPUT_GET,'tipo');
    $cantidad=filter_input(INPUT_GET,'cantidad');
    $fecha=filter_input(INPUT_GET,'fecha');
    $hora=filter_input(INPUT_GET,'hora');
    $cliente=filter_input(INPUT_GET,'cliente');
    //prepare : prepara la consulta 
    $consulta=$conexion->prepare("INSERT INTO `eventos`(`tipoevento`, `cantidadinvitados`, `fecha`, `hora`, `id_cliente`) VALUES (:tipo, :cantidad, :fecha, :hora, :cliente)");   
   //bindParam que es? relaciona o asocia los parametros y los vuelle a filtrar
    $consulta->bindParam(':tipo',$tipo);
    $consulta->bindParam(':cantidad',$cantidad);
    $consulta->bindParam(':fecha',$fecha);
    $consulta->bindParam(':hora',$hora);
    $consulta->bindParam(':cliente',$cliente);

    if($consulta->execute()) {
       echo "Se ha creado el nuevo registro!";
    }
       
    //si no se ejecuta devuelve falso saber si no se dio de alta la base de datos
       else{
        echo "no quiere!";
    }
    echo $conexion->lastInsertId();
    
   
?>