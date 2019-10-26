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
</head>
<body>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.addfield2.js"></script>

<div id="stylized" class="myform" style="margin:20px auto;">
<form id="form" name="form" method="post" action="../procomen.php">


<strong><font size="+2" color="#FFFFFF"><center>TABLA DE COMENTARIOS</center></font></strong>
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
<!--TABLA NUEVA 2019 TRAIDA DE JUNTA COTIZACIONES PENDIENTES-->
<br>
<br>
<strong><font size="+2" color="#FFFFFF"><center>TABLA DE REGISTRO DE COTIZACION</center></font></strong>
<table border='1'>
  <tr>   
    <td>FECHA</td>
    <td>HORA</td>
    <td>COTIZACION</td>
    <td>SOLICITO</td>
    <td>PRIORIDAD</td>
    <td width="150">COMENTARIOS</td>
    <td>CONTACTO</td> 
    <td>IMPORTE MN</td>
    <td>IMPORTE DLS</td>           
  </tr>
  
 <?php 
include('../conexion.php');
$ped=$_GET['idpedido'];


$s2=mysql_query("SELECT fecha, hora, idpedido, solicito, prioridad, comventas, contacto, importemn, importedls  from pedido WHERE idpedido='$ped'") or die(mysql_error());

while ($array=mysql_fetch_array($s2))
 {  
   echo"
  <tr class='<?php echo $bc;?>'>
    <td>".$array[0]."</td>
    <td>".$array[1]."</td>
    <td>".$array[2]."</td>
    <td>".$array[3]."</td>
    <td>".$array[4]."</td>
    <td width='150'>".$array[5]."</td>
    <td>".$array[6]."</td>
    <td>".$array[7]."</td>
    <td>".$array[8]."</td>
</tr>";  
  } 
 ?> 
</table>
<!--TABLA NUEVA 2019 TRAIDA DE JUNTA COTIZACIONES PENDIENTES-->
<p></p>
<p></p>
<input type='hidden' name='idpedido' value='<?php echo $ped;?>'/>

<br>
<p></p>
<br>
<div class="spacer"></div>
</form>
</div>
</body>
</html>
