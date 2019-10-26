<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

h2
{
  display: inline-block;
color: white; text-shadow: black 0.1em 0.1em 0.2em

}
input[type=date]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 75%;
    margin-left: auto;
    margin-right: auto;
    font-family: helvetica,arial,sans-serif;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/tablas.css" type="text/css"/>
<title>Documento sin título</title>
<script language="JavaScript" type="text/javascript">

function valida(document)
{
  
  if (document.factura.value == "" )
    {
       
        alert("Ingrese el folio de la factura.");
        document.factura.focus();
    return false;
  }
  
  else if (document.cliente.value == "" )
    {
       
        alert("Ingrese nombre del cliente.");
        document.cliente.focus();
    return false;
  }

  else if (document.tipo.value == "#" )
    {
       
        alert("Indique el tipo de pago.");
        document.tipo.focus();
    return false;
  } 
  
  else if (document.forma.value == "#" )
    {
       
        alert("Ingrese la forma de pago");
        document.forma.focus();
    return false;
  } 
  
 
}
  </script>
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

<style>
input.text{
display:block;
}
</style>

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
<p></p>
<center>  
<strong><h2>REGISTRO DE FACTURA CTA</h2></strong>
</center>

<form name="facsea" method="post" action="profaccta.php" onsubmit="return valida(this);">
Fecha Factura
<input type="text" name="fecha" readonly="readonly" value="<?php echo $fecha; ?>"  />
Factura
<input type="text" name="factura"  autofocus="autofocus" onKeyUp="this.value=this.value.toUpperCase();"/>
Cliente
<input type="text" name="cliente"  onKeyUp="this.value=this.value.toUpperCase();" />
Importe mn
<input type="text" name="importemn" value="<?php if($contador>0){echo $array[5];}else{ echo "0.00";}?>" />
Importe dls</td>
<input type="text" name="importedls" value="<?php if($contador>0){echo $array[5];}else{ echo "0.00";}?>" />
Tipo de pago
<select name="tipo" id="tipo"> 
   <option  value="#">SELECCIONE</option>
    <option value="CREDITO">CREDITO</option>
    <option value="CONTADO">CONTADO</option></select>
    Forma de pago
    <select name="forma" style="text-transform:uppercase">
    <option value="#">SELECCIONE</option>
    <option value="DLS">DLS</option>
    <option value="TRASPASO ANT">TRASPASO ANT</option>
    <option value="EFECTIVO">EFECTIVO</option>
    <option value="CHEQUE">CHEQUE</option>
    <option value="TARJETA">TARJETA</option>
    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
    <option value="TRASALDO">TRASPASO DE SALDO</option>
    <option value="NO IDENTIFICADO">NO IDENTIFICADO</option>   
    </select>
    <input type="submit" value="Enviar">
</form>
</div>
</body>
</html>