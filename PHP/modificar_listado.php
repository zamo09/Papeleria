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
		$id_listado = $_GET['id'];
		$sqlpas = $_GET['SQL'];
		$SQL= "SELECT D.nombre, P.nombre, L.cantidad, P.unidad, PA.nombre, L.id_listado FROM departamentos D, productos P, listado L, pedido PE, papeleria PA WHERE PE.id_pedido = L.id_pedido AND P.id_producto = L.id_producto AND  PE.id_departamento = D.id_departamento AND PE.abierto = 0 AND L.id_listado = " . $id_listado . " AND PA.id_Papeleria = L.id_papeleria;"; 
				include("conexion.php");
			$conexion = mysql_connect($servidor,$usuario,$contraseña);
						mysql_select_db($BD,$conexion);
						mysql_query("SET NAMES 'utf8'");
			$selectReporte = mysql_query($SQL,$conexion);
		?>
		<div id="container">	
			<div id="content">
				<h1>Reporte de Papeleria</h1>
				<table>
					<tr>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Unidad</th>
						<th>Departamento</th>
						<th>Papeleria</th>
					</tr>
				<?php
				while ($fila = mysql_fetch_array($selectReporte)){
					echo '<tr>';
						echo '<td>' . $fila[1] . '</td>';
						echo '<td>' . $fila[2] . '</td>';
						echo '<td>' . $fila[3] . '</td>';
						echo '<td>' . $fila[0] . '</td>';
						echo '<td>' . $fila[4] . '</td>';
						$listado = $fila[5];
					echo '</tr>';
				}
				?>
				</table>
				<form action="modificar_papeleria.php?SQL=" method="GET">
					<label>Papeleria: </label> 
					<select name="papeleria">
						<?php 
							include("../PHP/conexion.php");
							$conexion = mysql_connect($servidor,$usuario,$contraseña);
										mysql_select_db($BD,$conexion);
							$sql_tiendas = "SELECT id_papeleria, nombre FROM papeleria WHERE activo = 1;";
							$result = mysql_query($sql_tiendas,$conexion);
							while ($fila = mysql_fetch_array($result)){
								$sql = "UPDATE listado SET id_papeleria = " . $fila["id_papeleria"] . " WHERE id_listado = " . $listado . ";";
								echo '<option value="' . $sql . '">' . $fila["nombre"] . '</option>' ;
							}
						?>	
					</select>
					<input type="hidden" name="sql" value="<?php echo $sqlpas; ?>" />
					<button type="submit">Modificar</button>
				</form>
				<input class="button blue medium radius" name="Restablecer" type="reset" value="Atras" onClick="history.back()">
			</div>
		</div>	
	</body>
</html>