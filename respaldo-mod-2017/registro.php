<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
                
  <script>
    function pulsar(e) {
      tecla = (document.all) ? e.keyCode :e.which;
      return (tecla!=13);
    }
    
    $(document).ready(function(){
     $("#cliente").autocomplete("autocomplete.php", {
        selectFirst: true
      });
    });
  
  </script> 


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
<script language="JavaScript" type="text/javascript">
<?php
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
 
 
</script>
<script language="JavaScript" type="text/javascript">

function valida(document)
{
  
  if (document.vendedor.value =="#" )
    {
       
        alert("Ingrese nombre del vendedor .");
        document.vendedor.focus();
    return false;
  }
  
  else if (document.factura.value == "" )
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


</head>
<body>
<?php
error_reporting(0);
include("conexion.php");
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();

$hora2=$_POST['hora2']; 
$contador=1;
  ?>
<form action="procregistro.php" name="registro" id="registro" method="post" onsubmit="return valida(this);">  
<?php
$hora2=$_POST['hora2']; 
$contador=0;

$almacen=$_POST['almacen'];

if ($almacen)
{ 
 $fac=$_POST['factura']; 
 
  $query=mysql_query("Select factura, fechafactura, horafactura, cliente, importemn, importe_dls, fechacontrarecibo, fechapago, tipopago, formapago, obserfac, vendedor FROM facturacion where factura='$fac'") 
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
    //echo "Error!";
  }
}//if almacen
$hoy=date("Y-m-d"); 
$hora=date('G:i');


//echo $hora;
?>

<center>
<h2>REGISTRO DE FACTURA</h2>
</center>
<div align="left" width='300'>
Fecha Factura
    <input type="date" name="fecha"  id="fecha" value="<?php if ($contador>0){echo $array[1];} else {echo $hoy;}?>" />
  Hora Factura
    <input type="text" name="hora" id="hora" value="<?php if($contador>0){echo $array[2];}else{ echo $hora;}?>" readonly="readonly"/>
  Vendedor
  <select name="vendedor">
      <option value='#'>Seleccione</option>
      <?php
        $q=mysql_query("select vendedor from vendedor");
        while($q1 = mysql_fetch_array($q))
{
echo'<OPTION VALUE="'.$q1['0'].'">'.$q1['0'].'</OPTION>';
}
?>
</select>

Factura
    <input type="text" name="factura" id="factura" onkeypress="return pulsar(event)" value="<?php if ($fac){echo $fac;} else{echo"";}?>" onKeyUp="this.value=this.value.toUpperCase();"/>
  Cliente
    <input name="cliente" type="text" id="cliente" onkeypress="return pulsar(event)" size="20" />
Importe M.N

          <script type="text/javascript">
$(document).ready(function(){
$("#agregar_texto"){return($a=preg_replace('/[^\-\d]*(\-?\d*).*/','$1',$s))?$a:'0';}
    </script>
    <input type="text" name="impmn" id="impmn" onkeypress="return pulsar(event)" value="<?php if($contador>0){echo $array[4];}else{ echo "0.00";}?>"  />
      
  
  Importe DLS
     <?php
    number_format('#impdls', 2, '.', ''); ?>
  <input type="text" name="impdls" id="impdls" onkeypress="return pulsar(event)" value="<?php if($contador>0){echo $array[5];}else{ echo "0.00";}?>" />
  
  
Tipo de pago
  
<select name="tpago" id="tpago" onchange="cambia_forma()" onkeypress="return pulsar(event)">
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
Dias de credito
<select name="dias" id="dias"> 
  <?php if ($contador>0){?>
    <option value="<?php echo $array[8];?>" selected><?php echo $array[9];?>
 <?php }
 else {?>
<option value="-">- 
  <?php }?>
</select> 
    
        <label for="lname">Forma de pago</label>
    <select name="forma" style="text-transform:uppercase" onkeypress="return pulsar(event)">
    <option value="#">SELECCIONE</option>
       <option value="TRASPASO DE FACTURA/ANTICIPO">TRASPASO DE FACTURA/ANTICIPO</option>
    <option value="NOTAS DE CREDITO">NOTAS DE CREDITO</option>
    <option value="EFECTIVO">EFECTIVO</option>
    <option value="CHEQUE">CHEQUE</option>
    <option value="TARJETA">TARJETA</option>
    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
    <option value="TRASPASO DE SALDO/FACTURA CON PUNTO">TRASPASO DE SALDO/FACTURA CON PUNTO</option>
    <option value="NO IDENTIFICADO">NO IDENTIFICADO</option>
    </select>
        <label for="lname">Observaciones</label>
    
  <select name="observ" onkeypress="return pulsar(event)">
  <option value='#'>Seleccione</option>
  <option VALUE='CLIENTE PASA'>CLIENTE PASA</option>
  <OPTION VALUE='ENVIO'>ENVIO</OPTION>
  <OPTION VALUE='MOSTRADOR'>MOSTRADOR</OPTION>
  <OPTION VALUE='PROGRAMACION DE PAGO'> PROGRAMACION DE PAGO</OPTION>
  <option value='REFACTURACION'>REFACTURACION</option>
  <option value='REMISION FACTURADA'>REMISION FACTURADA</option>
  <option value='MATERIAL ENTREGADO DIRECTO PROVEEDOR'>MATERIAL ENTREGADO DIRECTO PROVEEDOR</option>
  <option value='SERVICIO'>SERVICIO</option>
  <option value='CLIENTE AVISA'>CLIENTE AVISA</option>
  <option value='FACTURA EN PUNTO/NO SE ENTREGA'>FACTURA EN PUNTO/NO SE ENTREGA</option>
  <option value='ANTICIPO'>ANTICIPO</option>
  </select>
      <input type="submit" value="Enviar">
</div>

  

  <script language="javascript">
var formapago=new Array("-","1","3","7","15","20","24","30","34","45","60","90","120");

function cambia_forma(){ 
    //tomo el valor del select del pais elegido 
    var fp 
    fp = document.registro.tpago[document.registro.tpago.selectedIndex].value 
    //miro a ver si el pais está definido 
    if (fp == 'CREDITO') { 
         //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
         //selecciono el array de provincia adecuado 
         mis_formas=eval("formapago") 
         //calculo el numero de provincias 
         num_formas = mis_formas.length 
         //marco el número de provincias en el select 
         document.registro.dias.length = num_formas
         //para cada provincia del array, la introduzco en el select 
         for(i=0;i<num_formas;i++){ 
          document.registro.dias.options[i].value=mis_formas[i] 
          document.registro.dias.options[i].text=mis_formas[i] 
         }  
    }else{ 
         //si no había provincia seleccionada, elimino las provincias del select 
         document.registro.dias.length = 1 
         //coloco un guión en la única opción que he dejado 
         document.registro.dias.options[0].value = "-" 
         document.registro.dias.options[0].text = "-" 
    } 
    //marco como seleccionada la opción primera de provincia 
    document.registro.provincia.options[0].selected = true 
}

</script>

</form>

</body>