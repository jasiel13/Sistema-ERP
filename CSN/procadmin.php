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
<form name="cancelar" method="post" action="updfac.php">
<?php
include('conexion.php');
$fac=$_POST['factura'];
?>
<div align="center">
<p></p>
<font size="+2" color="#FFFFFF"><strong>CANCELACION O REFACTURACION</strong></font>
<p></p>
<table border="1" align="center">
<tr>
  <th>FACTURA</th>
  <th>CLIENTE</th>
  <th width="80">FECHA</th>
  <th>ACCIÓN</th>
  <th>MOTIVO</th>
  </tr>
<?php
$sql=mysql_query("Select factura, cliente, fechafactura from facturacion where factura='$fac'");
$cont=mysql_num_rows($sql);
if ($cont!=0)
{
	while ($array=mysql_fetch_array($sql))
	{
		echo"<tr><td>".$array[0]."</td><td>".$array[1]."</td><td width='80'>".$array[2]."</td><td><select name='status'><option value='#'>SELECCIONE</option><option value='CANCELADA'>CANCELADA</option><option value='REFACTURADA'>REFACTURADA</option></select></td><td><textarea name='observaciones' id='observaciones'></textarea></td><input type='hidden' name='factura' value=".$array[0]."></tr>";
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