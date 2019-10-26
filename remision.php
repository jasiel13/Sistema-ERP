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
 <!--Funcion que permite validar las cajas de texto-->
function valida(document)
{
  
  if (document.remision.value =="" )
    {
       
        alert("Ingrese folio de la remision.");
        document.remision.focus();
    return false;
  }
  
  else if (document.cliente.value == "" )
    {
       
        alert("Ingrese el nombre del cliente.");
        document.cliente.focus();
    return false;
  }
  
  else if (document.pedido.value == "" )
    {
       
        alert("Ingrese folio de pedido.");
        document.pedido.focus();
    return false;
  }
  
  
  else if (document.tpago.value == "#" )
    {
       
        alert("Indique el tipo de pago.");
        document.tpago.focus();
    return false;
  } 
  
 
}
  </script>
<?php
error_reporting(0);
session_start();
/*if ($_SESSION["autentificado"]=="3"){
header("Location: accesodenegado.php");
exit();
}*/
?>
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

<form name="f1" id="remision" method="post" action="procrem.php" onsubmit="return valida(this);">
<?php

error_reporting(0);
include("conexion.php");
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();

$hoy=date("Y-m-d"); 
$hora=date('G:i');
$hora2=$_POST['hora2']; 
$contador=0;

$almacen=$_POST['almacen'];

if ($almacen)
{ 
 $rem=$_POST['remision']; 
 
  $query=mysql_query("Select remision, fecharem, horarem, cliente, importemn, importedls, pedido, facturada, tipopago, formapago FROM remision where remision='$rem'") 
  or die(mysql_error());
$contador=mysql_num_rows($query);

if($contador>0)
{  
 $array=mysql_fetch_array($query);
 $array['fechafactura'];
 $array['horafactura'];
  }
  else
  {
  echo "error"; 
    }
}
?>
<div align="center">
<p></p>
<font size="+2" color="#FFFFFF"><strong>REGISTRAR REMISIÓN</strong></font>
<p></p>
</div>
<table border="1">

<tr>
    <td>Fecha Remision</td>
    <td><input type="date" name="fecha"  id="fecha" value="<?php if ($contador>0){echo $array[1];} else {echo $hoy;}?>" /></td>
  </tr>
  <tr>
    <td>Hora Remision</td>
    <td><input type="text" name="hora" id="hora" value="<?php if($contador>0){echo $array[2];}else{ echo $hora;}?>" readonly="readonly"/></td>
  </tr>
<tr><td>Remisión</td>
<td><input type="text" name="remision" onKeyUp="this.value=this.value.toUpperCase();" value="<?php if ($rem){echo $rem;} else{echo"";}?>"/></td>
</tr>
<tr><td>Cliente</td>
<td><input name="cliente" type="text" id="cliente" size="20" value="<?php if ($contador>0){echo $array[3];} else{echo"";}?>" /></td>
</tr>
<tr><td>Importe MN</td>
<td><input type="text" name="importemn" value="<?php if ($contador>0){echo $array[4];} else{echo"";}?>" /></td>
</tr>
<tr><td>Importe DLS</td>
<td><input type="text" name="importedls" value="<?php if ($contador>0){echo $array[5];} else{echo"";}?>"/></td>
</tr>
<tr><td>Pedido</td>
<td><input type="text" name="pedido" onKeyUp="this.value=this.value.toUpperCase();" value="<?php if ($contador>0){echo $array[6];} else{echo"";}?>" /></td>
</tr>
<tr><td>factura</td>
<td><input type="text" name="factura" onKeyUp="this.value=this.value.toUpperCase();" value="<?php if ($contador>0){echo $array[7];} else{echo"";}?>" /></td>
</tr>
<tr><td>Tipo de pago</td>
  
<td><select name=tpago onchange="cambia_forma()">
 <?php if ($contador>0){?>
    <option value="<?php echo $array[8];?>" selected><?php echo $array[8];?>
 <?php }
 else {?>
<option value="#" selected>Seleccione... 
<option value="CONTADO">CONTADO 
<option value="CREDITO">CREDITO 
</select>
<?php
}
?>
</td>
</tr>
<tr>
<td>Forma de pago</td>
<td><select name=fpago> 
  <?php if ($contador>0){?>
    <option value="<?php echo $array[9];?>" selected><?php echo $array[9];?>
 <?php }
 else {?>
<option value="-">- 
  <?php }?>
</select> 
</td>
</tr>
<tr><td>Observaciones</td>
<td>
<select name="descri">
  <option value='#'>Seleccione</option>
  <option VALUE='CLIENTE PASA'>CLIENTE PASA</option>
  <OPTION VALUE='ENVIO'>ENVIO</OPTION>
  <OPTION VALUE='MOSTRADOR'>MOSTRADOR</OPTION>
  <OPTION VALUE='PIEZA ESPECIAL'>PIEZA ESPECIAL</OPTION>
  <OPTION VALUE='PROGRAMACION DE PAGO'> PROGRAMACION DE PAGO</OPTION>
  <option value='REFACTURACION'>REFACTURACION</option>
  <option value="MUESTRA">MUESTRA</option>
  <option value='SE ENTREGÓ MCIA'>SE ENTREGÓ MCIA</option>
  <option value='SE ENTREGÓ MCIA'>NO SE ENTREGÓ MCIA</option>
</select></td>
</tr>

</table>
<script language="javascript">
var formapago=new Array("-","EFECTIVO","CHEQUE", "TARJETA","TRASPSALDO","TRANSFERENCIA");

function cambia_forma(){ 
    //tomo el valor del select del pais elegido 
    var fp 
    fp = document.f1.tpago[document.f1.tpago.selectedIndex].value 
    //miro a ver si el pais está definido 
    if (fp == 'CONTADO') { 
         //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
         //selecciono el array de provincia adecuado 
         mis_formas=eval("formapago") 
         //calculo el numero de provincias 
         num_formas = mis_formas.length 
         //marco el número de provincias en el select 
         document.f1.fpago.length = num_formas
         //para cada provincia del array, la introduzco en el select 
         for(i=0;i<num_formas;i++){ 
          document.f1.fpago.options[i].value=mis_formas[i] 
          document.f1.fpago.options[i].text=mis_formas[i] 
         }  
    }else{ 
         //si no había provincia seleccionada, elimino las provincias del select 
         document.f1.fpago.length = 1 
         //coloco un guión en la única opción que he dejado 
         document.f1.fpago.options[0].value = "-" 
         document.f1.fpago.options[0].text = "-" 
    } 
    //marco como seleccionada la opción primera de provincia 
    document.f1.provincia.options[0].selected = true 
}

</script>
<br>
<center>
<input type="image" src="images/save.png" height="78" width="78" align="middle" />
</center>
  


<table width="300" border="1" class="almacen">
  <tr>
    <td>Hora recibido</td>
    <td><input type="text" name="horarec" id="horarec" value="<?php echo $hora2;?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td>Recibió</td>
    <td><select name="recibio" id="recibio">
<option value="#">SELECCIONE</option>
    <option value="Luis Mejia">Luis Mejia</option>   
    <option value="Javier Rodriguez">Javier Rodriguez</option>  
    <option value="Alfredo Vallejo">Alfredo Vallejo</option>
    <option value="David Frias">David Frias</option>
    <option value="David Guerrero">David Guerrero</option>    
    <option value="Manuel Gaytan">Manuel Gaytan</option>
    <option value="Adrian Gallegos">Adrian Gallegos</option>
    <option value="Fernando Baca">Fernando Baca</option>
    <option value="Jorge Jimenez">Jorge Jimenez</option>
    <option value="Jorge Lopez">Jorge Jimenez</option>
    <option value="Luis A. Hernández">Luis A. Hernández</option>
    <option value="Ricardo Galindo">Ricardo Galindo</option>
    <option value="Cristian de la Paz">Cristian de la Paz</option>
    <option value="OTRO">OTRO</option>
    </select></td>
  </tr>
  <tr>
    <td>Surtió</td>
    <td><select name="surtio" id="surtio">
<option value="#">SELECCIONE</option>
    <option value="Luis Mejia">Luis Mejia</option>   
    <option value="Javier Rodriguez">Javier Rodriguez</option>  
    <option value="Alfredo Vallejo">Alfredo Vallejo</option>
    <option value="David Frias">David Frias</option>
    <option value="David Guerrero">David Guerrero</option>    
    <option value="Manuel Gaytan">Manuel Gaytan</option>
    <option value="Adrian Gallegos">Adrian Gallegos</option>
    <option value="Fernando Baca">Fernando Baca</option>
    <option value="Jorge Jimenez">Jorge Jimenez</option>
    <option value="Jorge Lopez">Jorge Jimenez</option>
    <option value="Luis A. Hernández">Luis A. Hernández</option>
    <option value="Ricardo Galindo">Ricardo Galindo</option>
    <option value="Cristian de la Paz">Cristian de la Paz</option>
    <option value="OTRO">OTRO</option>
    </select></td>
  </tr>
  <tr>
    <td>Estatus</td>
    <td><select name="estatus" id="estatus">
     <option value="#">SELECCIONE</option>
    <option value="MOSTRADOR VENTAS">MOSTRADOR VENTAS</option>
    <option value="MOSTRADOR ALMACEN">MOSTRADOR ALMACEN</option>
    <option value="ENTREGA DOMICILIO">ENTREGA A DOMICILIO</option></select></td>
  </tr>

<tr>
    <td>Recibida en almacén</td>
    <td><input type="checkbox" name="entregada" id="entregada"/></td>
  </tr>
<tr>
    <td>Recibida FYC</td>
    <td><input type="checkbox" name="recibida" id="recibida"/></td>
  </tr>

<tr>
    <td>Entrega a tiempo</td>
    <td><select name="tiempo" id="tiempo">
       <option value="#">SELECCIONE</option> 
     <option value="EN TIEMPO">EN TIEMPO</option>
    <option value="ERROR ADMINISTRATIVO">ERROR ADMINISTRATIVO</option>
    <option value="NO DISPONER EQUIPO DE REPARTO">NO DISPONER EQUIPO DE REPARTO</option>
    <option value="DEMORA EN SALIDA DE CHOFER">DEMORA EN SALIDA DE CHOFER</option>
    <option value="OTRO">OTRO</option></select></td>
  </tr>
<tr>
    <td>Entrega completa</td>
    <td><select name="completa" id="completa">
     <option value="#">SELECCIONE</option>
     <option value="COMPLETA">COMPLETA</option>
 <option value="DIFERENCIA FISICO VS SISTEMA">DIFERENCIA FÍSICO VS SISTEMA</option>
    <option value="DIFERENCIA REMITENTE Y FISICO">DIFERENCIA REMITENTE Y FÍSICO</option>
    <option value="NO EXISTE MATERIAL">NO EXISTE MATERIAL</option>
    <option value="OTROS">OTROS</option></select></td>
  </tr>
<tr>
    <td>Observaciones</td>
    <td><textarea name="obser" id="obser" onKeyUp="this.value=this.value.toUpperCase();" multiple="multiple"></textarea></td>
  </tr>
</table>



</form>
</body>
</html>