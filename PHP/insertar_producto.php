<?php 
	$nombre = $_GET['nombre'];
	$id_papeleria = $_GET['papeleria'];
	$marca = $_GET['marca'];
	$unidad = $_GET['unidad'];
	include("conexion.php");
		$conexion = mysql_connect($servidor,$usuario,$contraseña);
					mysql_select_db($BD, $conexion);
		$sql_prodcuto = "INSERT INTO productos (nombre,marca,unidad,id_papeleria,activo) VALUES ('" . $nombre . "','" . $marca . "','" . $unidad . "'," . $id_papeleria . ",1);";
		$result = mysql_query($sql_prodcuto);
		if ($result){
			echo "<script>
               			alert('Producto Guardado con Exito');
               			window.location= '../MOD/mod_nuevo_producto.php'
    				</script>";
		}else{
			echo "<script>
               			alert('Error al guardar el producto');
               			window.history.back();
    				</script>";
		}
		#echo $sql_prodcuto;
?>