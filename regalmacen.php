<style type="text/css">

table {
   width: 30%;
   border: 1px solid #000;
}
tr, td {
   width: 25%;
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
.almacen{
position:absolute;
top:45px;
left:600px;	
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
<?php
include('conexion.php');
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$halma=date('G:i');

$fac=$_POST['factura']; 
 
  $query=mysql_query("Select factura, fechafactura, horafactura, cliente, importemn, importe_dls, fechacontrarecibo, fechapago, tipopago, formapago, observaciones FROM facturacion where factura='$fac'") 
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
//if almacen
$hoy=date("Y-m-d");	
$hora=date('G:i');


//echo $hora;
?>

<div align="center">
<h2><strong><font color="#F2F2F2">REGISTRO DE FACTURA</font></strong></h2>
<p></p>
</div>
<div align="left" width='300'>
<form name="regalma" method="post" action="procregalma.php">
<table width="300" border="1">
  <tr>
    <td BGCOLOR="#0080FF">Factura</td>
    <td><input type="text" name="factura" id="factura" value="<?php if ($fac){echo $fac;} else{echo"";}?>" onKeyUp="this.value=this.value.toUpperCase();"/></td>
  </tr>
  <tr>
    <td BGCOLOR="#0080FF">Fecha Factura</td>
    <td><input type="date" name="fecha"  id="fecha" value="<?php if ($contador>0){echo $array[1];} else {echo $hoy;}?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td BGCOLOR="#0080FF">Hora Factura</td>
    <td><input type="text" name="hora" id="hora" value="<?php if($contador>0){echo $array[2];}else{ echo $hora;}?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td BGCOLOR="#0080FF">Cliente</td>
    <td><input type="text" name="cliente" id="cliente" value="<?php if($contador>0){echo $array[3];}else{ echo "";}?>"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="on" /></td>
  </tr>
  <tr>
   <td BGCOLOR="#0080FF">Observaciones</td>
    <td><?php if($contador>0){echo $array[10];}else{ echo "";}?>  
    </td>
  </tr>
  </table>
  
  
  
<table width="300" border="1" class="almacen">
  <tr>
    <td BGCOLOR="#0080FF">Hora recibido</td>
    <td><input type="text" name="horarec" id="horarec" value="<?php echo $halma;?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td BGCOLOR="#0080FF">Recibió</td>
    <td><select name="recibio" id="recibio">
     <option value="#">SELECCIONE</option>   
   <option value="Javier Rodriguez">Javier Rodriguez</option>      
    <option value="David Frias">David Frias</option>
    <option value="David Guerrero">David Guerrero</option>      
    <option value="Fernando Baca">Fernando Baca</option>
    <option value="Luis Mejia">Luis Mejia</option>
    <option value="Alfredo Vallejo">Alfredo Vallejo</option>
     <option value="Jorge Jimenez">Jorge Jimenez</option>
    <option value="Crisitan de la Paz">Crisitan de la Paz</option>
    <option value="Manuel Gaytan">Manuel Gaytan</option>
    <option value="Jorge Lopez">Jorge Lopez</option>
    <option value="Adrian Gallegos">Adrian Gallegos</option>
    <option value="Luis A. Hernández">Luis A. Hernández</option>
    <option value="Ricardo Galindo">Ricardo Galindo</option>
    <option value="OTRO">OTRO</option>
    </select></td>
  </tr>
  <tr>
    <td BGCOLOR="#0080FF">Surtió</td>
    <td><select name="surtio" id="surtio">
    <option value="#">SELECCIONE</option>   
    <option value="Javier Rodriguez">Javier Rodriguez</option>  
    <option value="David Frias">David Frias</option>
    <option value="David Guerrero">David Guerrero</option>  
    <option value="Fernando Baca">Fernando Baca</option>
    <option value="Luis Mejia">Luis Mejia</option>
    <option value="Alfredo Vallejo">Alfredo Vallejo</option>
     <option value="Jorge Jimenez">Jorge Jimenez</option>
    <option value="Crisitan de la Paz">Crisitan de la Paz</option>
    <option value="Manuel Gaytan">Manuel Gaytan</option>
    <option value="Jorge Lopez">Jorge Lopez</option>
    <option value="Adrian Gallegos">Adrian Gallegos</option>
    <option value="Luis A. Hernández">Luis A. Hernández</option>
    <option value="Ricardo Galindo">Ricardo Galindo</option>  
    <option value="OTRO">OTRO</option>
    </td>
  </tr>
  <tr>
    <td BGCOLOR="#0080FF">Estatus</td>
    <td><select name="estatus" id="estatus">
     <option value="#">SELECCIONE</option>
    <option value="MOSTRADOR VENTAS">MOSTRADOR VENTAS</option>
    <option value="MOSTRADOR ALMACEN">MOSTRADOR ALMACEN</option>
    <option value="ENTREGA DOMICILIO">ENTREGA A DOMICILIO</option></select></td>
  </tr>
  <tr>
    <td BGCOLOR="#0080FF">Recibida en almacén</td>
    <td><input type="checkbox" name="entregada" id="entregada"/></td>
  </tr>
<tr>
    <td BGCOLOR="#0080FF">Recibida FYC</td>
    <td><input type="checkbox" name="recibida" id="recibida"/></td>
  </tr>

<tr>
    <td BGCOLOR="#0080FF">Entrega a tiempo</td>
    <td><select name="tiempo" id="tiempo">
       <option value="#">SELECCIONE</option> 
     <option value="EN TIEMPO">EN TIEMPO</option>
    <option value="ERROR ADMINISTRATIVO">ERROR ADMINISTRATIVO</option>
    <option value="NO DISPONER EQUIPO DE REPARTO">NO DISPONER EQUIPO DE REPARTO</option>
    <option value="DEMORA EN SALIDA DE CHOFER">DEMORA EN SALIDA DE CHOFER</option>
    <option value="OTRO">OTRO</option></select></td>
  </tr>
<tr>
    <td BGCOLOR="#0080FF">Entrega completa</td>
    <td><select name="completa" id="completa">
     <option value="#">SELECCIONE</option>
     <option value="COMPLETA">COMPLETA</option>
 <option value="DIFERENCIA FISICO VS SISTEMA">DIFERENCIA FÍSICO VS SISTEMA</option>
    <option value="DIFERENCIA REMITENTE Y FISICO">DIFERENCIA REMITENTE Y FÍSICO</option>
    <option value="NO EXISTE MATERIAL">NO EXISTE MATERIAL</option>
    <option value="OTROS">OTROS</option></select></td>
  </tr>
<tr>
    <td BGCOLOR="#0080FF">Observaciones</td>
    <td><textarea name="obser" id="obser" onKeyUp="this.value=this.value.toUpperCase();" multiple="multiple"></textarea></td>
  </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>

<center>
  
<input type="image" src="images/accept.png" height="90" width="90" align="middle" />
</center>
  

</form>
 