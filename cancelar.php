<?php
  include("conexionBD.php");
  $conexion = conectar();
  $id=$_GET["id"];
  $cancelar = "UPDATE t_reservas set Estado = 'Cancelado', contacto = '-_-_-_-' where id = '$id'";
  $resultado = mysqli_query($conexion, $cancelar);
  if($resultado){
    header("Location:loginusuario.html");
  }else{
    echo '<script>
           alert("Se produjo un error");
           window.history.go(-1);
          </script>';
  }