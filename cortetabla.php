<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
require('html2pdf.class.php');
date_default_timezone_set("America/Mexico_City");
//$hoy=date('Y-m-d');
$hoy='2014-04-10';
$suma=0;
$i=0;
echo $hoy;
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(.5,.5,1.5,1.5);

include("conexion.php");
//facturas
$queEmp = ( "select * from facturacion where fechafactura='$hoy' order by tipopago, formapago");
if ($queEmp)
{
	echo $queEmp."si jala";}
	else{
	echo "no jala";
	}

$resEmp = mysql_query($queEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'factura'=>'<b>FACTURA</b>',
				'cliente'=>'<b>CLIENTE</b>',
				'importemn'=>'<b>IMP M.N</b>',
				'importe_dls'=>'<b>IMP DLS</b>',
				'tipopago'=>'<b>TIPO PAGO</b>',
				'formapago'=>'<b>FORMA DE PAGO</b>');//facturas
	//$suma=array_sum($data['5']);
	
	//remisiones****************************
	
	$txttit2 = "<b>REMISIONES</b>\n";
$queEmp2="select remision, cliente, importemn, importedls, pedido, descr from remision where facturada=''";
$resEmp2 = mysql_query($queEmp2) or die(mysql_error());
$totEmp2 = mysql_num_rows($resEmp2);

$ixx2 = 0;
while($datatmp2 = mysql_fetch_assoc($resEmp2)) { 
	$ixx2 = $ixx2+1;
	$data2[] = array_merge($datatmp2, array('num'=>$ixx2));
}

	
$remision= array(
//campo para remisiones
'remision'=>'<b>FACTURA</b>',
'cliente'=>'<b>CLIENTE</b>',
'importemn'=>'<b>IMP MN</b>',
'importedls'=>'<b>IMP DLS</b>',
'pedido'=>'<b>PEDIDO</b>',
'descr'=>'<b>OBSERVACIONES<b>'
);
	//**************remisiones
	
//******************notas de credito***********
	$txttit3 = "<b>NOTAS DE CREDITO</b>\n";
$queEmp3="select nota, cliente, importemn, importedls, factura, descri  from notacredito  where fechanota='2014-04-14'";
$resEmp3 = mysql_query($queEmp3) or die(mysql_error());
$totEmp3 = mysql_num_rows($resEmp3);

$ixx3 = 0;
while($datatmp3 = mysql_fetch_assoc($resEmp3)) { 
	$ixx3 = $ixx3+1;
	$data3[] = array_merge($datatmp3, array('num'=>$ixx3));
}

	
$notas= array(
'nota'=>'<b>NOTA</b>',
'cliente'=>'<b>CLIENTE</b>',
'importemn'=>'<b>IMP MN</b>',
'importe_dls'=>'<b>IMP DLS</b>',
'factura'=>'<b>FACTURA</b>',
'descri'=>'<b>DESCRIPCION</b>'
);//NOTAS DE CREDITO**************/
	
	//COBRANZA*******************
	$txttit1 = "<b>COBRANZA</b>\n";
$queEmp1="select factura, cliente, pago, importe_dls, formapago, cobro from facturacion where fechacobro='2014-04-15'";
$resEmp1 = mysql_query($queEmp1) or die(mysql_error());
$totEmp1 = mysql_num_rows($resEmp1);

$ixx1 = 0;
while($datatmp1 = mysql_fetch_assoc($resEmp1)) { 
	$ixx1 = $ixx1+1;
	$data1[] = array_merge($datatmp1, array('num'=>$ixx1));
}

	
$cobranza= array(
//campo para remisiones
'cobro'=>'<b>OBSERVACIONES</b>',
'factura'=>'<b>FACTURA</b>',
'cliente'=>'<b>CLIENTE</b>',
'pago'=>'<b>IMP MN</b>',
'importe_dls'=>'<b>IMP DLS</b>',
'formapago'=>'<b>FORMA PAGO</b>'
);//cobranza*************

//******************CHEQUE***********
	$txttit4 = "<b>CHEQUES POSFECHADOS</b>\n";
$queEmp4="select nocheque, banco, cliente, fechacobro, importe from cheque  where cobrado=''";
$resEmp4 = mysql_query($queEmp4) or die(mysql_error());
$totEmp4 = mysql_num_rows($resEmp4);

$ixx4 = 0;
while($datatmp4 = mysql_fetch_assoc($resEmp4)) { 
	$ixx4 = $ixx4+1;
	$data4[] = array_merge($datatmp4, array('num'=>$ixx4));
}

	
$cheque= array(
'nocheque'=>'<b>NO.CHEQUE</b>',
'banco'=>'<b>BANCO</b>',
'cliente'=>'<b>CLIENTE</b>',
'fechacobro'=>'<b>F. COBRO</b>',
'importe'=>'<b>IMPORTE</b>'
);//CHEQUE**************/
	
//*****************************************************************************************
//*****************************************************************************************
//*****************************************************************************************

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES
/****************************************************/
$q=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10'");
if($q)
{
	$contador=mysql_num_rows($q);

if($contador>0)
{ 
$suma=0;
$total=0;
 while ($array=mysql_fetch_array($q))
 {
   //$cont++;
$suma = $suma + $array[0];
$total= $total +$array[1];
  //  array_sum($array);
 }
}$arrayp=array('$suma'=>'<b>Importe</b>');
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES DE CONTADO
/****************************************************/
$q1=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CONTADO'");
if($q1)
{
	$contador1=mysql_num_rows($q1);

if($contador1>0)
{ 
$suma1=0;
$total1=0;
 while ($array1=mysql_fetch_array($q1))
 {
   //$cont++;
$suma1 = $suma1 + $array1[0];
$total1= $total1 +$array1[1];
  //  array_sum($array);
 }
}$arrayp=array('$suma'=>'<b>Importe</b>');
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES DE CONTADO FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CREDITO
/****************************************************/
$q2=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CREDITO'");
if($q2)
{
	$contador2=mysql_num_rows($q2);

if($contador2>0)
{ 
$suma2=0;
$total2=0;
 while ($array2=mysql_fetch_array($q2))
 {
   //$cont++;
$suma2 = $suma2 + $array2[0];
$total2= $total2 +$array2[1];
  //  array_sum($array);
 }
}
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES DE CREDITO FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO EFECTIVO
/****************************************************/
$q3=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CONTADO' AND formapago= 'EFECTIVO'");
if($q3)
{
	$contador3=mysql_num_rows($q3);

if($contador3>0)
{ 
$suma3=0;
$total3=0;
 while ($array3=mysql_fetch_array($q3))
 {
   //$cont++;
$suma3 = $suma3 + $array3[0];
$total3= $total3 +$array3[1];
  //  array_sum($array);
 }
}
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES EFECTIVO FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO TARJETA
/****************************************************/
$q4=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CONTADO' AND formapago= 'TARJETA'");
if($q4)
{
	$contador4=mysql_num_rows($q4);

if($contador4>0)
{ 
$suma4=0;
$total4=0;
 while ($array4=mysql_fetch_array($q4))
 {
   //$cont++;
$suma4 = $suma4 + $array4[0];
$total4= $total4 +$array4[1];
  //  array_sum($array);
 }
}
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO TARJETA FIN
/****************************************************/


/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CHEQUE contado
/****************************************************/
$q5=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CONTADO' AND formapago= 'CHEQUE'");
if($q5)
{
	$contador5=mysql_num_rows($q5);

if($contador5>0)
{ 
$suma5=0;
$total5=0;
 while ($array5=mysql_fetch_array($q5))
 {
   //$cont++;
$suma5 = $suma5 + $array5[0];
$total5= $total5 +$array5[1];
  //  array_sum($array);
 }
}
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CHEQUE FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRANSFERENCIA CONTADO
/****************************************************/
$q6=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CONTADO' AND formapago= 'TRANSFERENCIA'");
if($q6)
{
	$contador6=mysql_num_rows($q6);

if($contador6>0)
{ 
$suma6=0;
$total6=0;
 while ($array6=mysql_fetch_array($q6))
 {
   //$cont++;
$suma6 = $suma6 + $array6[0];
$total6= $total6 +$array6[1];
  //  array_sum($array);
 }
}
else{
$suma6=0;
$total6=0;
}}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRANSFERENCIA FIN
/****************************************************/

//CREDITOO**********************************
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO EFECTIVO
/****************************************************/
$q7=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CREDITO' AND formapago= 'EFECTIVO'");
if($q7)
{
	$contador7=mysql_num_rows($q7);

if($contador7>0)
{ 
$suma7=0;
$total7=0;
 while ($array7=mysql_fetch_array($q7))
 {
   //$cont++;
$suma7 = $suma7 + $array7[0];
$total7= $total7 +$array7[1];
  //  array_sum($array);
 }
}
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES EFECTIVO FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO TARJETA
/****************************************************/
$q8=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CREDITO' AND formapago= 'TARJETA'");
if($q8)
{
	$contador8=mysql_num_rows($q8);

if($contador8>0)
{ 
$suma8=0;
$total8=0;
 while ($array8=mysql_fetch_array($q8))
 {
   //$cont++;
$suma8 = $suma8 + $array8[0];
$total8= $total8 +$array8[1];
  //  array_sum($array);
 }
}
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO TARJETA FIN
/****************************************************/


/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CHEQUE contado
/****************************************************/
$q9=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CREDITO' AND formapago= 'CHEQUE'");
if($q9)
{
	$contador9=mysql_num_rows($q9);

if($contador9>0)
{ 
$suma9=0;
$total9=0;
 while ($array9=mysql_fetch_array($q9))
 {
   //$cont++;
$suma9 = $suma9 + $array9[0];
$total9= $total9 +$array9[1];
  //  array_sum($array);
 }
}
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CHEQUE FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRANSFERENCIA CONTADO
/****************************************************/
$q10=mysql_query("select importemn, importe_dls from facturacion where fechafactura='2014-04-10' AND tipopago= 'CREDITO' AND formapago= 'TRANSFERENCIA'");
if($q10)
{
	$contador10=mysql_num_rows($q10);

if($contador10>0)
{ 
$suma10=0;
$total10=0;
 while ($array10=mysql_fetch_array($q10))
 {
   //$cont++;
$suma10 = $suma10 + $array10[0];
$total10= $total10 +$array10[1];
  //  array_sum($array);
 }
}
else{
$suma10=0;
$total10=0;
}}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRANSFERENCIA FIN
/****************************************************/

$options = array(
				'shadeCol'=>array(0.8,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>550);			
			
			
$txttit = "<b>COMERCIALIZADORA DE SUMINISTROS</b>\n";
//$txttit.= "CORTE DEL DIA \n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("");
/*$pdf->ezText("Total MN $".$suma."   Total DLS $".$total,12);
$pdf->ezText("Contado MN $".$suma1."   Contado DLS $".$total1."    Credito MN $".$suma2."   Credito DLS $".$total2,10);
$pdf->ezText("Efectivo MN $".$suma3."   Efectivo DLS $".$total3."    Tarjeta MN $".$suma4."   Tarjeta DLS $".$total4,10);
$pdf->ezText("Cheque MN $".$suma5."   Cheque DLS $".$total5."  Trans MN $".$suma6."   Trans DLS $".$total6,10);
//**CREDITO
$pdf->ezText("Efectivo MN $".$suma7."   Efectivo DLS $".$total7."    Tarjeta MN $".$suma8."   Tarjeta DLS $".$total8,10);
$pdf->ezText("Cheque MN $".$suma9."   Cheque DLS $".$total9."  Trans MN $".$suma10."   Trans DLS $".$total10,10);*/
$pdf -> WriteHTML();//Volcamos el HTML contenido en la variable $html para crear el contenido del PDF



$pdf->ezText("");
$pdf->ezText($txttit2,12);
$pdf->ezTable($data2, $remision, '', $options);
$pdf->ezText("");
$pdf->ezText($txttit3,12);
$pdf->ezTable($data3, $notas, '', $options);
$pdf->ezText("");
$pdf->ezText($txttit1,12);
$pdf->ezTable($data1, $cobranza, '', $options);
$pdf->ezText("");
$pdf->ezText($txttit4,12);
$pdf->ezTable($data4, $cheque, '', $options);
//$pdf->ezText("\n\n\n", 10);


//**********************

//$pdf->ezText($mn,14);

$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("g:i:s A")."\n\n", 10);
$pdf->ezStream();


?>
</body>
</html>