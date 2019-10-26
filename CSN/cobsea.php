<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/form.css" type="text/css"/>
<title>Documento sin título</title>
<style>
input.text{
display:block;
}
</style>
<?php
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}

?>

</head>
<body>
<?php
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
	
	$fecha=date('Y-m-d');
    $contador=0;
?>
<div>

<center>
  
<strong><h2>REGISTRAR COBRANZA</h2></strong>
</center>

<form name="facsea" method="post" action="procobsea.php">
Factura
<input type="text" name="factura"  autofocus="autofocus" onKeyUp="this.value=this.value.toUpperCase();"/>
Cliente
<input type="text" name="cliente"  onKeyUp="this.value=this.value.toUpperCase();" />
Importe mn
<input type="text" name="importemn"  value="<?php if($contador>0){echo $array[4];}else{ echo "0.00";}?>"  />
Importe dls
<input type="text" name="importedls"  value="<?php if($contador>0){echo $array[5];}else{ echo "0.00";}?>"  />
Forma de pago
<select name="forma" style="text-transform:uppercase">
    <option value="#">SELECCIONE</option>
    <option value="CONTADO DLS">CONTADO DLS</option>
    <option value="CREDITO DLS">CREDITO DLS</option>
    <option value="TRASSALDO">TRASPASO ANT</option>
    <option value="NOTAS DE CREDITO">NOTAS DE CREDITO</option>
    <option value="EFECTIVO">EFECTIVO</option>
    <option value="CHEQUE">CHEQUE</option>
    <option value="TARJETA">TARJETA</option>
    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
    <option value="TRASALDO">TRASPASO DE SALDO</option>
    <option value="NO IDENTIFICADO">NO IDENTIFICADO</option>
    </select>

 Observaciones
 <select name="obser">
<option>SELECCIONE</option>
<option>PAGO</option>
<option>ANTICIPO</option></select>
    <input type="submit" value="Enviar" name="enviar" >
</form>
</div>
</body>
</html>