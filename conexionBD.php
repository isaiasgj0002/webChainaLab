<?php
function conectar()
{
	$servidor="localhost";
	$usuario="root";
	$password="";
	$bd="chainalab_database";
	$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
	return $conexion;
}
?>