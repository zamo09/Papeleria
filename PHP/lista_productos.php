<?php
  $id_producto = $_POST['Prod'];
  $id_pedido = $_POST['folio'];
  $cantidad = $_POST['cantidad'];
  $nombre_departamento = $_POST['Dept'];
  $fecha = $_POST['fecha'];
  include ("conexion.php");
  	$conexion = mysql_connect($servidor, $usuario,$contraseña);
  	mysql_select_db($BD, $conexion);
    $sql2="SELECT id_departamento FROM departamentos WHERE nombre ='".$nombre_departamento . "';";
            $result2 = mysql_query($sql2,$conexion);
    $id_departamento = mysql_fetch_row($result2);
    $sql3="SELECT id_papeleria FROM productos WHERE id_producto ='".$id_producto . "';";
            $result3 = mysql_query($sql3,$conexion);
    $id_papeleria = mysql_fetch_row($result3);
  	$insert = "INSERT INTO listado (id_pedido,id_producto, cantidad, id_papeleria) VALUES (" . $id_pedido . "," . $id_producto . "," . $cantidad . "," . $id_papeleria[0] . ");";
    $results=mysql_query($insert);
  	if ($results){
      header ("Location: ../pedido.php?estatus=1&Dept=" . $id_departamento[0] . "&fecha=" . $fecha . "&folio=" . $id_pedido . "&Prod=" . $id_producto . "&cantidad=" . $cantidad);
  	}else{
  	 header ("Location: ../pedido.php?estatus=2");
  	}
?>