<body>
<form name="cancelar" method="post" action="updcta.php">
<?php
include('conexion.php');
$fac=$_POST['factura'];
?>
<div align="center">
<p></p>
<font size="+2" color="#000066"><strong>CANCELACION O REFACTURACION</strong></font>
<p></p>
<table border="1" align="center">
<tr class="bg0">
  <td>FACTURA</td>
  <td>CLIENTE</td>
  <td width="80">FECHA</td>
  <td>ACCIÓN</td>
  </tr>
<?php
$sql=mysql_query("Select factura, cliente, fechafactura from consorciofac where factura='$fac'");
$cont=mysql_num_rows($sql);
if ($cont!=0)
{
	while ($array=mysql_fetch_array($sql))
	{
		echo"<tr><td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td><select name='status'><option value='#'>SELECCIONE</option><option value='CANCELADA'>CANCELADA</option><option value='REFACTURADA'>REFACTURADA</option></select></td><input type='hidden' name='factura' value=".$array[0]."></tr>";
	}
}
else
{
echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }//else
echo "</table>";
?>
<input type="image" src="images/save.png" name="guardar" />
</div>
</form>
</body>
</html>