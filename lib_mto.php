<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div align='center'>
		<P></P>
		<strong>LIBERAR MANTENIMIENTO EQUIPO</strong>
		<P></P>
	<form name='liberar' action='prolibi.php' method='post'>
	<table border='1'>
		<tr><td>F. prog</td><td>Equipo</td><td>Observaciones</td><td>f. Hecho</td><td>Liberar</td></tr>
	<?php
include ('conexion.php');
session_start();
$usuario=$_SESSION['name'];
$u=mysql_query ("select equipo from usuarios where usuario='$usuario'");
$r=mysql_fetch_array($u);
//echo $r[0];
$lib=mysql_query("select fprog, equipo, fhecho, observ, id from mto_equipo where equipo ='$r[0]' and liberar!=''");
//echo "select fprog, equipo, fhecho, observ from mto_equipo where equipo ='$r[0]'";
while ($m=mysql_fetch_array($lib))
{
	?>
	<tr><td><?php echo $m[0] ?></td><td><?php echo $m[1] ?></td><td><?php echo $m[3] ?></td><td><?php echo $m[2] ?></td><td><input type='checkbox' name='liberar'/></td></tr>
	<input type='hidden' name='id' value='<?php echo $m[4]; ?>'>

	<?php
}
	?>
</table>
<input type='image' src='images/save.png'>
</form>
</div>
</body>
</html>