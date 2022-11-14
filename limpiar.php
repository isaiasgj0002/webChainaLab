<?php
include("conexionBD.php");
$conexion=conectar();
date_default_timezone_set("America/Lima");
$fecha = date('Y-m-d');
$limpiar = "DELETE FROM t_reservas WHERE fecha<'$fecha' or Estado = 'Cancelado'";
$resultado = mysqli_query($conexion, $limpiar);
if($resultado){
  header("Location:admin.php");
}else{
  echo '<script>
         alert("Se produjo un error");
         window.history.go(-1);
        </script>';
}