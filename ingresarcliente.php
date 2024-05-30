<?php
    require 'conexion.php';
    $clave=filter_input(INPUT_GET,'clave');
    $nombre=filter_input(INPUT_GET,'nombre');
    $apellido=filter_input(INPUT_GET,'apellido');
    $telefono=filter_input(INPUT_GET,'telefono');
    $email=filter_input(INPUT_GET,'email');
   
   
    //prepare : prepara la consulta 
    $consulta=$conexion->prepare("INSERT INTO `clientes`(`id_cliente`,`nombre`, `apellido`, `telefono`, `email`) VALUES (:clave, :nomb, :apell,:tel, :email)");
    
   //bindParam que es? relaciona o asocia los parametros y los vuelle a filtrar
    $consulta->bindParam(':clave',$clave);
    $consulta->bindParam(':nomb',$nombre);
    $consulta->bindParam(':apell',$apellido);
    $consulta->bindParam(':tel',$telefono);
    $consulta->bindParam(':email',$email);
  
    if($consulta->execute()) {
       echo "Se ha creado el nuevo registro!";
       header('Location:ingresoevento.html');}
       
    //si no se ejecuta devuelve falso saber si no se dio de alta la base de datos
       else{
        echo "no quiere!";
    }
    echo $conexion->lastInsertId();
    
   
?>