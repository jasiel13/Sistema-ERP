<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.titles
{
	background-color:#009;
	color:#FFF; font-size:12px;
}
</style>

</head>

<body>
<p></p>
<div align="center">
<font size="+2" color="#000066"><strong>REGISTRO DE VIAJE</strong></font>
<p></p>
<table border="1">
<tr class="titles">
<td>REMISION</td>
<td>FECHA</td>
<td>CLIENTE</td>
<td>REG</td>
</tr>
<?php
include('conexion.php');
$query=mysql_query("select remision, fecharem, cliente from remision where estatus='ENTREGA DOMICILIO' AND hrasalida='00:00:00.000000' AND hraentrega='00:00:00.000000' AND hrallegada='00:00:00.000000'");


 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($query))
 {
	 echo "<tr>
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td><form action='entrega.php' method='post'><input type='hidden' name='factura' value='".$array[0]."'><input type='hidden' name='cliente' value='".$array[2]."'><input type='image' name='modificar' value='Modificar' src='images/updates.png' align='center'/></form></td></tr>";
 }
 
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
 ?>

</body>
</html>