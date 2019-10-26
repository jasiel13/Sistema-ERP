<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
.tablarem
{
	position:absolute;
	left:640px;
	top:60px;
}
.tablafac
{
	position:absolute;
	right:450px;
	top:60px;
}
.tablaimp
{
	position:absolute;
	top:800px;
	left:100px;
}
table {
    border-collapse:collapse;   
    background-color:#EDF6F8;
    border:2px solid black;
    box-shadow:0 0 10px;}

 td {text-align:center;
    padding:3px;
    border:2px solid black;}

tr:hover{background-color:#7D8D90;}

th {background-color:#94BDAB;
	color:#1E1E1E;
    padding:4px;
   border:2px solid black;}
</style>
</head>

<body>
<?php
include('conexion.php');
$fecha=$_POST['fecha'];
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora=date ('G:i');
?>

<div align="center">
<font size="+2" color="#000000"><strong>FACTURAS Y REMISIONES DEL DIA: <?php echo $fecha?>, A LAS: <?php echo $hora?></strong></font>

<table class="tablafac">
<tr>
<th>FACTURA</th>
<th>TIPO DE PAGO</th>
<th>FECHA</th>
<?php
$fecha=$_POST['fecha'];
$query=mysql_query("SELECT factura,tipopago,fechafactura from facturacion WHERE fechafactura='$fecha' AND entregada='on' AND (tipopago='CONTADO' OR tipopago='CREDITO')");
$contador =mysql_num_rows($query);
if($contador> 0)
{ 
while ($array=mysql_fetch_array($query))
 {	echo "<tr>
	<td>".$array[0]."</td>
	<td>".$array[1]."</td>
	<td>".$array[2]."</td>
	</tr>";
 }
 echo "</table>";
}
else
{
	echo "<tr>
	<td>No hay registros</td>
	</tr>
	</table>";
}
?>

<table class="tablarem">
<tr>
<th>REMISION</th>
<th>FECHA</th>

<?php
$query=mysql_query("SELECT remision, fecharem from remision WHERE fecharem= '$fecha' AND recalma='on'");
$contador =mysql_num_rows($query);
if($contador> 0)
{ 
while ($array=mysql_fetch_array($query))
 {	echo "<tr>
	<td>".$array[0]."</td>
	<td>".$array[1]."</td>
	</tr>";
 } 
}
else
{
	echo "<tr>
	<td>No hay registros</td>
	</tr>
	</table>";
}
echo "</table>";
?>
</div>

<input type="image" name="imprimir" src="images/print.png" onclick="window.print(); return false;"/>

<table class='tablaimp'>
<tr>
<td>
RECIBE:__________________
FECHA:___________________
FIRMA:___________________</td>
</tr>
</table>
</body>
</html>
