<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/form.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" type="text/javascript">
<?php
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}
if ($_SESSION["autentificado"]==""){
header("Location: accesodenegado.php");
exit();
}

?>

 <!-- Funcion que permite validar las cajas de texto -->
function valida(document)
{
 document.factura.focus();
}
</script>

<style type="text/css">
.almacen{
position:absolute;
top:45px;
left:560px;	
}
.boton
{
	position:absolute;
	top:150px;
	left:400px;
}
.fuente
{
	font-size:10px;
}
</style>

</script>
</head>
<body>

<form action="regcliente.php" name="registro" id="registro" method="post" onsubmit="return valida(this);">	


<div>
<center>
  
<h2>REGISTRO DE CLIENTE</h2>
</center>
<br>
ID CLIENTE
<input type="text" name="idcliente"  id="idcliente" autofocus="autofocus" /></td>
  
    CLIENTE
    <input type="text" name="cliente" id="cliente" onKeyUp="this.value=this.value.toUpperCase();" required/>
  CARTERA
    <select name="cartera" id="cartera"  onKeyUp="this.value=this.value.toUpperCase();"><option value="#">SELECCIONE</option><option value="ABOGADO">ABOGADO</option><option value="ACTUALIZADA">ACTUALIZADA</option><option value="ANALIZAR">ANALIZAR</option></select>
    SALDO
    <input name="saldo" type="text" id="saldo" size="20" required />
DIAS CREDITO
<select name="dias" id="dias">
  <option value='#'>Seleccione</option>
  <option VALUE='0'>0</option>
  <option VALUE='1'>1</option>
  <OPTION VALUE='3'>3</OPTION>
  <OPTION VALUE='7'>7</OPTION>
  <OPTION VALUE='15'>15</OPTION>
  <OPTION VALUE='20'>20</OPTION>
  <option value='24'>24</option>
  <option value='30'>30</option>
  <option value='34'>34</option>
  <option value='45'>45</option>
  <option value='60'>60</option>
  <option value='90'>90</option>
  <option value='120'>120</option>
<input type="submit" value="Enviar" name="enviar" />
</div>


    
  </table>

</form>

</body>