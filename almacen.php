<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
include ("conexion.php");
$fecha=$_POST['fecha'];
?>
<form action="recibido.php" name="almacen" id="almacen" method="post">
<strong><font size="+2" color="#800040"><center>DETALLE DE FACTURAS</center></font></strong>
<table border="1" align="center">
<tr class="bg0">
  <td>FACTURA</td>
  <td>CLIENTE</td>
  <td>F. FACTURACIÓN</td>
  <td>HORA FACTURACION</td>
  <td>RECIBIDO</td>
</tr>

<?php
 $query = mysql_query("SELECT * FROM facturacion WHERE fechafactura ='$fecha' order by fechafactura;"); 
 
 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {
	 $hoy=date("Y-m-d");//FECHA ACTUAL DEL SISTEMA
	// echo $hoy;
 while ($array=mysql_fetch_array($query))
 {
	echo "<tr>
	<td>".$array[0]."</td><td>".$array[4]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td><form action='modifact.php' method='post'><input type='hidden' name='factura' value='".$array[0]."'><input type='image' name='modificar' value='Modificar' src='images/recibido.png' align='center'></form></td>";
	echo"</tr>";
 }
 
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
 ?> 
 
</form>
</body>