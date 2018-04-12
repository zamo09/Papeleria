<!DOCTYPE html>
<html>
<head>
	<title>Pedido de Papeleria</title>
</head>
<body>
	<?php 	 
	$id_departamento = $_GET['Dept'];
	$fecha = $_GET['fecha'];
	$folio = $_GET['folio'];
	include ("PHP/conexion.php");
			$conexion = mysql_connect($servidor,$usuario,$contraseña);
						mysql_select_db($BD, $conexion);
			$sql="SELECT nombre FROM departamentos WHERE id_departamento =". $id_departamento . ";";
						$result = mysql_query($sql,$conexion);
						$nombre_departamento = mysql_fetch_row($result);
					$sql_folio = "SELECT MAX(id_pedido) from pedido WHERE abierto = 1 and id_departamento = " . $id_departamento . ";";
					$result = mysql_query($sql_folio,$conexion);
					$folio = mysql_fetch_row($result);
	?>
	<form action="PHP/lista_productos.php" method="POST">
		<div id="productos">
			<h1>Pedido de papeleria del departamento <input type="text" name="Dept" id="departamento" value="<?php echo $nombre_departamento[0]; ?>" readonly="readonly"></h1>
			<h2>Fecha: <input type="text" name="fecha" value="<?php echo $fecha; ?>" readonly="readonly"> Folio: <input type="text" id="folio" name="folio" value="<?php echo ($folio[0]); ?>" readonly="readonly"></h2>
			<label>Producto: </label>
				<select name="Prod">
					<?php
					include ("PHP/conexion.php");
					$conexion = mysql_connect($servidor,$usuario,$contraseña);
								mysql_select_db($BD, $conexion);
					$sql="SELECT id_producto, nombre FROM productos WHERE activo = 1;";
					$result = mysql_query($sql,$conexion);
					echo '<option value="NA" selected>Selecciona un Producto</option>';
					while ($fila = mysql_fetch_array($result))
						echo '<option value="' . $fila["id_producto"] . '">' . $fila["nombre"] . '</option>' ;
					?>
				</select>
			<label>Cantidad:</label><input type="text" name="cantidad" value="1">
			<input type="submit" name="" value="Buscar" id="boton1">
			<br><br>
		</div>	
	</form>
	<form action="PHP/cerrar_pedido.php" method="POST">
		<input type="hidden" name="Dept" id="departamento" value="<?php echo $nombre_departamento[0]; ?>" readonly="readonly">
		<input type="hidden" id="folio" name="folio" value="<?php echo ($folio[0]); ?>" readonly="readonly">
		<div id="lista">
		<h1>Productos solicitados</h1>
		<table class="listaProductos">
		  <tr>
		    <th>Cantidad</th>
		    <th>Descripcion</th>
		    <th>Unidad</th>
		    <th>Eliminar</th>
		  </tr>
		  	<?php
				include ("PHP/conexion.php");
				$conexion = mysql_connect($servidor,$usuario,$contraseña);
							mysql_select_db($BD, $conexion);
				$sql = "SELECT Pr.nombre AS Concepto, L.cantidad AS Cantidad, Pr.unidad AS Unidad FROM productos Pr, listado L, pedido P WHERE L.id_pedido = " . $folio[0] . " And P.id_pedido = " . $folio[0] . " AND L.id_producto = Pr.id_producto;";
				$result = mysql_query($sql,$conexion);
				if(empty($result)){

				}else{
					while ($fila = mysql_fetch_array($result)){
					echo '<tr>';
					echo '<td>' . $fila["Cantidad"] . '</td>';
					echo '<td>' . $fila["Concepto"] . '</td>';
					echo '<td>' . $fila["Unidad"] . '</td>';
					echo '<td><a href="">Eliminar</a></td>';
					echo '</tr>';
					}
				}				
				?>
		</table>
	</div><br>
	<div id="botonera">
		<input type="submit" name="" value="Enviar" id="boton1">
	</div>
</form>
</body>
</html>