<?php
$user="root";
$psw="";
$dbname="passcheck";
$host="localhost";


try{
	$dsn="mysql:host=localhost;dbname=$dbname";
	$conexion = new PDO($dsn, $user, $psw);
	echo"";
}catch(PDOException $e){
	echo $e->getMessage();
}



?>