<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.ti
{
	background-color:#666; color:#FFF; font-size:16px;
	font-style:bold;
}
.cli
{
	background-color:#88A7EE;	
}
.fe
{
	background-color:#5E5EFF;
}
</style>

</head>

<body>
<?php
include ('conexion.php');
$finicio=$_POST['finicio'];
$ffin=$_POST['ffin'];
$cliente=$_POST['cliente'];
?>
<form action="" name="almacen" id="almacen" method="post">
<strong><font size="+2" color="#800040"><center>SEGUIMIENTO COBRANZA</center></font></strong>
<p></p>

<?php
if($cliente!='')
{
	$query = mysql_query("SELECT fechareg, cliente, observ FROM seguimiento WHERE cliente='$cliente' AND fechareg >= '$finicio' AND fechareg <= '$ffin' order by fechareg"); 
	//echo "SELECT fechareg, cliente, observ FROM seguimiento WHERE cliente='$cliente' AND fechareg >= '$finicio' AND fechareg <= '$ffin' order by fechareg";
}
else
{
	$query = mysql_query("SELECT fechareg, cliente, observ FROM seguimiento WHERE fechareg >= '$finicio' AND fechareg <= '$ffin' order by fechareg "); 
	//echo "SELECT fechareg, cliente, observ FROM seguimiento WHERE fechareg >= '$finicio' AND fechareg <= '$ffin' order by fechareg";
}
 
 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {?>
<table border='1' align='center'>
<tr class="ti">
<td width="100">FECHA</td>
<td>CLIENTE</td>
<td>OBSERVACIONES</td>
<td>SALDO</td>
</tr>	
 <?php
 while ($array=mysql_fetch_array($query))
 {
	 $s=mysql_query("select saldo from clientes where cliente='$array[1]'");
	 while ($a=mysql_fetch_array($s))
 {
	 $saldo="$".number_format($a[0],2);
	echo "<tr>
<td class='fe'>".$array[0]."</td><td class='cli'>".$array[1]."</td><td class='fe'>".$array[2]."</td><td class='cli'>".$saldo."</td></tr>";
 }
 }
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
 ?>
</body>
</html>