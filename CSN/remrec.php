<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">

.fuente
{
	font-size:12px;
}
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

<strong><font size="+2" color="#800040"><center>ALMACÉN REMISIÓN</center></font></strong>
<p></p>
<table border="1" align="center">
<tr class="fuente">
  <td>REMISIÓN</td>
  <td width="80">FECHA</td>
  <td>HORA FYC</td>
  <td>HORA AL</td>
  <td>CLIENTE</td>
  <td>RECIBIO</td>
  <td>SURTIO</td>
  <td>OBSERVACIONES</td>
  </tr>

<?php
 $query = mysql_query("SELECT remision, fecharem, cliente, horarem, horarec, recibio, surtio, descr FROM remision where recalma='on' order by fecharem DESC, horarem DESC"); 
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