<?php 
$Papeleria = $_GET['papeleria'];
$Empresa = $_GET['empresa'];
$Depto = $_GET['depto'];
$Fecha1 = $_GET['fecha1'];
$Fecha2 = $_GET['fecha2'];

$SQL= "SELECT D.nombre, P.nombre, L.cantidad, P.unidad, L.id_listado FROM departamentos D, productos P, listado L, pedido PE WHERE PE.id_pedido = L.id_pedido AND P.id_producto = L.id_producto AND  PE.id_departamento = D.id_departamento AND PE.abierto = 0 "; 
if($Papeleria == 0){

}else{
	$SQL = $SQL . "AND L.id_papeleria = " . $Papeleria . " ";
}

if($Empresa == 0){

}else{
	$SQL = $SQL . "AND PE.id_empresa = " . $Empresa . " ";
}

if ($Depto == 0){
	
}else{
	$SQL = $SQL . "AND PE.id_departamento = " . $Depto . " ";
}

if ($Fecha1 == ""){

}else{
	$SQL = $SQL . "AND PE.fecha >= '" . $Fecha1 . "' "; 
}

if ($Fecha2 == ""){
	$SQL = $SQL . ";";
}else{
	$SQL = $SQL . "AND PE.fecha <= '" . $Fecha2 . "';";
}
header ("Location: ../MOD/mod_presentacion_reporte.php?SQL=".$SQL );
?>