<?php

session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}


date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();

include("conexion.php");
$actual=$_POST['fechac'];
$date = new DateTime($actual);
$date=$date->format('Y-m-d');

$suma=0;
$i=0;
echo $date;
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../fonts/Helvetica.afm',1);
$pdf->ezSetCmMargins(1.5,1.5,1.5,1.5);

//facturas
$queEmp = ( "select factura, cliente, importemn, importedls, tipopago, formapago, estado from consorciofac where fechafactura='$date'");


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
				'importedls'=>'<b>IMP DLS</b>',
				'tipopago'=>'<b>TIPO PAGO</b>',
				'formapago'=>'<b>F.PAGO</b>',
				'estado'=>'<b>ESTADO</b>'
				);
				
/********************************TOTALES DE FACTURAS****************************/
$q=mysql_query ("select importemn, importedls from consorciofac where fechafactura='$date' AND tipopago='CONTADO' AND formapago='EFECTIVO'");
if($q)
{
	$c=mysql_num_rows($q);

if($c>0)
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
}
 else 
 {
	 $suma=0;
$total=0;
 }
 $smnf = number_format($suma,2);
 $dlsf = number_format($total,2);

}
/*****************************************CHEQUE*******************************/
$q1=mysql_query ("select importemn, importedls from consorciofac where fechafactura='$date' AND tipopago='CONTADO' AND formapago='CHEQUE'");
if($q1)
{
	$c1=mysql_num_rows($q1);

if($c1>0)
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
}
 else 
 {
	 $suma1=0;
$total1=0;
 }
 $smnf1 = number_format($suma1,2);
 $dlsf1 = number_format($total1,2);

}

/**************************************TERJETA*****************************/
$q2=mysql_query ("select importemn, importedls from consorciofac where fechafactura='$date' AND tipopago='CONTADO' AND formapago='TARJETA'");
if($q2)
{
	$c2=mysql_num_rows($q2);

if($c2>0)
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
 else 
 {
	 $suma2=0;
$total2=0;
 }
 $smnf2 = number_format($suma2,2);
 $dlsf2 = number_format($total2,2);

}

/*************************************TRANSFERENCIA***************************/
$q3=mysql_query ("select importemn, importedls from consorciofac where fechafactura='$date' AND tipopago='CONTADO' AND formapago='TRANSFERENCIA'");
if($q3)
{
	$c3=mysql_num_rows($q3);

if($c3>0)
{ 
$suma3=0;
$total3=0;
 while ($array3=mysql_fetch_array($q3))
 {
   //$cont++;
$suma3 = $suma3 + $array3[0];
$total3= $total3 +$array[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $suma3=0;
$total3=0;
 }
 $smnf3 = number_format($suma3,2);
 $dlsf3 = number_format($total3,2);

}
/************************************CREDITO***********************************/
$q4=mysql_query ("select importemn, importedls from consorciofac where fechafactura='$date' AND tipopago='CREDITO'");
if($q4)
{
	$c4=mysql_num_rows($q4);

if($c4>0)
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
 else 
 {
	 $suma4=0;
$total4=0;
 }
 $smnf4 = number_format($suma4,2);
 $dlsf4 = number_format($total4,2);

}
/*******************************TOTAL CONTADO*****//////////
$tcmn=$suma+$suma1+$suma2+$suma3;//TOTALES contado mn
$ftcmn=number_format($tcmn,2);
$tcdl=$total+$total1+$total2+$total3;
$ftcdl=number_format($tcdl,2);


/********************************* FIN TOTALES*************************************/				
				
/*************************************************************COBRANZA****************////
$queEmp1 = ( "select factura, cliente, importemn, importedls, formapago, observaciones from consorciocob where fechacobro='$date'");


$resEmp1 = mysql_query($queEmp1) or die(mysql_error());
$totEmp1 = mysql_num_rows($resEmp1);

$ixx1 = 0;
while($datatmp1 = mysql_fetch_assoc($resEmp1)) { 
	$ixx1 = $ixx1+1;
	$data1[] = array_merge($datatmp1, array('num'=>$ixx1));
}
$titles1 = array(
				'factura'=>'<b>FACTURA</b>',
				'cliente'=>'<b>CLIENTE</b>',
				'importemn'=>'<b>IMP M.N</b>',
				'importedls'=>'<b>IMP DLS</b>',
				'formapago'=>'<b>F.PAGO</b>',
				'observaciones'=>'<b>OBSERVACIONES</b>'
				
				);
/********************************TOTALES DE COBRANZA****************************/
//total total
$Q0=mysql_query ("select importemn, importedls from consorciocob where fechacobro='$date'");
if($Q0)
{
	$con0=mysql_num_rows($Q0);

if($con0>0)
{ 
$su0=0;
$to0=0;
 while ($arr0=mysql_fetch_array($Q0))
 {
   //$cont++;
$su0= $su0 + $arr0[0];
$to0= $to0 +$arr0[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $su0=0;
$to0=0;
 }
 $mn0 = number_format($su0,2);
 $dl0 = number_format($to0,2);

}

/*******************************EFECTIVO***********************************/
$Q=mysql_query ("select importemn, importedls from consorciocob where fechacobro='$date' AND formapago='EFECTIVO'");
if($Q)
{
	$con=mysql_num_rows($Q);

if($con>0)
{ 
$su=0;
$to=0;
 while ($arr=mysql_fetch_array($Q))
 {
   //$cont++;
$su = $su + $arr[0];
$to= $to +$arr[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $su=0;
$to=0;
 }
 $mn = number_format($su,2);
 $dl = number_format($to,2);

}

/***********************************TARJETA**********************************/				
$Q1=mysql_query ("select importemn, importedls from consorciocob where fechacobro='$date' AND formapago='TARJETA'");
if($Q1)
{
	$con1=mysql_num_rows($Q1);

if($con1>0)
{ 
$su1=0;
$to1=0;
 while ($arr1=mysql_fetch_array($Q1))
 {
   //$cont++;
$su1 = $su1 + $arr1[0];
$to1= $to1 +$arr1[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $su1=0;
$to1=0;
 }
 $mn1 = number_format($su1,2);
 $dl1 = number_format($to1,2);

}
/***********************************CHEQUE*******************************/
$Q2=mysql_query ("select importemn, importedls from consorciocob where fechacobro='$date' AND formapago='CHEQUE'");
if($Q2)
{
	$con2=mysql_num_rows($Q2);

if($con2>0)
{ 
$su2=0;
$to2=0;
 while ($arr2=mysql_fetch_array($Q2))
 {
   //$cont++;
$su2 = $su2 + $arr2[0];
$to2= $to2 +$arr2[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $su2=0;
$to2=0;
 }
 $mn2 = number_format($su2,2);
 $dl2 = number_format($to2,2);

}
/************************************TRANSDERENCIA*******************/
$Q3=mysql_query ("select importemn, importedls from consorciocob where fechacobro='$date' AND formapago='TRANSFERENCIA'");
if($Q3)
{
	$con3=mysql_num_rows($Q3);

if($con3>0)
{ 
$su3=0;
$to3=0;
 while ($arr2=mysql_fetch_array($Q3))
 {
   //$cont++;
$su3 = $su3 + $arr3[0];
$to3= $to3 +$arr3[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $su3=0;
$to3=0;
 }
 $mn3 = number_format($su3,2);
 $dl3 = number_format($to3,2);

}

/**************************************/
//notas de credito*
$queEmp3="select nc, cliente, importemn, importedls, factura, descr, estado  from nccta  where fecha='$date'";
$resEmp3 = mysql_query($queEmp3) or die(mysql_error());
$totEmp3 = mysql_num_rows($resEmp3);

$ixx3 = 0;
while($datatmp3 = mysql_fetch_assoc($resEmp3)) { 
	$ixx3 = $ixx3+1;
	$data3[] = array_merge($datatmp3, array('num'=>$ixx3));
}

	
$notas= array(
'nc'=>'<b>NOTA</b>',
'cliente'=>'<b>      NOMBRE CLIENTE      </b>',
'importemn'=>'<b>IMP MN</b>',
'importedls'=>'<b> DLS</b>',
'factura'=>'<b>FACTURA</b>',
'estado'=>'<b>ESTADO</b>'

);
/*****************************************
/**************************************FIN TOTALES COBRANZA********************/	
/******************************TOTALES GENERALES*********************************/
/******pesos*/
$tefe=$suma+$su;
$ftefe=number_format($tefe,2);
$ttar=$suma2+$su2;
$fttar=number_format($ttar,2);
$tche=$suma1+$su1;
$ftche=number_format($tche,2);
$ttra=$suma3+$su3;
$ftra=number_format($ttra,2);

/******************dolares*/
$tdefe=$total+$to;
$tdtar=$total1+$to1;
$tdche=$total2+$to2;
$tdtra=$total3+$to3;

$ftdefe=number_format($tdefe,2);
$ftdtar=number_format($tdtar,2);
$ftdche=number_format($tdche,2);
$ftdtra=number_format($tdtra,2);

/*******************
Total general dolares y pesos
/******************************/
$totalg=$tefe+$ttar+$tche+$ttra;
$ftg=number_format($totalg,2);
$totalgd=$tdefe+$tdtar+$tdche+$tdtra;
$ftd=number_format($totalgd,2);
/**********************************FIN TOTALES GENERALES*************************/			
				$options = array(
				'shadeCol'=>array(0.8,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>580,
				'fontsize'=>6);			
	$txttit = "<b>CONSORCIO TECNOAMBIENTAL S.A DE C.V</b>\n<b>CORTE DEL DIA $date</b>";

$pdf->ezText($txttit, 10);
if ($data!='')
{
$pdf->ezTable($data, $titles, 'FACTURAS', $options);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO    			    --------CONTADO MN-------------------CONTADO DLS",10);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                    $".$smnf."                                    ".$dlsf." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                    $".$smnf1."                                    ".$dlsf1." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                    $".$smnf2."                                    ".$dlsf2." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF."."                    $".$smnf3."                                    ".$dlsf3." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Contado MN $".$ftcmn."           Contado DLS $".$ftcdl."           Credito MN $".$smnf4."           Credito DLS $".$dlsf4,10);
}
$pdf->ezText("");
if ($data1!='')
{
$pdf->ezTable($data1, $titles1, 'COBRANZA', $options);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO    			    --------CONTADO MN-------------------CONTADO DLS",10);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                    $".$mn."                                    ".$dl." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                    $".$mn1."                                    ".$dl1." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                    $".$mn2."                                    ".$dl2." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF."."                    $".$mn3."                                    ".$dl3." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Contado MN $".$mn0."           Contado DLS $".$dl0);
}
$pdf->ezText("");
if ($data=='' && $data1=='')
{
	$pdf->ezText("NO HAY REGISTROS DEL DIA");
}
else
{
$pdf->ezText("TOTALES GENERALES");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO    			    --------CONTADO MN-------------------CONTADO DLS",10);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                    $".$ftefe."                                    ".$ftdefe." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                    $".$ftche."                                    ".$ftdche." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                    $".$fttar."                                    ".$ftdtar." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF."."                    $".$ftra."                                    ".$ftdtra." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Contado MN $".$ftg."           Contado DLS $".$ftd);
}
$pdf->ezText("");
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10,$op);
$pdf->ezText("<b>Hora:</b> ".date("g:i:s A")."\n\n", 10);
$pdf->ezStream();


if ($data3!='')
{
$pdf->ezTable($data3, $notas, 'NOTAS DE CREDITO', $options);
}
if($data=='' && $data1=='')
{
	$pdf->ezText("NO HAY REGISTROS DEL DIA");
}
else
{
$pdf->ezText("");
$pdf->ezText("NOTAS DE CREDITO");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO    			    --------CONTADO MN-------------------CONTADO DLS",10);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                    $".$ftefe."                                    ".$ftdefe." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                    $".$ftche."                                    ".$ftdche." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                    $".$fttar."                                    ".$ftdtar." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF."."                    $".$ftra."                                    ".$ftdtra." DLS"."   ",9);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Contado MN $".$ftg."           Contado DLS $".$ftd);
}
$pdf->ezText("");
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10,$op);
$pdf->ezText("<b>Hora:</b> ".date("g:i:s A")."\n\n", 10);
$pdf->ezStream();