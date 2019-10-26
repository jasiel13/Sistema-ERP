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
    padding: 5px;
    border: 3px solid black;}

tr:hover {background-color: #7D8D90;}

th {background-color: #94BDAB;
    color: white;
    padding: 8px;}
</style>
</head>




<?php
include ('conexion.php');
if (isset($_POST['cancel'])) {
	$nc=$_POST['nch'];
	$u=mysql_query("update ncsea set estado='CANCELADO' WHERE nc='$nc'");
	if($u)
{
?>
<script language="javascript">
alert("Nota de crédito cancelada con éxito");
</script>
<?php

}
else
{
?>
<script language="javascript">
alert("Falló el registro INSERT!");
</script>
<?php

}
}
else if (isset($_POST['nc'])) {
	?>
<div align="center">
<font size="+2" color="#FFFFFF"><strong>CANCELACION O REFACTURACION</strong></font>	
<table border='1' align="center">
<tr><th>Nota crédito</th><th>Fecha</th><th>Cliente</th><th>Cancelar</th></tr>
<?php
$nc=$_POST['nc'];
$q=mysql_query("select nc, fecha, cliente from ncsea where nc='$nc'");
while ($q1=mysql_fetch_array($q)) {
	?>
	<tr><td><?php echo $q1[0];?></td><td><?php echo $q1[1]?></td><td><?php echo $q1[2]?></td>
		<td><form name='cancel' method='post' action='canseaf.php'><input type='submit' name='cancel' value='Cancelar'> <input type='hidden' name='nch' value='<?php echo $q1[0]; ?>'></form></td>

	</tr>
	<?php
}
?>
</table>
</div>
<?php
}
else {
?>

<div align="center">
<form name="admin" action="seacanf.php" method="post" onsubmit="return valida(this)">
<p></p>
<font size="+2" color="#FFFFFF"><strong>CANCELACION O REFACTURACION</strong></font>
<p></p>
<table border="1">
<tr>
<td>Factura</td>
<td><input type="text" name="factura" onKeyUp="this.value=this.value.toUpperCase();" /></td>
</tr>
<tr>
<td></td>
<td><input type="image" name="enviar" src="images/1396468944_34.png" onfocus="true" /></td>
</tr>
</table>
</form >
<div align='center'>
<br>
<br>

<form name= 'remision' method='post' action='canseaf.php'>
<table border="1" class='nc'>
<tr>
<td>Nota de credito</td>
<td><input type="text" name="nc" onKeyUp="this.value=this.value.toUpperCase();" /></td>
</tr>
<tr>
<td></td>
<td><input type="image" name="ncs" src="images/1396468944_34.png" onfocus="true" /></td>
</tr>
</table>
</form>
</div>
</div>
<?php
 }
?>
</html>