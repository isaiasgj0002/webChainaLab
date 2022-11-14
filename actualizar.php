<?php
include("conexionBD.php");
$id = $_GET["id"];
$conexion = conectar();
$reservas = "SELECT * FROM t_reservas WHERE id='$id'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis reservas</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_panel_usuario.css">
    <link href="https://file.myfontastic.com/fBbG2MXfBLKEYsNJpastyH/icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">
</head>
<body>
<header class="header">
        <div class="contenedor">
            <img src="images/logo.jpeg" class="logo">
            <span class="icon-menu" id="btn-menu"></span>
            <nav class="nav" id="nav">
                <ul class="menu">
                    <li class="menu--item"><a class="menu--link" href="index.html">Inicio</a></li>
                    <li class="menu--item"><a class="menu--link" href="carta.html">Nuestra carta</a></li>
                    <li class="menu--item"><a class="menu--link" href="galeria.html">Galeria de imagenes</a></li>
                    <li class="menu--item"><a class="menu--link" href="contacto.html">Contacto</a></li>
                    <li class="menu--item"><a class="menu--link" href="reservar.html">Reservas</a></li>
                    <li class="menu--item"><a class="menu--link" href="loginusuario.html">Ver mis reservas</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <center><h2>Editar reserva</h2></center>
<form class="container-table" action="procesar_editar.php" method="post"> 
<table>
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Cantidad</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Contacto</th>
				<th>Operacion</th>
			</tr>
		</thead>
		<?php $resultado = mysqli_query($conexion, $reservas);
        while($row=mysqli_fetch_assoc($resultado)) { ?>
		<tbody>
			<tr>
                <input type = "hidden" value="<?php echo $row["id"];?>" name = "id">
				<td data-titulo="cliente"><input type="text" value="<?php echo $row["cliente"];?>" name="cliente" required></td>
				<td data-titulo="cantidad"><input type="number" value="<?php echo $row["cantidad"];?>" name = "cantidad" required></td>
				<td data-titulo="fecha"><input type="date" value="<?php echo $row["fecha"];?>" name="fecha" required id="datefield"></td>
				<td data-titulo="hora"><input type="time" value="<?php echo $row["hora"];?>" name="hora" min="12:30" max="21:30" required></td>
				<td data-titulo="contacto"><input type="text" value="<?php echo $row["contacto"];?>" name = "contacto" required></td>
				<td>
					<input type="submit" value="Actualizar">
				</td>
			</tr>
		</tbody>
		<?php } mysqli_free_result($resultado);?>
	</table>
</form>
    <script src="js/menu.js"></script>
    <script src="js/fechaactual.js"></script>
</body>
</html>