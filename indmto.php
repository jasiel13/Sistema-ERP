<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.t{
	position: absolute; left: 280px; top: 60px;
}

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
.table{width: 20%;
position: absolute; left:50px; top: 60px}    
</style>
</head>
<body>
	
		<P></P>
		<p></p>
		<div align='center'>
		<font size='+2'><strong>MANTENIMIENTO A EQUIPOS</strong></font></div>
		<p></p>
		<p></p>
	<?php
	include ('conexion.php');

?>
	<table class="table">
		<tr><th>F. programada</th></tr>
		<?php
	//echo "no hola";
$u=mysql_query ("SELECT fprog FROM `mto_equipo` group by fprog");
while ($r=mysql_fetch_array($u))
{
?>
<tr onclick="window.location='indmto.php?fprog=<?php echo $r[0]?>'"><td><?php echo $r[0]; ?></td></tr>
<?php
}

?>
</table>
<?php
if (isset($_GET['fprog']))
	{
		?>
		<table class='t'>
			<tr><th>F. Prog</th><th>Equipo</th><th>Dpto</th><th>F. Hecho</th><th>Observaciones</th></tr>
		<?php
		$fprog=$_GET['fprog'];
		//echo "hola";
		$mto=mysql_query("select fprog, equipo, fhecho, observ from mto_equipo where fprog='$fprog'");
		//echo "select fprog, equipo, fhecho, observ from mto_equipo where fprog='$fprog'";
		while($mto1=mysql_fetch_array($mto))
		{
			$d=mysql_query("select dpto from usuarios where equipo='$mto1[1]'");
			$d1=mysql_fetch_array($d);
		?>
			<tr><td><?php echo $mto1[0];?></td><td><?php echo $mto1[1];?></td><td><?php echo $d1[0];?></td><td><?php echo $mto1[2];?></td><td><?php echo $mto1[3];?></td></tr>
		<?php
		}
	}
?>
</table>

</body>
</html>

