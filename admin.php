<?php
session_start();
$varsession = $_SESSION['usuario'];
if ($varsession == null || $varsession = '') {
	echo "Usted no tiene autorizacion para acceder a este sistema";
	die();
}
date_default_timezone_set("America/Lima");
$fecha = date('Y-m-d');
include("conexionBD.php");
$conexion = conectar();
$reservas = "SELECT * FROM t_reservas WHERE fecha='$fecha'";
$reservas2 = "SELECT * FROM t_reservas";
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion de reservas</title>
	<link rel="stylesheet" href="css/estilos_panel.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
	<center>
		<h2>Reservas Chaina Lab</h2>
	</center>
	<center>
		<p>Formato de fecha: año/mes/dia</p>
	</center>
	<!---
<a href="registroUsuario.php">Limpiar</a>
--->
	<center>
		<h2>Reservas de hoy</h2>
	</center>
	<table class="table">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Cantidad</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Contacto</th>
				<th>Estado</th>
				<th>Operacion</th>
			</tr>
		</thead>
		<?php $resultado = mysqli_query($conexion, $reservas);
		while ($row = mysqli_fetch_assoc($resultado)) { ?>
			<tbody>
				<tr>
					<td data-titulo="cliente"><?php echo $row["cliente"]; ?></td>
					<td data-titulo="cantidad"><?php echo $row["cantidad"]; ?></td>
					<td data-titulo="fecha"><?php echo $row["fecha"]; ?></td>
					<td data-titulo="hora"><?php echo $row["hora"]; ?></td>
					<td data-titulo="contacto"><?php echo $row["contacto"]; ?></td>
					<td data-titulo="estado"><?php echo $row["Estado"]; ?></td>
					<td>
						<a href="editar_admin.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Editar</a>
						<a data-bs-toggle="modal" data-bs-target="#exampleModal" class="table-item-link btn btn-danger">Eliminar</a>
					</td>
				</tr>
			</tbody>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar reserva</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							¿Estas seguro que deseas eliminar la reserva?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<a class="btn btn-danger" href="eliminar.php?id=<?php echo $row["id"]; ?>">Eliminar</a>
						</div>
					</div>
				</div>
			</div>
		<?php }
		mysqli_free_result($resultado); ?>
	</table>
	<center>
		<h2>Todas las reservas</h2>
		<a href="limpiar.php" class="btn btn-warning">Limpiar</a>
		<a href="registrousuario.php" class="btn btn-success">Registrar Usuario</a>
	</center>
	<table class="table">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Cantidad</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Contacto</th>
				<th>Estado</th>
				<th>Operacion</th>
			</tr>
		</thead>
		<?php $resultadocompleto = mysqli_query($conexion, $reservas2);
		while ($row = mysqli_fetch_assoc($resultadocompleto)) { ?>
			<tbody>
				<tr>
					<td data-titulo="cliente"><?php echo $row["cliente"]; ?></td>
					<td data-titulo="cantidad"><?php echo $row["cantidad"]; ?></td>
					<td data-titulo="fecha"><?php echo $row["fecha"]; ?></td>
					<td data-titulo="hora"><?php echo $row["hora"]; ?></td>
					<td data-titulo="contacto"><?php echo $row["contacto"]; ?></td>
					<td data-titulo="estado"><?php echo $row["Estado"]; ?></td>
					<td>
						<a href="editar_admin.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Editar</a>
						<a data-bs-toggle="modal" data-bs-target="#exampleModal" class="table-item-link btn btn-danger">Eliminar</a>
					</td>
				</tr>
			</tbody>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar reserva</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							¿Estas seguro que deseas eliminar la reserva?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<a class="btn btn-danger" href="eliminar.php?id=<?php echo $row["id"]; ?>">Eliminar</a>
						</div>
					</div>
				</div>
			</div>
		<?php }
		mysqli_free_result($resultadocompleto); ?>
	</table>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>