<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/form.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Documento sin título</title>
<style type="text/css">
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
<form name="fact" id="fact" method="post" action="relcheques.php">
<div>
<center>
<h2>INGRESE EL RANGO DE FECHA:</h2>
</center>
<br>
<label>Fecha Inicio</label>
  <input type="date" name="finicio" id="finicio" step="1" value="">   
  <label>Fecha Final</label>
    <input type="date" name="ffin" id="ffin" step="1" value="<?php echo date("Y-m-d");?>">



<input name="enviar" type="submit" title="Enviar">
</div>
</form>
</body>
</html>