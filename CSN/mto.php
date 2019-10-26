<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<!--se le dio estilo a la tabla  JB-->
<style type="text/css">
table {
    border-collapse: collapse;
    width: 70%;
    border: 3px solid black;
    background-color: #F2F2F2;
    box-shadow:0 0 10px;}

td{text-align: center;
    padding: 3px;
    border: 2px solid black;}

tr:hover {background-color: #7D8D90;}

th {background-color: #94BDAB;
	 padding: 8px;
	 border: 2px solid black;
    color: white;}
</style>

<body>
	<div align='center'>
<form method='post' name='mto' action='mtoproc.php'>
	
		<p></p>
	<h3>PROGRAMACION MANTENIMIENTO DE EQUIPOS</h3>
	<p></p>
<table>
<tr><th>Dpto</th><th>Equipo</th><th>Seleccione</th></tr>
	
<?php 
include ("conexion.php");
 $q=mysql_query("select idequipo, equipo, dpto from usuarios where estado='ACTIVO' order by dpto");
while($row = mysql_fetch_array($q))
{
?>
<tr><td><?php echo $row[2]?></td><td><?php echo $row[1]?></td><td><input type='checkbox' name='<?php echo "eq".$row[0]?>'/></td></tr>
<?php
}
 
?>
<tr><td>F.Programada:</td><td><input type='date' name='fprog'></td><td></td></tr>
<tr><td></td><td><input type='image' src='images/save.png'></td><td></td></tr>
</table>
</form>
</div>
</body>
</html>