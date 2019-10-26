<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
  
table {
   width: 80%;
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
    border: 4px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<?php
error_reporting(0);
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}
if ($_SESSION["autentificado"]=="2"){
header("Location: accesodenegado.php");
exit();
}
$cliente=$_POST['cliente'];
$tipo=$_POST['tpago'];
if($tipo=='FACTURA')
{
	$num=$_POST['num'];
}
else 
{
	$num=1;
}
?>

</head>

<body>
<?php 


/*include ('conexion.php');
$factura=$_POST['factura'];
	$query=mysql_query("SELECT cliente, factura, importemn, importe_dls, formapago from facturacion where factura='$factura' AND tipopago='CREDITO'");
	$contador =mysql_num_rows($query);
 
 if($contador>0)
{	 
 $array=mysql_fetch_array($query);

	 //echo "correcto";
 }
*/
?>


<form name="f1" id="cobrar" method="post" action="procobrar.php">
<div align="center">
<strong><font color="#3333CC">COBRANZA</font></strong>
<p></p>
</div>
<div align="CENTER" width='300'>   
    
<table width="600" border="1">
  <tr>
    <td width="200">Cliente</td>
    <td><input type="text" size="80"  name="cliente" id="cliente" value="<?php echo $_POST['cliente'];?>" onKeyUp="this.value=this.value.toUpperCase();"  readonly="readonly"/></td>
  </tr>
<tr>
    <td>Factura</td>
     <td>Observaciones</td></tr>
<tr>

  <?php
  
  $i=0;
  for ($i=0; $i<$num; $i++)
 {
	 $factura='factura'.$i;
	 $ob='obser'.$i;
	 //echo $factura;
$x=mysql_query("select factura from facturacion where cliente='$cliente' and estado!='CANCELADA'");
//consulta para los combobox de facturas
//echo $_POST['cliente'];
?>
<tr>
<?php
if ($_POST['tpago']=='FACTURA')
{
?>
    <td><select name="<?php echo "factura".$i;?>">

<option>Seleccione una Opcion...</option>
<?php 
include ("conexion.php");
 
$clavebuscadah=mysql_query("select * from facturacion where cliente='$cliente' and tipopago='CREDITO' and pagada!='on' AND estado!='CANCELADA'");
while($row = mysql_fetch_array($clavebuscadah))
{
echo'<OPTION VALUE="'.$row['1'].'">'.$row['1'].'</OPTION>';
}
 
?>
</SELECT>
<?php
}
else
{
?>
<td><input type="text" name="<?php echo "factura".$i;?>" /></td>
<?php
}
?>
     <td><select name="<?php echo "obser".$i;?>" onchange="cambia_forma();cambia_forma2()" id="factura">
     <option value="#">SELECCIONE</option>
     <option value="PAGO">PAGO</option>
     <option value="ANTICIPO">ANTICIPO</option>
     <option value="AJUSTE">AJUSTE</option>
      <option value="ABONO">ABONO</option>
     </select></td>
  </tr>
<td>Importe</td>
<td><select name="mon" style="width: 80px;"><option value="MN">MN</option><option value="DLS">DLS</option></select>
<input type="text" name=fpago id="fpago" style="width: 82%;"/> 
</td>

<?php
 }
?>
<input type="hidden" name="numero" value="<?php echo $num; ?>"/>
<input type="hidden" name="tipo" value="<?php echo $tipo?>"/>  
<tr>
    <td>Forma de pago</td>
    <td><input type="text" name="forma" id="forma" value="" /></td>
  </tr>
   <tr>
  <td></td>
  <td><input type="image" src="images/save.png"/></td>
  </tr>
  </table>
  </div>
  </form>
<script language="javascript">

function cambia_forma(){ 
   	
   	var fp 
   fp = document.f1.tpago[document.f1.tpago.selectedIndex].value    	
   	if (fp == 'ANTICIPO') { 
      	  document.f1.fpago.disabled = false;
      	 
   	}else{ 
      
      	       	  document.f1.fpago.disabled = true;

		    	} 
   
}

function cambia_forma2(){ 
    
    var fp 
   fp = document.f1.tpago[document.f1.tpago.selectedIndex].value      
    if (fp == 'ABONO') { 
          document.f1.fpago.disabled = false;
         
    }else{ 
      
                  document.f1.fpago.disabled = true;

          } 
   
}
</script>
</body>
</html>