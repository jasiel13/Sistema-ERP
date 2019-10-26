<?php
include ('conexion.php');
if (isset($_POST['cancel'])) {
	$nc=$_POST['nch'];
	$u=mysql_query("update nccta set estado='CANCELADO' WHERE nc='$nc'");
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
<table border='1'>
<tr><td>Nota crédito</td><td>Fecha</td><td>Cliente</td><td>Cancelar</td></tr>
<?php
$nc=$_POST['nc'];
$q=mysql_query("select nc, fecha, cliente from nccta where nc='$nc'");
while ($q1=mysql_fetch_array($q)) {
	?>
	<tr><td><?php echo $q1[0];?></td><td><?php echo $q1[1]?></td><td><?php echo $q1[2]?></td>
		<td><form name='cancel' method='post' action='cancta.php'><input type='submit' name='cancel' value='Cancelar'> <input type='hidden' name='nch' value='<?php echo $q1[0]; ?>'></form></td>

	</tr>
	<?php
}
?>
</table>
<?php
}
else {
?>

<div align="center">
<form name="admin" action="ctacanf.php" method="post" onsubmit="return valida(this)">
<p></p>
<font size="+2" color="#000066"><strong>CANCELACION O REFACTURACION</strong></font>
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
<form name= 'remision' method='post' action='cancta.php'>
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