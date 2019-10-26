<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<meta content="jquery, forumlario dinamico, tutorial" name="keywords"/>
<style type="text/css">
  
table {
   width: 100%;
   border: 2px solid #000;
   margin-left: 0%;
   font-size: 13px;
}
.myform
{
	background: linear-gradient(111deg, #16396E 20%, #2155A4 57%, #102C57 87%);
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
input[type=text], select {
    width: 100%;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
label
{
	color:white;
}

.c{
	background-color: #848484;
	font-size: 12px;
}
.v{
	background-color: #FA5858;
	font-size: 12px;
	color: #FAFAFA;
}
.s
{
  background-color: #FFFFFF;
  font-size: 12px;
  color: #000000;
}
.boton
{
text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #000000;
    margin-left: 11%;
}
button:hover
{
	    color: #1883ba;
    background-color: #ffffff;
    cursor :pointer;
}
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.addfield2.js"></script>

<div id="stylized" class="myform" style="margin:20px auto;">
<form id="form" name="form" method="post" action="../procomen.php">
<h2><center>SEGUIMIENTO VENTAS/COMPRAS</center></h2>
	<table border='1'>
		<tr><td>#</td><td>FECHA</td><td>COMENTARIOS</td><td>F. COMPROMISO</td><td>USUARIO</td></tr>
	
 <?php 
 include('../conexion.php');

$ped=$_GET['idpedido'];
//echo $ped;
$i=0;
$i=$i+1;
$y=0;
$s=mysql_query("SELECT fechac, hora, comentarios, fechapc, usuario, tipo from comentarios WHERE idpedido='$ped'") or die(mysql_error());
//echo "Select fechac, hora, comentarios, fechapc, usuario from comentarios where idpedido='$ped'";
while ($s1=mysql_fetch_array($s)) {
	$y=$y+1;
	if 
	($s1[5]==6){
	$bc='c';
	}
	else if($s1[5]==5)
	{
		$bc='v';
	}
	?>

		<tr class='<?php echo $bc;?>'><td><?php echo $y;?></td><td><?php echo $s1[0]."  ".$s1[1];?></td><td><?php echo $s1[2]; ?></td><td><?php  echo $s1[3]; ?></td><td><?php echo $s1[4]; ?></td></tr>
	<?php
	}
 ?>
</table>
<br>
<br>
  <h2><center>SEGUIMIENTO VENTAS/CLIENTE</center></h2>
  <table border='1'>
    <tr><td>#</td><td>FECHA</td><td>COMENTARIOS</td><td>USUARIO</td></tr>
  
 <?php 
 include('../conexion.php');

$ped=$_GET['idpedido'];
//echo $ped;
$i2=0;
$i2=$i2+1;
$y2=0;
$se=mysql_query("SELECT fecha, hora, comentarios, usuario  from segcot WHERE folio='$ped'") or die(mysql_error());
//echo "Select fechac, hora, comentarios, fechapc, usuario from comentarios where idpedido='$ped'";
while ($s2=mysql_fetch_array($se)) {
  $y2=$y2+1;
    $bc='s';

  ?>

    <tr class='<?php echo $bc;?>'><td><?php echo $y2;?></td><td><?php echo $s2[0]."  ".$s2[1];?></td><td><?php echo $s2[2]; ?></td><td><?php  echo $s2[3]; ?></td></tr>
  <?php
  }
 ?>
</table>
<p></p>
<p></p>
<input type='hidden' name='idpedido' value='<?php echo $ped;?>'/>

<br>
<p></p>

<br>
<div class="spacer"></div>
</form>
