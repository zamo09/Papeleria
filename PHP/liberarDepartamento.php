<?php 
	$id_departamento = $_GET["Dept"];

	include("conexion.php");
	$conexion = mysql_connect($servidor,$usuario,$contraseña);
				mysql_select_db($BD,$conexion);
	$up_dept = "UPDATE departamentos SET activo = 1 WHERE id_departamento = " . $id_departamento . ";";
		$result_up_dept = mysql_query($up_dept);
	if($result_up_dept){
		header("Location: ../index.php");
	}else{
		echo "no se pudo cerrar.";
	}
?>