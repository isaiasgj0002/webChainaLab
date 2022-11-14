<?php
include("conexionBD.php");
$contacto = $_POST['usuario'];
session_start();
$_SESSION['usuario']=$contacto;
$varsession = $_SESSION['usuario'];
if($varsession==null || $varsession =''){
    echo "Usted no tiene autorizacion";
    die();
}
$conexion = conectar();
$reservas = "SELECT * FROM t_reservas WHERE contacto = '$contacto'";
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
    <center><h2>Mis Reservas</h2></center>
    <table>
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
        while($row=mysqli_fetch_assoc($resultado)) { ?>
		<tbody>
			<tr>
				<td data-titulo="cliente"><?php echo $row["cliente"];?></td>
				<td data-titulo="cantidad"><?php echo $row["cantidad"];?></td>
				<td data-titulo="fecha"><?php echo $row["fecha"];?></td>
				<td data-titulo="hora"><?php echo $row["hora"];?></td>
				<td data-titulo="contacto"><?php echo $row["contacto"];?></td>
				<td data-titulo="estado"><?php echo $row["Estado"];?></td>
				<td>
					<a href="actualizar.php?id=<?php echo $row["id"];?>">Editar</a>
					<a href="cancelar.php?id=<?php echo $row["id"];?>" class="table-item-link">Cancelar</a>
				</td>
			</tr>
		</tbody>
		<?php } mysqli_free_result($resultado);?>
	</table>
    <footer class="footer">
        <div class="wrap-footer">
            <div class="text-element-footer element-footer">
                <h3 class="main-c">Ubicanos</h3>
                <ul>
                    <li>&#9668;Av. Fortunato herrera 204 Urb.Magisterial I etapa Cusco</li>
                </ul>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.1898575544988!2d-71.95138688568818!3d-13.523937290495256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916e7f8dc0d40255%3A0x4d70b41da7ec0253!2sChaina%20Lab!5e0!3m2!1ses-419!2spe!4v1664893919449!5m2!1ses-419!2spe" width="300" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="text-element-footer element-footer">
                <h5>Horario de atencion</h5>
                <ul>
                    <li>Lunes a sabado de 12:30 PM a 9:30 PM</li>
                    <li>Domingos de 12:00 PM a 4:00 PM</li>
                </ul>
            </div>
            <div class="text-element-footer element-footer">
                <h5>Contactanos</h5>
                <ul>
                    <li>&#9993;chainalabcusco@gmail.com</li>
                    <li>&#128222;+51 984 060 107</li>
                    <li>&#128222;+51 962 213 653</li>
                </ul>
            </div>
            <div class="rrss-element-footer element-footer">
                <h5>Siguenos</h5>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/chainalabcusco/">
                            <img src="images/social/facebook.png" alt="icono redes sociales">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/chainalab/">
                            <img src="images/social/instagram.png" alt="icono redes sociales">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-creds">
            <div class="copy-creeds">
                <p>@2022 · Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    <script src="js/menu.js"></script>
    <script src="js/confirmacionCancelar.js"></script>
</body>
</html>