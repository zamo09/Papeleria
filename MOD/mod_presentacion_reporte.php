<!DOCTYPE html PUBLIC>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Reporte Papeleria</title>
		<link href="../CSS/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="../JS/tablecloth.js"></script>
	</head>
	<body>
		<?php 
			$SQL = $_GET["SQL"];
			include("../PHP/conexion.php");
			$conexion = mysql_connect($servidor,$usuario,$contraseña);
						mysql_select_db($BD,$conexion);
						mysql_query("SET NAMES 'utf8'");
			$selectReporte = mysql_query($SQL,$conexion);
		?>
		<div id="container">	
			<div id="content">
				 <table>
					<tr>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Unidad</th>
						<th>Departamento</th>
					</tr>
				<?php
				while ($fila = mysql_fetch_array($selectReporte)){
					echo '<tr>';
						echo '<td>' . $fila[1] . '</td>';
						echo '<td>' . $fila[2] . '</td>';
						echo '<td>' . $fila[3] . '</td>';
						echo '<td>' . $fila[0] . '</td>';
					echo '</tr>';
				}
				?>
				</table>
			</div>
		</div>	
	</body>
</html>