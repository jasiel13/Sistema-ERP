<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/form.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Documento sin título</title>

</head>

<body>
<form name="fact" id="fact" method="post" action="cobranza_fac.php">
<div>
<center>
<h2>INGRESE EL RANGO DE FECHA:</h2>
<br>
</center>
<br>
<label>Fecha Inicio</label>
    <input name="finicio" type="date" 'aaaa/mm/dd'  id="finicio" />
  <label>Fecha Final</label>
    <input name="ffin" type="date" 'aaaa/mm/dd' id="ffin" value="<?php echo date("Y-m-d");?>"/>

<input name="enviar" type="submit" title="Enviar" />

</div>
</form>
</body>
</html>