<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
$conexion=mysql_connect("localhost","root","Csn960821");
$db=mysql_select_db("comercializadora",$conexion);
$i=0;
$fechas=mysql_query("SELECT DISTINCT fechareg FROM seguimiento order by fechareg");
$cliente=mysql_query("select cliente from seguimiento order by fechareg");
echo"<table border='1'><tr><td>Cliente</td>";
while($fe=mysql_fetch_array($fechas))
{
	
	echo"<td>".$fe[0]."</td>";
}

echo"</tr>";
while ($cli=mysql_fetch_array($cliente))
{
	echo "<tr><td>".$cli[0]."</td></tr>";

$i=$i++;
}
$obse=mysql_query("select observ from seguimiento where '$cli[0]'");
echo "<tr>";
while ($obs=mysql_fetch_array($obse))
{
	echo "<td>".$obs[0]."</td>";
}

echo "</tr>";
?>
</body>
</html>