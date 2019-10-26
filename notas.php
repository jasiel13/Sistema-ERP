<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
  
table {
   width: 40%;
   border: 2px solid #000;
   margin-left: 0%;
}
tr, td {

   text-align: left;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
tr {
   background: #eee;
}
input[type=text], select {
    width: 100%;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="JavaScript" type="text/javascript">

function valida(document)
{
  
  if (document.nota.value == "" )
    {
       
        alert("Ingrese el folio de la nota de credito.");
        document.nota.focus();
    return false;
  }
  
  else if (document.cliente.value == "" )
    {
       
        alert("Ingrese nombre del cliente.");
        document.cliente.focus();
    return false;
  }

  else if (document.tpago.value == "#" )
    {
       
        alert("Indique el tipo de nota.");
        document.tipo.focus();
    return false;
  } 
  
  else if (document.fac.value == "" )
    {
       
        alert("Ingrese la factura a la que pertenece");
        document.fac.focus();
    return false;
  } 
  
}
  </script>
<?php
error_reporting(0);
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}
/*if ($_SESSION["autentificado"]=="3"){
header("Location: accesodenegado.php");
exit();
}
*/
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
<form name="nota" id="nota" method="post" action="procnota.php" onsubmit="return valida(this);">
<div align="center">
<p></p>
<font size="+2" color="#000066"><strong>REGISTRAR NOTA DE CRÉDITO</strong></font>
<p></p>

<table border="1">

<tr><td>Nota de crédito</td>
<td><input type="text" name="nota" onKeyUp="this.value=this.value.toUpperCase();" /></td>
</tr>
<tr><td>Cliente</td>
<td><input name="cliente" type="text" id="cliente" size="20" /></td>
</tr>
<tr><td>Total/Parcial</td>
<td><select name=tpago onchange="cambia_forma()"> 
<option value="#" selected>Seleccione... 
<option value="TOTAL">TOTAL
<option value="PARCIAL">PARCIAL 
</select>
</td>
</tr><tr><td>Importe MN</td>
<td><input type="text" name="importemn" disabled="disabled" /></td>
</tr>
<tr><td>Importe DLS</td>
<td><input type="text" name="importedls" disabled="disabled"  /></td>
</tr>
<tr><td>Factura a aplicar</td>
<td><input type="text" name="fac" /></td>
</tr>
<tr><td>Descripción</td>
<td><textarea name="descri" onKeyUp="this.value=this.value.toUpperCase();"></textarea></td>
</tr>
<tr><td></td>
<td><input type="image" name="enviar" src="images/1396468944_34.png" /></td>
</tr>

</table>
</div>
</form>
<script language="javascript">
var formapago=new Array("-","EFECTIVO","CHEQUE", "TARJETA","TRASPSALDO");

function cambia_forma(){ 
    //tomo el valor del select del pais elegido 
    var fp 
    fp = document.nota.tpago[document.nota.tpago.selectedIndex].value 
    //miro a ver si el pais está definido 
    if (fp == 'PARCIAL') { 
          document.nota.importemn.disabled = false;
          document.nota.importedls.disabled = false;

    }else{ 
         //si no había provincia seleccionada, elimino las provincias del select 
                 document.nota.importemn.disabled = true;
          document.nota.importedls.disabled = true;

          } 
    //marco como seleccionada la opción primera de provincia 
}
</script>

</body>
</html>