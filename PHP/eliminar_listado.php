<?php 
$Id =  $_GET['ID'];
$Dept = $_GET['Dept'];
$fecha = $_GET['fecha'];
$folio = $_GET['folio'];
header ("Location: ../pedido.php?Dept=" . $Dept . "&fecha=" . $fecha . "&folio=" . $folio );
?>