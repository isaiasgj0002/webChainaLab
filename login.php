<?php
session_start();
$usuario = $_POST['usuario'];
$password = $_POST['clave'];
include("conexionBD.php");
$conexion = conectar();
$consulta = "SELECT * FROM usuarios_web_sistema WHERE usuario='$usuario'";
$query = mysqli_query($conexion,$consulta);
$nr = mysqli_num_rows($query);
$buscarcontra = mysqli_fetch_array($query);
if(($nr==1) && (password_verify($password,$buscarcontra['clave']))){
    $_SESSION['usuario'] = $usuario;
    header("location:admin.php");
}else{
    echo "Error en la autenticacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>