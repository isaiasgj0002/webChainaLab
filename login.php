<?php
session_start();
$usuario = $_POST['usuario'];
$password = $_POST['clave'];
include("conexionBD.php");
$conexion = conectar();
$consulta = "SELECT * FROM usuarios_web_sistema WHERE usuario='$usuario' AND clave='$password'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);
if($filas > 0){
    $_SESSION['usuario'] = $usuario;
    header("location:admin.php");
}else{
    echo "Error en la autenticacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>