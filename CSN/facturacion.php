
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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


<title>Documento sin título</title>
<style type="text/css">
		h1
		{
			color:white;text-align:center;
			font-family: Arial;
		}
#fact label {
	font-family: Arial Black, Gadget, sans-serif;
}
#fact label {
	font-family: Lucida Console, Monaco, monospace;
}
#fact label {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>

<body>
<br>
<div align="center">
<H1>VER FACTURAS:</H1>


<form action="" method="get" >
<select onchange="this.form.action = this.value; this.disabled = true; this.form.submit()" >
<option value="SELECCIONE" >SELECCIONE</option>
<option value="fecha_cobranza_fac.php" >TODAS</option>
<option value="fecha_cobranza_sincontra.php" >SIN CONTRARECIBO</option>
</select>
</form>

</body>
</html>