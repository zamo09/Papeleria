<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Pedidos de papeleria</title>
		<link rel="stylesheet" type="text/css" href="CSS/main.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css" media="screen">
	</head>
<body>
	<form action="PHP/insertar_pedido.php" method="GET">
		<div class="contenedor">
			<div class="col-xs-10">
					<h1>Pedidos de papeleria</h1>
					<p>Para realizar el pedido de papeleria se tiene que seleccionar el departamento del cual se pedira el pedido y se da clic en el boton continuar. segjhs sadas asd</p>
					<label>Departamento: </label>
						<select name="Dept">
							<?php
							include ("PHP/conexion.php");
							$conexion = mysql_connect($servidor,$usuario,$contraseña);
										mysql_select_db($BD, $conexion);
							$sql="SELECT nombre,id_departamento FROM departamentos WHERE activo = 1;";
							$result = mysql_query($sql,$conexion);
							while ($fila = mysql_fetch_array($result)){
								echo '<option value="' . $fila["id_departamento"] . '">' . $fila["nombre"] . '</option>' ;
							}
							?>
						</select><br>
					<lable>Fecha: </lable> <input type="text" name="fecha" value="<?php echo date("y.m.d"); ?>" readonly="readonly"><br>
			</div>
		<div id="contenedor">
			<h1>Pedidos de papeleria</h1>
			<p>Para realizar el pedido de papeleria se tiene que seleccionar el departamento del cual se pedira el pedido y se da clic en el boton continuar. segjhs sadas asd</p>
			<label>Departamento: prueba de cambio en la pc y por ultimo en la ipad</label>
				<select name="Dept">
					<?php
					include ("PHP/conexion.php");
					$conexion = mysql_connect($servidor,$usuario,$contraseña);
								mysql_select_db($BD, $conexion);
					$sql="SELECT nombre,id_departamento FROM departamentos WHERE activo = 1;";
					$result = mysql_query($sql,$conexion);
					while ($fila = mysql_fetch_array($result)){
						echo '<option value="' . $fila["id_departamento"] . '">' . $fila["nombre"] . '</option>' ;
					}
					?>
				</select><br>
			<lable>Fecha: </lable> <input type="text" name="fecha" value="<?php echo date("y.m.d"); ?>" readonly="readonly"><br>
		</div>
		<div id="botonera">
			<input type="submit" name="continuar" value="Continuar" id="id_continuar">
			<button>Cancelar</button>
		</div>
	</form>
	<a href="admin.php">Admin</a>
</body>
</html>