<?php 
	$id_departamento = $_GET['Dept'];
	$fecha = $_GET['fecha'];
	include ("conexion.php");
			$conexion = mysql_connect($servidor,$usuario,$contraseña);
						mysql_select_db($BD, $conexion);
			$sql_folio = "SELECT MAX(id_pedido) from pedido WHERE abierto = 1 and id_departamento = " . $id_departamento . ";";
					$result = mysql_query($sql_folio,$conexion);
					$folio = mysql_fetch_row($result);
			if(empty($folio[0])){
				$sql_folio2 = "SELECT MAX(id_pedido) from pedido;";
					$result2 = mysql_query($sql_folio2,$conexion);
					$folio2 = mysql_fetch_row($result2);
				$Empresa ="SELECT id_empresa FROM departamentos WHERE id_departamento =". $id_departamento . ";";
							$result = mysql_query($Empresa,$conexion);
							$id_empresa = mysql_fetch_row($result);
				$folio_nuevo = $folio2[0] + 1;
				$insert = "INSERT INTO pedido (id_pedido,id_departamento, fecha, id_empresa,abierto) VALUES (" . $folio_nuevo . "," . $id_departamento . ",'" . $fecha . "'," . $id_empresa[0] . ",1); ";
	    		$results=mysql_query($insert);
	    		header ("Location: ../pedido.php?estatus=1&Dept=" . $id_departamento . "&fecha=" . $fecha . "&folio=" . $folio_nuevo );
			}else{		
				$folio_nuevo = $folio[0];
					header ("Location: ../pedido.php?estatus=2&Dept=" . $id_departamento . "&fecha=" . $fecha . "&folio=" . $folio_nuevo );
			}
?>