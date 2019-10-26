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
	table {width:97%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2;}
	th {padding:3px;background:#555;color:#fff}
	td {padding:2px;border:solid #999;border-width:1 1 1px;}

		h1{color:white;text-align:center}

		tr:nth-child(odd){
    background: #E6E6E6;
    color: black;
}
 
tr:nth-child(even){
    background: #FFFFFF;
    color: #000000;
}
</style>

</head>

<body>
<div align="center">
<font size="+2" color="#000099"><strong>FACTURAS</strong></font>

<table border="1">
<tr class="titles">
<th>FACTURA</td>
<th width="80">FECHA F</td>
<th>CLIENTE</td>
<th>H.SALIDA</td>
<th>H.ENTREGA</td>
<th>H.LLEGADA</td>
<th>CHOFER</td>
<th>VEHICULO</td>
<th width="150">DIRECCION</td>
<th width="150">Tiempo Final de entrega</td>
</tr>
<?php
include('conexion.php');
$query=mysql_query("SELECT factura, fechafactura, cliente, hrasalida, hraentrega, hrallegada, chofer, vehiculo, direccion from facturacion where estatus='ENTREGA DOMICILIO' order by fechafactura DESC LIMIT 70");
$cont=mysql_num_rows($query);
if ($cont>0)
{

	while ($array=mysql_fetch_array($query))
	{

		$hrini=$array[3];
	 	$hrfin=$array[4];
	 	$diferencias = strtotime($hrfin) - strtotime($hrini);
	 	//$time = time();
	 		$mins=$diferencias/60;


		//$fin= date("i", $diferencias);

	 	

	 	//$diferencias = time();

		echo'<tr><td>'.$array[0].'</td><td>'.$array[1].'</td><td>'.$array[2].'</td><td>'.$array[3].'</td><td>'.$array[4].'</td><td>'.$array[5].'</td><td>'.$array[6].'</td><td>'.$array[7].'</td><td>'.$array[8].'</td><td>'.$mins.' minutos'. '</td></tr>';
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
$query=mysql_query("SELECT remision, fecharem, cliente, horasalida, horaentrega, horallegada, chofer, vehiculo, direccion from remision where estatus='ENTREGA DOMICILIO' order by fecharem DESC LIMIT 70");
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