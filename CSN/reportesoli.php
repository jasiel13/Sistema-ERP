<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
table {
    border-collapse: collapse;
    width: 20%;
    background-color: #EDF6F8;
    border: 3px solid black;
    box-shadow:0 0 10px;}

 td {text-align: center;
    padding: 3px;
    border: 3px solid black;}

tr:hover {background-color: #7D8D90;}

th {background-color: #94BDAB;
    color: white;
    padding: 8px;}
</style>
</head>

<body>
	<?php
session_start();
if ($_SESSION["autentificado"]!="1" ){
header("Location: accesodenegado.php");
exit();
}?>

<form name="reportesoli" method="post" action="libinfo.php">
<div align="center">
<p></p>
<font size="+2"  color="040405"><strong>SOLICITUDES DE SERVICIO PENDIENTES</strong></font>
<p></p>
<table border="1" align="center">
<tr>
<th>Fecha</th>
<th>Hora</th>
<th>Servicio</th>
<th>Otra</th>
<th>Observaciones</th>
<th>Usuario</th>
<th>Liberar</th>
</tr>
<?php
include ('conexion.php');
$Q=mysql_query('select fecha, hora, servicio, otra, observaciones, usuario, id from solicitud where libusuario="" and libinfo=""');
$cont=mysql_num_rows($Q);
if ($cont!=0)
{
	while ($array=mysql_fetch_array($Q))
	{
		echo "<tr><td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$array[4]."</td><td>".$array[5]."</td><td><input type='image' name='libinfo' src='images/ac.png'/></td><input type='hidden' name='id' value=".$array[6]."</tr>";
	}
}
else 
{
	echo "<tr><td>No hay registros</td></tr>";
}
echo "</table>";
?>
</table>
</body>
</html>