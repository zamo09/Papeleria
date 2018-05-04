<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte por Tienda</title>
</head>
<body>
	<label>Tienda:</label>
	<select name="papeleria">
	<option value="0">Todas</option>
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
	<label>Empresa</label>
	<select name="empresa" >
	<option value="0">Todas</option>
		<?php 
			$sql_empresas = "SELECT id_empresa, nombre FROM empresa WHERE activo = 1;";
			$result = mysql_query($sql_empresas,$conexion);
			while ($fila = mysql_fetch_array($result)){
				echo '<option value="' . $fila["id_empresa"] . '">' . $fila["nombre"] . '</option>' ;
			}
		?>
	</select><br>
	<label>Departamentos:</label>
	<select name="depto" >
	<option value="0">Todos</option>
		<?php 
			$sql_empresas = "SELECT id_departamento, nombre FROM departamentos WHERE activo = 1;";
			$result = mysql_query($sql_empresas,$conexion);
			while ($fila = mysql_fetch_array($result)){
				echo '<option value="' . $fila["id_departamento"] . '">' . $fila["nombre"] . '</option>' ;
			}
		?>
	</select><br>	
	<label>Fecha de Inicio:</label>
	<input type="date" name="fecha" value="##/##/####"><br>	
	<label>Fecha de Fin:</label>
	<input type="date" name="fecha" value="##/##/####"><br>
	<button type="submit">Generar Reporte</button>
</body>
</html>