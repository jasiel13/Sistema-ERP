<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<?php
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

</head>

<body>

	
<?php

include ('conexion.php');
$rem=$_POST['remision'];
$cliente=$_POST['cliente'];
?>

<div align='center'>
<p></p>
<p></p>
<strong><font size='+2'>Ingrese Factura:</font></strong>
<p></p>
<p></p>
<form name='factrem' method='post' action='rf.php' >
<strong><font size=''></font></strong>
<table border='1'>
	<tr><td>Remision</td><td>Cliente</td><td>Factura</td></tr>
	<tr><td><?php echo $rem;?></td><td><?php echo $cliente;?></td><td><input type='text' name='factura' onKeyUp="this.value=this.value.toUpperCase();"></td><input type='hidden' name='remision' value='<?php echo $rem;?>'></tr>
</table>
<input type='image' src='images/accept.png'>
</form>
</div>
<?php

?>
</body>
</html>