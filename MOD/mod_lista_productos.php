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
			$SQL = "SELECT PO.id_producto, PO.nombre,PO.marca,PO.unidad,PA.nombre FROM productos PO, papeleria PA WHERE PO.id_papeleria = PA.id_papeleria and PO.activo = 1;";
			include("../PHP/conexion.php");
			$conexion = mysql_connect($servidor,$usuario,$contraseña);
						mysql_select_db($BD,$conexion);
						mysql_query("SET NAMES 'utf8'");
			$selectTable = mysql_query($SQL,$conexion);
		?>
		<div id="container">	
			<div id="content">
				<h1>Reporte de Papeleria</h1>
				<table>
					<tr>
						<th>Nombre</th>
						<th>Marca</th>
						<th>Unidad</th>
						<th>Papeleria</th>
						<th>Eliminar</th>
					</tr>
				<?php
				while ($fila = mysql_fetch_array($selectTable)){
					echo '<tr>';
						echo '<td>' . $fila[1] . '</td>';
						echo '<td>' . $fila[2] . '</td>';
						echo '<td>' . $fila[3] . '</td>';
						echo '<td>' . $fila[4] . '</td>';
						echo '<td> <a class="button red small radius" href=../PHP/eliminar_producto.php?id='. $fila[0] .'>Eliminar</a>';
					echo '</tr>';
				}
				?>
				</table>
				<a class="button yellow medium radius" href=javascript:window.print();>Imprimir</a>
				<input class="button blue medium radius" name="Restablecer" type="reset" value="Atras" onClick="history.back()">
			</div>
		</div>	
	</body>
</html>
<li>
	
</li>