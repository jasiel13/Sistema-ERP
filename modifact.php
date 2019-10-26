<style type="text/css">
.bg0 { background:#8080FF; color:#FFF;}
.bg1 { background:#0080C0; color:#FFF; font-size:12px;}
</style>
<?php
include ("conexion.php");
$cli=$_POST['cliente'];
$query=mysql_query("SELECT factura, cliente, fechafactura, fechacontrarecibo, fechacobro FROM facturacion where cliente='".$cli."' AND tipopago='CREDITO' AND estado!='CANCELADA' AND	 PAGADA=''");
$registros=mysql_num_rows($query);
$array;
$c=mysql_query("SELECT COUNT(*) from facturacion where cliente='".$cli."' AND tipopago='CREDITO'");
$count=mysql_fetch_array($c);
//echo $count[0];
$i=0;
?>
<form name="modfact" id="modfact" action="factmodif.php" method="post">
<strong><center>ACTUALIZAR FECHA CONTRA RECIBO</center></strong>
<table border="1">
<tr class="bg0">
<td>Factura</td>
<td>Cliente</td>
<td>F. Factura</td>
<td>F. Contra recibo</td>
</tr>
<?php
if ($registros>0)
{
	while ($array=mysql_fetch_array($query))
	{
		$fact='fact'.$i;
		$fechact='fechact'.$i;
		//echo $fechact;
		echo "<tr class='bg1'><td><input type='text' name='$fact' value=".$array[0]." readonly='readonly'  /></td><td>".$array[1]."</td><td>".$array[2]."</td>";
		echo"<td><input name='$fechact' type='date' value='".$array[3]."'/></td>";
		$i++;
		
		//echo $fact;
		//echo '<input type="text" name="'.$fact.'" value="'.$array[0].'"</tr>';$i++;
        echo '<input type="hidden" name="count" value="'.$count[0].'"</tr>';
	}}
else
{
	echo "NO HAY REGISTROS";
}
echo "</table>";
?>
<input type="image" src="images/save.png" width="90" height="90" align="right"/>
</form>

