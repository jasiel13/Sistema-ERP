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
<div>
<center>
<h2>CHEQUES POSFECHADOS</h2>
</center>

<form name="cheque" method="post" action="chequepro.php">
No.Cheque
<input type="text" name="nocheque" required/>
Fecha exp
<input type="date" name="fechaexp" required/>
Banco
<select name="banco"> 
<option value="#">SELECCIONE</option>
<option value="AFIRME">AFIRME</option>
<option value="BANAMEX">BANAMEX</option>
<OPTION VALUE='BANCOMER'>BANCOMER</OPTION>
<option value="BANREGIO">BANREGIO</option>
<option value="BANORTE">BANORTE</option>
<option value="CIBANCO">CIBANCO</option>
<option value="HSBC">HSBC</option>
<option value='SANTANDER'>SANTANDER</option>
<option value='SCOTIABANK'>SCOTIABANK</option>
</select>
Cliente
<input name="cliente" type="text" id="cliente" size="20" />
fechacobro
<input type="date" name="fcobro" />
Importe MN
<input type="text" name="importe" required/>
Importe Dls
<input type="text" name="importedl" onkeyup="this.value = this.value.replace (/[^0-9]/, '');" required/>
<input type="submit" name="enviar" value="Enviar" />

</form>
</div>
</body>
</html>