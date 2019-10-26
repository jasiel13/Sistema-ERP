<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
  
table {
   width: 100%;
   border: 2px solid #000;
   margin-left: 0%;
}
tr, td {

   text-align: left;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
tr {
   background: #eee;
}
.titles
{
  background-color:#009;
  color:#FFF; font-size:12px;
}
input[type=text], select {
    width: 100%;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.fuente2
{
	font-size:13px;
}
</style>
</head>

<body>
<?php
error_reporting(0);
include ("conexion.php");

//setTimeout(Location.reload(),9000);
?>

<strong><font size="+2" color="#800040"><center>ALMACÉN FACTURACIÓN</center></font></strong>
<p></p>
<table border="1" align="center">
<tr class="titles">
  <td>FACTURA</td>
  <td width="80">FECHA</td>
  <td>HORA FYC</td>
  <td>HORA AL</td>
  <td>CLIENTE</td>
  <td>RECIBIO</td>
  <td>SURTIO</td>
  <td>OBSERVACIONES</td>
  </tr>

<?php
 $query = mysql_query("SELECT factura, fechafactura, cliente, horafactura, horarecibido, recibio, surtio, observaciones FROM facturacion where entregada='on' order by fechafactura DESC, horafactura DESC limit 30"); 
 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i');	
 $contador =mysql_num_rows($query);
  if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($query))
 {
	 echo "<tr class='fuente2'>
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[3]."</td><td>".$array[4]."</td><td>".$array[2]."</td><td>".$array[5]."</td><td>".$array[6]."</td><td>".$array[7]."</td></tr>";
 }//while

}//if
else
{
echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }//else
echo "</table>";

?>
</body>
</html>