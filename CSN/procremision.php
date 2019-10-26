<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
table {
    border-collapse: collapse;
    width: 70%;
    background-color: #EDF6F8;
    border: 3px solid black;
    box-shadow:0 0 10px;}

 td {text-align: center;
    padding: 5px;
    border: 3px solid black;}

tr:hover {background-color: #7D8D90;}

th {background-color: #94BDAB;
    color: white;
    padding: 8px;}
</style>

</head>

<body>
<?php
if (isset($_GET['$r'])) 
{
	include ('conexion.php');
	$r=$_GET['$r'];
	
	$up=mysql_query("update remision set estado='CANCELADA' WHERE remision='$r'");
	//echo "update remision set estado='CANCELADA' WHERE remision='$r'";
	if (!$up)
{
	?>
    <script language="javascript">
	alert("Error al cancelar!");
	</script>
<?php
}
else
{
?>
     <script language="javascript">
	alert("Remision cancelada con éxito!");
	</script>

<?php
}
}
else
{
?>

<form name="cancelar" method="post" action="updfac.php">
<?php
include('conexion.php');
$rem=$_POST['remision'];
?>
<div align="center">
<p></p>
<font size="+2" color="#FFFFFF"><strong>CANCELACION</strong></font>
<p></p>
<table border="1" align="center">
<tr>
  <th>REMISION</th>
  <th>CLIENTE</th>
  <th width="80">FECHA</th>
  <th>ACCIÓN</th>
  </tr>
<?php
$sql=mysql_query("Select remision, cliente, fecharem from remision where remision='$rem'");
$cont=mysql_num_rows($sql);
if ($cont!=0)
{
	while ($array=mysql_fetch_array($sql))
	{
		echo"<tr><td>".$array[0]."</td><td>".$array[1]."</td><td width='80'>".$array[2]."</td>" ?>
		<td style="CURSOR:Hand;" onclick="window.location='procremision.php?$r=<?php echo $array[0]?>'">CANCELAR</td></tr>
		<?php
	}
}
else
{
echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }//else
echo "</table>";
?>

</div>
</form>
<?php
}
?>
</body>
</html>