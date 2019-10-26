<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form name="reportesoli" method="post" action="promisol.php">
<div align="center">
<p></p>
<font size="+2"  color="#000066"><strong>SOLICITUDES DE SERVICIO PENDIENTES</strong></font>
<p></p>
<table border="1" align="center">
<tr class="titulo">
<td>Fecha</td>
<td>Hora</td>
<td>Servicio</td>
<td>Observaciones</td>
<td>Liberar</td>
</tr>
<?php
include ('conexion.php');
session_start();
$usuario=$_SESSION['name'];
$u=mysql_query ("select nombre, apellido from usuarios where usuario='$usuario'");
while ($a=mysql_fetch_array($u))
{
	$nomape=$a[0]." ".$a[1];
}
echo $nomape;
$Q=mysql_query("select fecha, hora, servicio, observaciones, id from solicitud where libinfo='on' AND libusuario='' AND usuario='$nomape' ");
$cont=mysql_num_rows($Q);
if ($cont!=0)
{
	while ($array=mysql_fetch_array($Q))
	{
		echo "<tr><td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td><input type='image' name='libinfo' src='images/ac.png'/></td><input type='hidden' name='id' value=".$array[4]."</tr>";
	}
}
else 
{
	echo "<tr><td>No hay registros</td></tr>";
}
echo "</table>";
//**********************************************************

//**********************************************************
?>
</body>
</html>