<?php
  include("conexionBD.php");
  $conexion = conectar();
  $id=$_GET["id"];
  $cancelar = "DELETE FROM t_reservas where id = '$id'";
  $resultado = mysqli_query($conexion, $cancelar);
  if($resultado){
    header("Location:admin.php");
  }else{
    echo '<script>
           alert("Se produjo un error");
           window.history.go(-1);
          </script>';
  }