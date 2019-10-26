<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
<style type="text/css">
.titles
{
	background-color:#009;
	color:#FFF; font-size:12px;
}
</style>

</head>

<body>
<div align="center">
<font size="+2" color="#000099"><strong>FACTURAS</strong></font>
<table border="1">
<tr class="titles">
<td>FACTURA</td>
<td width="80">FECHA F</td>
<td>CLIENTE</td>
<td>H.SALIDA</td>
<td>H.ENTREGA</td>
<td>H.LLEGADA</td>
<td>CHOFER</td>
<td>VEHICULO</td>
<td width="150">DIRECCION</td>
</tr>
<?php
include('conexion.php');
$query=mysql_query("SELECT factura, fechafactura, cliente, hrasalida, hraentrega, hrallegada, chofer, vehiculo, direccion from facturacion where estatus='ENTREGA DOMICILIO' AND hrasalida!='00:00:00.000000' AND hraentrega!='00:00:00.000000' AND hrallegada!='00:00:00.000000' order by fechafactura DESC");
$cont=mysql_num_rows($query);
if ($cont>0)
{
	while ($array=mysql_fetch_array($query))
	{
		echo'<tr><td>'.$array[0].'</td><td>'.$array[1].'</td><td>'.$array[2].'</td><td>'.$array[3].'</td><td>'.$array[4].'</td><td>'.$array[5].'</td><td>'.$array[6].'</td><td>'.$array[7].'</td><td>'.$array[8].'</td></tr>';
	}
}
else
{
	echo'<tr><td>No hay registros</td></tr>';
}
echo '<table>';
/***************************************TERMINA FACTURAS*/
?>
<font size="+2" color="#000099"><strong>REMISIONES</strong></font>
<table border="1">
<tr class="titles">
<td>REMISION</td>
<td width="80">FECHA R</td>
<td>CLIENTE</td>
<td>H.SALIDA</td>
<td>H.ENTREGA</td>
<td>H.LLEGADA</td>
<td>CHOFER</td>
<td>VEHICULO</td>
<td width="150">DIRECCION</td>
</tr>
<?php
include('conexion.php');
$query=mysql_query("SELECT remision, fecharem, cliente, horasalida, horaentrega, horallegada, chofer, vehiculo, direccion from remision where estatus='ENTREGA DOMICILIO' AND horasalida!='00:00:00.000000' AND horaentrega!='00:00:00.000000' AND horallegada!='00:00:00.000000'order by fecharem DESC");
$cont=mysql_num_rows($query);
if ($cont>0)
{
	while ($array=mysql_fetch_array($query))
	{
		echo'<tr><td>'.$array[0].'</td><td>'.$array[1].'</td><td>'.$array[2].'</td><td>'.$array[3].'</td><td>'.$array[4].'</td><td>'.$array[5].'</td><td>'.$array[6].'</td><td>'.$array[7].'</td><td>'.$array[8].'</td></tr>';
	}
}
else
{
	echo'<tr><td>No hay registros</td></tr>';
}
echo '<table>';
?>
</div>
</body>
</html>