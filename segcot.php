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
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.addfield2.js"></script>

<div id="stylized" class="myform" style="margin:20px auto;">
<form id="form" name="form" method="post" action="proseg.php">

	<table border='1'>
		<tr><td>#</td><td>FECHA</td><td>COMENTARIOS</td><td>USUARIO</td></tr>
	
 <?php 
 include('conexion.php');
 session_start();
 $tipou=$_SESSION['autentificado'];
$ped=$_GET['id'];
//echo $ped;
$i=0;
$i=$i+1;
$y=0;
$s=mysql_query("SELECT fecha, hora, comentarios, usuario  from segcot WHERE folio='$ped'") or die(mysql_error());
$z=mysql_query("SELECT fechac, hora, comentarios, usuario, tipo from comentarios WHERE idpedido='$ped'") or die(mysql_error());
//echo "Select fechac, hora, comentarios, fechapc, usuario from comentarios where idpedido='$ped'";
while ($s1=mysql_fetch_array($s)) {
	$y=$y+1;
	?>

		<tr class='<?php echo $bc;?>'><td><?php echo $y;?></td><td><?php echo $s1[0]."  ".$s1[1];?></td><td><?php echo $s1[2]; ?></td><td><?php  echo $s1[3]; ?></td></tr>
	<?php
	}
//*********************************************************************************************************************************************************************************************************
			while ($s2=mysql_fetch_array($z)) {
	$y=$y+1;
	if 
	($s2[4]==6){
	$bc='c';
	}
	else if($s2[4]==5)
	{
		$bc='v';
	}
	?>

		<tr class='<?php echo $bc;?>'><td><?php echo $y;?></td><td><?php echo $s2[0]."  ".$s2[1];?></td><td><?php echo $s2[2]; ?></td><td><?php  echo $s2[3]; ?></td></tr>
	<?php
	}

 ?>
</table>
<p></p>
<p></p>
<input type='hidden' name='idpedido' value='<?php echo $ped;?>'/>
	<div id="div_1">
		
	
    <input  type="date"  name="fecha1" id="fecha"  style="visibility:hidden" /><br>
	<label>Comentarios</label>
	<input  type="text"  name="comentarios1" id="comentarios" style="width:200px; height:50px;" cols='30'/>
	<input class="bt_plus" id="1" type="button" value="+" /><div class="error_form">
	</div>
	
	
</div>
<button type="submit" class="boton">Guardar</button>

<?php
//$cont = "<script> document.write(elem.data(indice)) </script>";

if ($tipou=='5' or $tipou=='10' or $tipou=='1') 
	{
		?>
   			 <tr><th><STRONG>Enviar a COT. PENDIENTES </STRONG><input type='checkbox' name='cotapen' ></th></tr>
		<?php
	}


?>

<p></p>