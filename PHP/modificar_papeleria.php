<?php 
$id_papeleria = $_GET['papeleria'];
$SQL = $_GET['sql'];
include ("conexion.php");
			$conexion = mysql_connect($servidor,$usuario,$contraseña);
						mysql_select_db($BD, $conexion);
				$results=mysql_query($id_papeleria);
				echo $id_papeleria;
	    		header ("Location: ../MOD/mod_presentacion_reporte.php?SQL=" . $SQL );
?>