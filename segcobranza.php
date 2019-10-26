<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/form.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<?php
error_reporting(0);
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}
if ($_SESSION["autentificado"]=="2" ){
header("Location: accesodenegado.php");
exit();
}

?>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
<script>
$(document).ready(function(){
 $("#cliente").autocomplete("autocomplete.php", {
		selectFirst: true
	});
});
</script>
</head>

<body>
<?php
$hoy=date('Y-m-d');
include ('conexion.php');

?>
<div>
<center>	
<h2>SEGUIMIENTO COBRANZA</h2>
</center>

<form name="seguimiento" method="post" action="procseg.php">
Fecha
<input type="date"  value="y-m-d" name="fechar"   />
Cliente
<input name="cliente" type="text" id="cliente" size="20" /></td>
Observaciones
<br>
<textarea name="obser" cols="40" rows="3" onKeyUp="this.value=this.value.toUpperCase();"></textarea>
<input type="submit" name="enviar" value="Enviar" />
</form>
</div>
</body>
</html>