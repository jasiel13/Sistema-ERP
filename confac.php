<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="Refresh" CONTENT="100"; URL="">
<title>Documento sin título</title>
<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
<style type="text/css">
.bg0
{
	background-color:#009;
	color:#FFF; font-size:12px;
}
table {
   width: 97%;
   border: 1px solid #000;
}
tr, td {
   width: 25%;
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
</style>
</head>

<body>
<?php
error_reporting(0);
include ("conexion.php");
$almacen=23;
//setTimeout(Location.reload(),9000);
$hoy=date('Y-m-d');
?>

<strong><font size="+2" color="#800040"><center>ALMACÉN FACTURACIÓN PENDIENTES</center></font></strong>
<p></p>
    
    <input type="button" value="REFRESCAR" class="btn btn-primary btn-lg btn-block" onclick = "location='confac.php'"/>
<br />

<table border="1" align="center">
<tr class="bg0">
  <td>FACTURA</td>
  <td width="80">FECHA</td>
  <td>HORA</td>
  <td>CLIENTE</td>
   <td>ESTADO</td>
   <td>OBSERVACIONES FYC</td>
  <td>REG</td>
  </tr>

<?php
 $query = mysql_query("SELECT factura, fechafactura, cliente, horafactura, estado, obserfac FROM facturacion where entregada=' ' and estado!='CANCELADA' order by fechafactura DESC, horafactura DESC LIMIT 50"); 
 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i');	
 $contador =mysql_num_rows($query);
  if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($query))
 {
	 echo "<tr class=".$estilo.">
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[3]."</td><td>".$array[2]."</td><td>".$array[4]."</td><td>".$array[5]."</td><td><form action='regalmacen.php' method='post'><input type='hidden' name='factura' value='".$array[0]."'><input type='hidden' name='hora2' value='".$hora2."'><input type='image' name='registrar' src='images/txt.png' align='center'><input type='hidden' name='almacen' value='".$almacen."'></form></td></tr>";
 }//while

}//if
else
{
echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }//else
echo "</table>";
?>

<strong><font size="+2" color="#800040"><center>ALMACÉN FACTURACIÓN ENTREGADAS</center></font></strong>
<p></p>
<br />

<table border="1" align="center">
<tr class="bg0">
  <td>FACTURA</td>
  <td width="80">FECHA</td>
  <td>HORA</td>
  <td>CLIENTE</td>
   <td>ESTADO</td>
   <td>OBSERVACIONES FYC</td>
  <td>REG</td>
  </tr>

<?php
 $query = mysql_query("SELECT factura, fechafactura, cliente, horafactura, estado, obserfac FROM facturacion where entregada!=' ' and estado!='CANCELADA' order by fechafactura DESC, horafactura DESC LIMIT 50"); 
 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i'); 
 $contador =mysql_num_rows($query);
  if ($contador!=0)
 {
  
 while ($array=mysql_fetch_array($query))
 {
   echo "<tr class=".$estilo.">
  <td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[3]."</td><td>".$array[2]."</td><td>".$array[4]."</td><td>".$array[5]."</td><td><form action='regalmacen.php' method='post'><input type='hidden' name='factura' value='".$array[0]."'><input type='hidden' name='hora2' value='".$hora2."'><input type='image' name='registrar' src='images/txt.png' align='center'><input type='hidden' name='almacen' value='".$almacen."'></form></td></tr>";
 }//while

}//if
else
{
echo "<tr><td>No hay registros</td></tr></table>";
   //Mensaje de no hay registros
 }//else
echo "</table>";
///****************************REMISIONES*/
?>




<strong><font size="+2" color="#800040"><center>ALMACÉN REMISIÓN</center></font></strong>
<p></p>
<table border="1" align="center">
<tr class="bg0">
  <td>REMISION</td>
  <td width="80">FECHA</td>
  <td>HORA</td>
  <td>CLIENTE</td>
  <td>OBSERVACIONES</td>
  <td>REG</td>
  </tr>
<?php
 $query = mysql_query("SELECT remision, fecharem, horarem, cliente, descr FROM remision where recalma=' ' order by fecharem DESC, horarem desc"); 
 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i'); 

 $contador =mysql_num_rows($query);
  if ($contador!=0)
 {
  
 while ($array=mysql_fetch_array($query))
 {
   echo "<tr class=".$estilo.">
  <td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$array[4]."</td><td><form action='remision.php' method='post'><input type='hidden' name='remision' value='".$array[0]."'><input type='hidden' name='hora2' value='".$hora2."'><input type='image' name='registrar' src='images/txt.png' align='center'><input type='hidden' name='almacen' value='".$almacen."'></form></td></tr>";
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
