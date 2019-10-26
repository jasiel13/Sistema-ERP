<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.t{	position: absolute; left: 250px; top: 200px;}
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
	<div align='center'>
		<p></p>
	<strong><font size='+2'>MANTENIMIENTOS PENDIENTES</font></strong></div>
	<p></p>
	<table align="center"><tr><th>F. programacion</th></tr>
	<?php
	include ('conexion.php');
	$f=mysql_query("select fprog from mto_equipo where fhecho='0000-00-00' group by fprog");
	while ($f1=mysql_fetch_array($f))
	{
	?>
	<tr onclick="window.location='vistamto.php?fprog=<?php echo $f1[0]?>'"><td><?php echo $f1[0]; ?></td></tr>
	<?php
	}
	?>
	</table>

	<?php
	if (isset ($_GET['fprog']))
	{
		$fp=$_GET['fprog']
	?>	
	<form name='vista' method='post' action='mto_up.php'>
	<table class="t">
		<tr><td>Fecha</td><td>Usuario</td><td>Equipo</td><td>Observaciones</td><td>Liberar</td></tr>
<?php
include('conexion.php');
$c=mysql_query("select * from mto_equipo where fprog='$fp'  ");
$c1 = mysql_num_rows($c);
//echo "count".$c1;
$i=0;
$sql=mysql_query("select equipo, fprog from mto_equipo where fprog='$fp' and liberar!='on' order by fprog");
while ($res=mysql_fetch_array($sql))
{
	$i++;
	$q=mysql_query("SELECT nombre, apellido from usuarios where equipo= '$res[0]'");
	$q1=mysql_fetch_array($q);
	?>
<tr><td><?php echo $res[1]; ?></td><td><?php echo $q1[0]." ".$q1[1]; ?></td><td><input type='text' name='<?php echo "equipo".$i;?>' value='<?php echo $res[0]; ?>' readonly='readonly'></td><td><textarea name="<?php echo "observ".$i;?>" ></textarea></td><td><input type='checkbox' name='<?php echo "liberar".$i?>'/></td></tr>

	<?php
}
?>
<tr><td></td><td></td><td></td><td><input type='image' src='images/save.png'></td><td></td></tr>
</table>
<input type='hidden' name='count' value='<?php echo $c1; ?>' >
<?php
}
?>
</form>
</body>
</html>