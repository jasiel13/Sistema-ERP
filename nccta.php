<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
if ($_SESSION["autentificado"]=="5" ){
header("Location: accesodenegado.php");
exit();
}
?>
<script language="JavaScript" type="text/javascript">

function valida(document)
{
  
  if (document.nc.value == "" )
    {
       
        alert("Ingrese el folio de la nota de credito.");
        document.nc.focus();
    return false;
  }
  
  else if (document.cliente.value == "" )
    {
       
        alert("Ingrese nombre del cliente.");
        document.cliente.focus();
    return false;
  }

  else if (document.factura.value == "" )
    {
       
        alert("Ingrese la factura");
        document.factura.focus();
    return false;
  } 
  
}
  </script>
</head>
<body>
<?php
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    $hoy=date('Y-m-d');
     
?>

	<div align='center'>
<form name='nc' action='ncprocta.php' method='post' onsubmit="return valida(this);">
	<p></p>
    <strong><font size='+2'>REGISTRO NOTA DE CREDITO</font></strong>
    <P></P>
    <table border='1'>
    	<tr><td>Fecha:</td><td><input type='text' name='fecha' value='<?php echo $hoy;?>' readonly='readonly'></td></tr>
        <tr><td>Nota de credito:</td><td><input type='text' name='nc'></td></tr>
        <tr><td>Cliente:</td><td><input type='text' name='cliente'></td></tr> 
        <tr><td>Importe MN:</td><td><input type='text' name='importemn'></td></tr>
        <tr><td>Importe DLS:</td><td><input type='text' name='importedls'></td></tr>
        <tr><td>Factura:</td><td><input type='text' name='factura'></td></tr>
        <tr><td>Descripción:</td><td><input type='text' name='desc'></td></tr>
        <tr><td></td><td><input type='image' src='images/save.png'></td></tr>
		
    </table>
</form>
</div>
</body>
</html>