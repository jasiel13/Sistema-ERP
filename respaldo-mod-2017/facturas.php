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
.ti{ background-color:#009; font-size:14px; color:#FFF;
}
.cont
{
	background-color:#97FF97;
}
.nop
{
	background-color:#F55;
}
.pen
{
	background-color:#FFFF8A;
}
.rev
{
	background-color:#6CB6FF;
}
.can
{
	background-color:#97FF97;
}
.rnop
{
	background-color:#FF8080;
}
.NA
{
	background-color:#C0F;
}
</style>

</head>

<body>
<?php
error_reporting(0);
include ("conexion.php");
$factura=$_POST['factura'];
$fecha=$_POST['fecha'];
$tipo=$_POST['tipo'];
$finicio=$_POST['finicio'];
$ffin=$_POST['ffin'];
//setTimeout(Location.reload(),9000);
?>

<strong><font size="+2" color="#000066"><center>CONSECUTIVO FACTURACIÓN</center></font></strong>
<table border="1" align="center">
<tr><td class="cont">PAGADA</td><td class="rev">A TIEMPO PAGO/REV</td><td class="pen">NO REVISION</td><td class="rnop">VENCIDA PAGO/REV</td></tr>
</table>
<p></p>
<table border="1" align="center">
<tr class="ti">
  <td>FACTURA</td>
  <td width="80">FECHA</td>
  <td>CLIENTE</td>
  <td>ESTADO</td>
  <td width="70">REVISION</td>
  <td>PAGADA</td>
  <td>OBSERVACIONES ALM</td>
  <td>OBSERVACIONES FYC</td>
  </tr>

<?php
if ($tipo=='TODAS'){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago FROM facturacion order by factura ASC"); 
}
if ($tipo=='CREDITO'){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago FROM facturacion WHERE tipopago='CREDITO' order by factura ASC"); 
}
if ($tipo=='CONTADO'){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago FROM facturacion WHERE tipopago='CONTADO' order by factura ASC"); 
}
if ($factura!=''){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago FROM facturacion where factura='$factura' order by factura ASC"); 
}
if ($fecha!=''){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago FROM facturacion where fechafactura='$fecha' order by factura ASC"); 
}
if ($finicio!=''){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago FROM facturacion where fechafactura>='$finicio' and fechafactura<='$ffin' order by factura ASC"); 
}

 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i');	
$hoy=date("Y-m-d");	
//echo $hoy;
 $contador =mysql_num_rows($query);
  if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($query))
 {
	 $c=mysql_query("select dias, revision from clientes where cliente='$array[2]'");
		 while ($d=mysql_fetch_array($c))
		 {
//echo $d['1'];
			 //echo $d[0].".";
		  

	 if($array['estado']=='CANCELADA')
	 {
		 $estilo='can';
		 $revision='NO APLICA';
		 $pagada='NA';
	 }
	else if ($array['fechacontrarecibo']!='0000-00-00')
	 {
		 $revision='REVISION';
		 $estilo='rev';
		 $pagada='';
	 if ($array['pagada']=='')
	 {
	  $nuevafecha = strtotime ( '+'.$d[0].'day' , strtotime ($array['fechacontrarecibo']) ) ;
		 $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		$fc=$nuevafecha;
		$pagada='NO';
		if ($hoy>$fc)
		{
			$estilo='rnop';
		}
		else{
		$estilo='rev';}
	 }
	 
	 }
	 
	else if($array['fechacontrarecibo']=='0000-00-00' and $array['estado']=='')
	 {
		 $nuevafecha = strtotime ( '+8day' , strtotime ($array['fechafactura']) ) ;
		 $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		 if ($hoy>$nuevafecha){ 
		$estilo='rnop';
		  }
		else{
			$estilo='pen';
			}
		$revision='PENDIENTE';
		$pagada='NO';
	 }
	  if($d['revision']=='')
	 {
		 $revision='NA REVISION';
		 $estilo='cont';
	 }

		 if ($array['pagada']=='on')
	 {
		 $pagada='SI';
	 }
	 else if ($array['pagada']=='on' and $array['estado']=='')
	 {
		 $pagada='NO';
		 $estilo='nop';
	 }
	 if($array['tipopago']=='CONTADO')
	 {
		 $revision='NO APLICA';
		 $pagada='CONT';
		 $estilo='cont';
	 }
	 
	 echo "<tr class='$estilo'>
	<td width='80'>".$array[0]."</td><td width='80'>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$revision."</td><td>".$pagada."</td><td>".$array[6]."</td><td>".$array[7]."</td></tr>";}//WHILE DIAS
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