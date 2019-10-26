
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/form.css" type="text/css"/>
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
<form name="fact" id="fact" method="post" action="procfact-ind.php">
<div>
<center>
<h2>INGRESE EL RANGO DE FECHA:</h2> <br>
</center>
<label>Fecha Inicio</label>
    <input name="finicio" type="date" 'aaaa/mm/dd'  id="finicio" />
  <label>Fecha Final</label>
    <input name="ffin" type="date" 'aaaa/mm/dd' id="ffin"  value="<?php echo date("Y-m-d");?>"/>
    <label>Seleccione</label>
    <select name="opcion" >
    <option value="#">Seleccione</option>
    <option value="todas">Todas</option>
    <option value="sct">Sin contrarecibo</option>
    </select>
<input name="enviar" type="submit" title="Enviar" />

</div>
</form>
</body>
</html>