<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
  
table {
   width: 30%;
   border: 2px solid #000;
   margin-left: 3%;
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
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<?php
error_reporting(0);
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}
if ($_SESSION["autentificado"]=="3" ){
header("Location: accesodenegado.php");
exit();
}

?>

<script language="javascript" type="text/javascript">
function valida(document)
{
	document.factura.focus();
}
</script>
<style type="text/css">
.re
{
position: absolute; top: 60px; left: 300px;
}
.nc{
	position: absolute; top: 60px; left: 600px;
}
</style>
</head>

<body>
<div align="left">
<form name="admin" action="procadmin.php" method="post" onsubmit="return valida(this)">
<p></p>
<center>
<font size="+2" color="#FFFFFF"><strong>CANCELACION O REFACTURACION</strong></font>
</center>
<p></p>
<table border="1">
<tr>
<td>Factura</td>
<td><input type="text" name="factura" onKeyUp="this.value=this.value.toUpperCase();" /></td>
</tr>
<tr>
<td colspan="2"><center><input type="image" name="enviar" src="images/1396468944_34.png" onfocus="true" /></center></td>
</tr>
</table>
</form >
</div>
<div align='center'>
<form name= 'remision' method='post' action='procremision.php'>
<table border="1" class='re'>
<tr>
<td>Remisión</td>
<td><input type="text" name="remision" onKeyUp="this.value=this.value.toUpperCase();" /></td>
</tr>
<tr>
<td colspan="2"><center><input type="image" name="enviar" src="images/1396468944_34.png" onfocus="true" /></center></td>
</tr>
</table>
</form>
</div>
<div align='center'>
<form name= 'remision' method='post' action='pronc.php'>
<table border="1" class='nc'>
<tr>
<td>Nota de credito</td>
<td><input type="text" name="nc" onKeyUp="this.value=this.value.toUpperCase();" /></td>
</tr>
<tr>
<td colspan="2"><center><input type="image" name="enviar" src="images/1396468944_34.png" onfocus="true" /></center></td>
</tr>
</table>
</form>
</div>
</body>
</html>