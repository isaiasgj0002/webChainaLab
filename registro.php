<?php
  include("conexionBD.php");
  $conexion = conectar();
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $password = $_POST['password'];
  $pass = password_hash($password,PASSWORD_DEFAULT);
  $query = "INSERT INTO usuarios_web_sistema(Nombres, usuario, clave) VALUES('$nombre','$correo','$pass')";
  if(mysqli_query($conexion,$query)){
    echo "<script>alert('Se registro el usuario');window.location='admin.php';</script>";
  }else{
    echo "<script>alert('error!');window.location='admin.php';</script>";
  }