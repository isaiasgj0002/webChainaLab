<?php
  include("conexionBD.php");
  $conexion = conectar();
  $nombre = $_POST["nombres"];
  $cantidad = $_POST["cantidad"];
  $fecha = $_POST["fecha"];
  $hora = $_POST["hora"];
  $contacto = $_POST["contacto"];
  $insertar = "INSERT INTO t_reservas(cliente, cantidad, fecha, hora, contacto, Estado) VALUES ('$nombre','$cantidad','$fecha','$hora','$contacto','Pendiente')";
  $resultado = mysqli_query($conexion, $insertar);
  if(!$resultado){
    echo '<script>alert("Se produjo un error al reservar");window.history.go(-1);</script>';
  }else{
    echo '<script>
           alert("La reserva se realizo con exito, gracias por elegir Chaina Lab");
           window.history.go(-1);
         </script>';
  }
  mysqli_close($conexion);
?>