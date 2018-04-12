<?php 
	$departamento = $_POST['Dept'];
	$folio = $_POST['folio'];
	include("conexion.php");
	$conexion = mysql_connect($servidor,$usuario,$contraseña);
				mysql_select_db($BD,$conexion);
	$se_departamento = "SELECT id_departamento FROM departamentos WHERE nombre = '" . $departamento . "';";
		$result_departamento = mysql_query($se_departamento,$conexion);
		$id_departamento = mysql_fetch_row($result_departamento);
	$up_departamento = "UPDATE departamentos SET activo = 0 WHERE id_departamento = " . $id_departamento[0] . ";";
		$result_up_departamento = mysql_query($up_departamento);
	$up_pedido = "UPDATE pedido SET abierto = 0 WHERE id_pedido = " . $folio[0] . ";";
		$result_up_pedido = mysql_query($up_pedido);
	if($result_up_departamento and $result_up_pedido){
		header("Location: ../index.php");
	}else{
		echo "no se pudo cerrar.";
	}
?>