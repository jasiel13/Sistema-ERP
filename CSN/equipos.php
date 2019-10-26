<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<STYLE TYPE="text/css">
.t{
	background:#59ACAC; color:#000; font-size:18px; font-style:inherit;
}
.cont{position: absolute; left: 50px; top: 15px;}
.com{position: absolute; left: 420px; top: 15px;}
.vent{position: absolute; left: 550px; top: 530px;}
.alm{position: absolute; left: 0px; top: 300px;}
.cta{position: absolute; left: 350px; top:300px;}
.sea{position: absolute; left: 655px; top:175px;}
.g{position: absolute; left: 0px; top:500px;}

table {
    border-collapse: collapse; 
    border: 3px solid black;
    background-color: #F2F2F2;
    box-shadow:0 0 10px;}

td{text-align: center;
    padding: 3px;
    border: 2px solid black;}

th {background-color: #94BDAB;
	 padding: 8px;	
    color: white;}    
</STYLE>
<?php
include('conexion.php');
?>
</head>
<body>
	<table class='cont'>
		<tr><th>CONTABILIDAD</th><th></th></tr>
		<tr class='t'><td>EQUIPO</td><td>USUARIO</td></tr>
<?php
$e=mysql_query("select nombre, apellido, equipo, dpto from usuarios where dpto= 'CONTABILIDAD' AND estado='ACTIVO' order by equipo");
while ($eq=mysql_fetch_array($e))
{
?>
<tr><td><?php echo $eq[2]; ?></td><td><?php echo $eq[0]." ".$eq[1]; ?></td></tr>
<?php
}
?>
</table>
<table class='com'>
		<tr><th>COMPRAS</th><th></th></tr>
		<tr class='t'><td>EQUIPO</td><td>USUARIO</td></tr>
<?php
$e=mysql_query("select nombre, apellido, equipo, dpto from usuarios where dpto= 'COMPRAS' AND estado='ACTIVO' order by equipo");
while ($eq=mysql_fetch_array($e))
{
?>
<tr><td><?php echo $eq[2]; ?></td><td><?php echo $eq[0]." ".$eq[1]; ?></td></tr>
<?php
}
?>
</table>
<table class='vent'>
		<tr><th>VENTAS</th><th></th></tr>
		<tr class='t'><td>EQUIPO</td><td>USUARIO</td></tr>
<?php
$e=mysql_query("select nombre, apellido, equipo, dpto from usuarios where dpto= 'VENTAS' AND estado='ACTIVO' order by equipo");
while ($eq=mysql_fetch_array($e))
{
?>
<tr><td><?php echo $eq[2]; ?></td><td><?php echo $eq[0]." ".$eq[1]; ?></td></tr>
<?php
}
?>
</table>
<table class='alm'>
		<tr><th>ALMACÉN</th><th></th></tr>
		<tr class='t'><td>EQUIPO</td><td>USUARIO</td></tr>
<?php
$e=mysql_query("select nombre, apellido, equipo, dpto from usuarios where dpto= 'ALMACEN' AND estado='ACTIVO' order by equipo");
while ($eq=mysql_fetch_array($e))
{
?>
<tr><td><?php echo $eq[2]; ?></td><td><?php echo $eq[0]." ".$eq[1]; ?></td></tr>
<?php
}
?>
</table>
<table class='cta'>
		<tr><th>CTA</th><th></th></tr>
		<tr class='t'><td>EQUIPO</td><td>USUARIO</td></tr>
<?php
$e=mysql_query("select nombre, apellido, equipo, dpto from usuarios where dpto= 'CTA' AND estado='ACTIVO' order by equipo");
while ($eq=mysql_fetch_array($e))
{
?>
<tr><td><?php echo $eq[2]; ?></td><td><?php echo $eq[0]." ".$eq[1]; ?></td></tr>
<?php
}
?>
</table>
<table class='sea'>
		<tr><th>SEA</th><th></th></tr>
		<tr class='t'><td>EQUIPO</td><td>USUARIO</td></tr>
<?php
$e=mysql_query("select nombre, apellido, equipo, dpto from usuarios where dpto= 'SEA' AND estado='ACTIVO' order by equipo");
while ($eq=mysql_fetch_array($e))
{
?>
<tr><td><?php echo $eq[2]; ?></td><td><?php echo $eq[0]." ".$eq[1]; ?></td></tr>
<?php
}
?>
</table>
<table class='g'>
		<tr><th>SALA_JUNTAS</th><th></th></tr>
		<tr class='t'><td>EQUIPO</td><td>USUARIO</td></tr>
<?php
$e=mysql_query("select nombre, apellido, equipo, dpto from usuarios where dpto= 'SALA_JUNTAS' AND estado='ACTIVO' order by equipo");
while ($eq=mysql_fetch_array($e))
{
?>
<tr><td><?php echo $eq[2]; ?></td><td><?php echo $eq[0]." ".$eq[1]; ?></td></tr>
<?php
}
?>
</table>
</body>
</html>