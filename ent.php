<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
<title>Documento sin título</title>
<style type="text/css">
.titles
{
	background-color:#009;
	color:#FFF; font-size:12px;
}

.col
{
	background-color:#D8D8D8;
	color:#FFF; font-size:12px;
}

tr,td
{
 padding: 3px;
 border-right: 3px solid blue;
}
</style>

</head>

<body>
<p></p>
<div align="center">
<font size="+2" color="#000066"><strong>REGISTRO DE VIAJES "SALIDAS PENDIENTES"</strong></font>
<p></p>
<table border="3">
<tr class="titles">
<td>FACTURA</td>
<td>FECHA</td>
<td>CLIENTE</td>
<td>HRA_SALIDA</td>
<td>HRA_ENTREGA</td>
<td>HRA_LLEGADA</td>
<td>REG</td>
</tr>
<?php
include('conexion.php');
$query=mysql_query("select factura, fechafactura, cliente, hrasalida, hraentrega, hrallegada, direccion, chofer, vehiculo from facturacion where estatus='ENTREGA DOMICILIO' AND hrallegada='00:00:00.000000'order by fechafactura DESC LIMIT 30");

 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($query))
 {
	 echo "<tr>
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$array[4]."</td><td>".$array[5]."</td><td><form action='entrega.php' method='post'><input type='hidden' name='factura' value='".$array[0]."'><input type='hidden' name='cliente' value='".$array[2]."'><input type='hidden' name='hrasalida' value='".$array[3]."'><input type='hidden' name='hraentrega' value='".$array[4]."'><input type='hidden' name='hrallegada' value='".$array[5]."'><input type='hidden' name='direccion2' value='".$array[6]."'><input type='hidden' name='chofer' value='".$array[7]."'><input type='hidden' name='vehiculo' value='".$array[8]."'><input type='image' name='modificar' value='Modificar' src='images/updates.png' align='center'/></form></td></tr>";
 }
 
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
/*****************************************************TERMINA SALIDAS FACTURAS*/
 ?>


 <p></p>
<div align="center">
<font size="+2" color="#000066"><strong>REGISTRO DE VIAJE</strong></font>
<p></p>
<table border="1">
<tr class="titles">
<td>REMISION</td>
<td>FECHA</td>
<td>CLIENTE</td>
<td>HRA_SALIDA</td>
<td>HRA_ENTREGA</td>
<td>HRA_LLEGADA</td>
<td>REG</td>
</tr>
<?php
include('conexion.php');
$query=mysql_query("select remision, fecharem, cliente, horasalida, horaentrega ,horallegada, direccion, chofer, vehiculo  from remision where estatus='ENTREGA DOMICILIO' order by fecharem DESC LIMIT 30");


 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($query))
 {
	 echo "<tr>
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$array[4]."</td><td>".$array[5]."</td><td><form action='entreremision.php' method='post'><input type='hidden' name='remision' value='".$array[0]."'><input type='hidden' name='cliente' value='".$array[2]."'><input type='hidden' name='hrasalida' value='".$array[3]."'><input type='hidden' name='hraentrega' value='".$array[4]."'><input type='hidden' name='hrallegada' value='".$array[5]."'><input type='hidden' name='direccion2' value='".$array[6]."'><input type='hidden' name='chofer' value='".$array[7]."'><input type='hidden' name='vehiculo' value='".$array[8]."'><input type='image' name='modificar' value='Modificar' src='images/updates.png' align='center'/></form></td></tr>";
 }
 
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
/*****************************************************ENTREGA FACTURAS*/
 ?>



 ?>



 <p></p>
<div align="center">
<font size="+2" color="#000066"><strong>REGISTRO DE VIAJES "FINALIZADOS"</strong></font>
<p></p>
<table border="1">
<tr class="titles">
<td>FACTURA</td>
<td>FECHA</td>
<td>CLIENTE</td>
<td>HRA_SALIDA</td>
<td>HRA_ENTREGA</td>
<td>HRA_LLEGADA</td>
<td>REG</td>
</tr>
<?php
include('conexion.php');
$query=mysql_query("select factura, fechafactura, cliente, hrasalida, hraentrega, hrallegada, direccion, chofer, vehiculo, observaciones ,fechaentrega from facturacion where estatus='ENTREGA DOMICILIO' AND hrallegada!='00:00:00.000000' order by fechafactura DESC LIMIT 30");


 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($query))
 {
	 echo "<tr>
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$array[4]."</td><td>".$array[5]."</td><td><form action='entrega.php' method='post'><input type='hidden' name='factura' value='".$array[0]."'><input type='hidden' name='cliente' value='".$array[2]."'><input type='hidden' name='hrasalida' value='".$array[3]."'><input type='hidden' name='hraentrega' value='".$array[4]."'><input type='hidden' name='hrallegada' value='".$array[5]."'><input type='hidden' name='direccion2' value='".$array[6]."'><input type='hidden' name='chofer' value='".$array[7]."'><input type='hidden' name='vehiculo' value='".$array[8]."'><input type='hidden' name='observaciones' value='".$array[9]."'><input type='hidden' name='fechaentrega' value='".$array[10]."'><input type='image' name='modificar' value='Modificar' src='images/updates.png' align='center'/></form></td></tr>";
 }
 
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
/*****************************************************LLEGADA FACTURAS*/
 ?>
</body>
</html>