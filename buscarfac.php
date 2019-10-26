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
?>

</head>
<body>
<form name="mf" id="mf" method="post" action="modf.php">
<div>
<br>
<center>
<h2>Fecha de Factura</h2>
</center>
<input name="fechac" type="date" 'aaaa/mm/dd'  value="<?php echo date("Y-m-d");?>">  
<input name="enviar" type="submit" title="Enviar" />
</div>
</form>

</body>
</html>