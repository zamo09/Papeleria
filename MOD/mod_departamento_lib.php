<!DOCTYPE html>
<html>
<head>
	<title>Liberar Departameto</title>
</head>
<script language="JavaScript">
		function pregunta(){
		    if (confirm('¿Estas seguro que deseas liberar el departamento?')){
		       document.departamento.submit()
		    }
		}
</script> 
<body>
	<form name="departamento" action="../PHP/liberarDepartamento.php" method="GET">		
		<label>Departamento: </label>
					<select name="Dept">
						<?php
						include ("../PHP/conexion.php");
						$conexion = mysql_connect($servidor,$usuario,$contraseña);
									mysql_select_db($BD, $conexion);
						$sql="SELECT nombre,id_departamento FROM departamentos WHERE activo = 0;";
						$result = mysql_query($sql,$conexion);
						while ($fila = mysql_fetch_array($result)){
							echo '<option value="' . $fila["id_departamento"] . '">' . $fila["nombre"] . '</option>' ;
						}
						?>
					</select><br>
					<input type=button onclick="pregunta()" value="Enviar">
	</form>

</body>
</html>