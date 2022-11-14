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
    <link rel="stylesheet" href="css/estilos_panel.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<center><h2>Editar reserva</h2></center>
<form class="container-table" action="procesar_editar_admin.php" method="post"> 
<table class="table">
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
					<input type="submit" value="Actualizar" class="btn btn-success">
				</td>
			</tr>
		</tbody>
		<?php } mysqli_free_result($resultado);?>
	</table>
</form>
    <script src="js/menu.js"></script>
    <script src="js/fechaactual.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>