<!DOCTYPE html>
<html>
<head>
	<title>Agregar nuevo producto</title>
</head>
<body>
	<form action="../PHP/insertar_producto.php" method="GET">
		<label>Nombre del producto: </label><input type="text" name="nombre" required><br>
		<label>Papeleria: </label> 
		<select name="papeleria">
			<?php 
				include("../PHP/conexion.php");
				$conexion = mysql_connect($servidor,$usuario,$contraseña);
							mysql_select_db($BD,$conexion);
				$sql_tiendas = "SELECT id_papeleria, nombre FROM papeleria WHERE activo = 1;";
				$result = mysql_query($sql_tiendas,$conexion);
				while ($fila = mysql_fetch_array($result)){
					echo '<option value="' . $fila["id_papeleria"] . '">' . $fila["nombre"] . '</option>' ;
				}
			?>	
		</select><br>
		<label>Marca: </label> <input type="text" name="marca"><br>
		<label>Unidad: </label>
		<select name="unidad">
			<option value="PZA">PZA</option>
			<option value="CAJ">CAJ</option>
			<option value="PAQ">PAQ</option>
		</select><br>
		<button type="submit">Guardar</button>
 	</form>
</body>
</html>