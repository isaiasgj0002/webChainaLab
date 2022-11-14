<?php
  include("conexionBD.php");
  $conexion = conectar();
  $id=$_POST["id"];
  $nombre = $_POST["cliente"];
  $cantidad = $_POST["cantidad"];
  $fecha = $_POST["fecha"];
  $hora = $_POST["hora"];
  $contacto = $_POST["contacto"];
  $actualizar="UPDATE t_reservas set cliente = '$nombre', cantidad = '$cantidad', fecha = '$fecha', hora ='$hora', contacto = '$contacto' WHERE id = '$id'";
  $resultado = mysqli_query($conexion, $actualizar);
  if($resultado){
    header("Location:admin.php");
  }else{
    echo '<script>
           alert("Se produjo un error");
           window.history.go(-1);
          </script>';
  }