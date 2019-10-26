<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<style type="text/css">
.bg0 { background:#CCC; color:#000; font-size:12px;}
.bg1 { background:#FF8080; color:#000; font-size:11px; }
.bg2 { background:#CCC; color:#000; font-size:11px; }
.bg3 { background:#FF8080; color:#000; font-size:14px; }
.bg4 { background:#3B3B3B; color:#FFF; font-size:14px; }

</style>
<?php
error_reporting(0);
include ("conexion.php");
$fecha1=$_POST['finicio'];
$fecha2=$_POST['ffin'];
$contat=0;$contft=0;
$ct=0; $cnt=0;
?>
<form action="" name="almacen" id="almacen" method="post">
<strong><font size="+2" color="#FFFAF9"><center>TIEMPO DE ENTREGA DE FACTURA DE CAJA A ALMACEN</center></font></strong>
<p></p>
<table border="1" align="center">
<tr class="bg4">
  <td>FECHA</td>
  <td>FACTURA</td>
  <td>CLIENTE</td>
  <td>HORA FACTURA</td>
  <td>HORA RECIBIDO</td>
  <td>ESTATUS</td>
</tr>

<?php
 $query = mysql_query("SELECT fechafactura, factura, cliente, horafactura, horarecibido FROM facturacion WHERE fechafactura >= '$fecha1' AND fechafactura <= '$fecha2' AND entregada='on' order by fechafactura DESC"); 
 
 
 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($query))
 {
 	 $dif = 10;

	 $hfact=$array[3];
	 $hrec=$array[4];

	 $hf = strtotime($hfact);
	 $hr = strtotime($hrec);
	 $hf = $hf / 60;
	 $hr = $hr / 60;

	 $max = $hf + $dif;
	
	if ($hr<=$max && $hr>=$hf)
	  {
		  $status="A TIEMPO ";
		  $estilo='bg2';
		  $contat=$contat+1;
	  }
	else 
	  {
		  $status="FUERA DE TIEMPO ";
		  $estilo='bg1';
		  $contft=$contft+1;
	  }
	  
	echo "<tr class=".$estilo.">
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$array[4]."</td><td>".$status."</td><form action='modifact.php' method='post'><input type='hidden' name='factura' value='".$array[0]."'></form></td></tr>";
 }
 
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
 ?> 
 <p></p>
 <form name="detalle">
 <table width="200" border="1" align="center">
  <tr class="bg4">
    <td>Facturas a tiempo</td>
    <td><?php echo $contat;?></td>
  </tr>
  <tr class="bg3">
    <td>Facturas fuera de tiempo</td>
    <td><?php echo $contft; ?></td>
  </tr>
 
</table>
<strong><font size="+2" color="#FFFAF9"><center>DETALLE DE REMISION-ALMACEN</center></font></strong>
<p></p>
<table border="1" align="center">
<tr class="bg4">
  <td>REMISION</td>
  <td>CLIENTE</td>
  <td>HORA REMISION</td>
  <td>HORA RECIBIDO</td>
  <td>ESTATUS</td>
</tr>

<?php
 $q = mysql_query("SELECT * FROM remision WHERE fecharem >= '$fecha1' AND fecharem <= '$fecha2' AND recalma='on' order by fecharem"); 
 
 
 $contador =mysql_num_rows($q);
 
 if ($contador!=0)
 {
	
 while ($array=mysql_fetch_array($q))
 {
	 $hrem=$array[2];
	 $hreci=$array[11];
	 $diferencias = strtotime($hreci) - strtotime($hrem);
	/* if($diferencia < 60){//segundos*/
       // echo $tiempo = "Hace " . floor($diferencia) . " segundos";
	
	
	/*if($diferencia > 60 && $diferencia < 3600)
	{//minutos
	 $min = floor($diferencia/60);
     //echo "Hace " . "" .$diferencia. " segundos ".$min." minutos";
	}
	if($diferencia > 3600 && $diferencia < 86400)
	{//horas
      $tiempo1 = floor($diferencia/3600);
	  //echo  "Hace1 ". $diferencia . " minutos ".$tiempo1." horas";
	}*/
	$mins=$diferencias/60;
	//******************
	if ($mins<=10 )
	  {
		  $estatus="A TIEMPO";
		  $estilo='bg2';
		  $ct=$ct+1;
	  }
	else 
	  {
		  $estatus="FUERA DE TIEMPO";
		  $estilo='bg1';
		  $cnt=$cnt+1;
	  }
	  
	echo "<tr class=".$estilo.">
	<td>".$array[0]."</td><td>".$array[3]."</td><td>".$array[2]."</td><td>".$array[11]."</td><td>".$estatus."</td><form action='modifact.php' method='post'><input type='hidden' name='factura' value='".$array[0]."'></form></td></tr>";
 }
 
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
 ?> 
 <p></p>
 <form name="detalle">
 <table width="200" border="1" align="center">
  <tr class="bg4">
    <td>Remisiones a tiempo</td>
    <td><?php echo $ct;?></td>
  </tr>
  <tr class="bg3">
    <td>Remisiones fuera de tiempo</td>
    <td><?php echo $cnt; ?></td>
  </tr>
  
  <tr class="bg3">
    <td></td>
    <td><input type="image" src="images/reporte.png" name="imprimir" onclick="window.print(); return false;" /></td>
  </tr>
</table>
</form>

</body>