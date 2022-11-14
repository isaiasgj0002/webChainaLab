<?php
   $destino = "chainalabcusco@gmail.com";
   $nombre = $_POST["Nombre"];
   $telefono = $_POST["Telefono"];
   $correo = $_POST["Correo"];
   $mensaje = $_POST["mensaje"];
   $contenido = "Nombre: ". $nombre . "\nCorreo: " . $correo . "\nTelefono: " . $telefono . "\nMensaje" . $mensaje;
   mail($destino,"contacto", $contenido);
   echo '<script>alert("Gracias por su mensaje, pronto le responderemos");window.history.go(-1);</script>';
?>