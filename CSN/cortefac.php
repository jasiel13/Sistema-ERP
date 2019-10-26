<?php
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();

include("conexion.php");
$actual=$_POST['fechac'];

$suma=0;
$i=0;
echo $actual;
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../fonts/Helvetica.afm',1);
$pdf->ezStartPageNumbers(440,30,9,'right',date('g:i a').' - Pagina {PAGENUM} de {TOTALPAGENUM}');

$pdf->ezSetCmMargins(1.5,1.5,1.5,1.5);
$queEmp = ( "select factura, cliente, restomn, restodls, tipopago, formapago, estado from facturacion where fechafactura='$actual' AND formapago!='TRASPASO DE FACTURA/ANTICIPO' order by factura");


$resEmp = mysql_query($queEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}

$fnum = $datatmp[2];

$titles = array(      
				'factura'=>'<b>FACTURA</b>',
				'cliente'=>'<b>CLIENTE</b>',
				 'restomn'=>'<b>IMP M.N</b>',
				'restodls'=>'<b>IMP DLS</b>',
				'tipopago'=>'<b>TIPO PAGO</b>',
				'formapago'=>'<b>F.PAGO</b>',
				'estado'=>'<b>ESTADO</b>'
				);//facturas


/******************************************************TOTALES FACTURACION*********************************************/////////////////////
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES DE CONTADO
/****************************************************/

/*$q1=mysql_query("select importemn, importedls from facturacion where tipopago='CONTADO' AND formapago='EFECTIVO' AND fechafactura='$actual' || tipopago='CONTADO' AND formapago='CHEQUE' AND fechafactura='$actual'|| tipopago='CONTADO' AND formapago='TRANSFERENCIA' AND fechafactura='$actual'");
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
}
 else
 {
$suma1=0;
$total1=0;
	 
 }

$smnf1 = number_format($suma1,2);
$dlsf1 = number_format($total1,2);

}*/
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES DE CONTADO FIN
/****************************************************/
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CREDITO
/****************************************************/
$q2=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CREDITO' AND estado!='CANCELADA'");
if($q2)
{
	$contador2=mysql_num_rows($q2);

if($contador2>0)
{ 
$suma2=0;
$total2=0;
 while ($array2=mysql_fetch_array($q2))
 {
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
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/

$qc1fin=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND estado!='CANCELADA' AND formapago!='TRASPASO DE FACTURA/ANTICIPO' ");
if($qc1fin)
{
	$contador2fin=mysql_num_rows($qc1fin);

if($contador2fin>0)
{ 
$suma2fin=0;
$total2fin=0;
 while ($arrayfin=mysql_fetch_array($qc1fin))
 {
$suma2fin = $suma2fin + $arrayfin[0];
$total2fin= $total2fin +$arrayfin[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $suma2fin=0;
	$total2fin=0;
 }
 $smnct1fin = number_format($suma2fin,2);
 $dlsct1fin = number_format($total2fin,2);
}

$qc1fin2=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND estado!='CANCELADA'");
if($qc1fin2)
{
	$contador2fin2=mysql_num_rows($qc1fin2);

if($contador2fin2>0)
{ 
$suma2fin2=0;
$total2fin2=0;
 while ($arrayfin2=mysql_fetch_array($qc1fin2))
 {
$suma2fin2 = $suma2fin2 + $arrayfin2[0];
$total2fin2= $total2fin2 +$arrayfin2[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $suma2fin2=0;
	$total2fin2=0;
 }
 $smnct1fin2 = number_format($suma2fin2,2);
 $dlsct1fin2 = number_format($total2fin2,2);
}


$qc1=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CREDITO' AND estado='' AND formapago='TARJETA' ");
if($qc1)
{
	$contador2ct=mysql_num_rows($qc1);

if($contador2ct>0)
{ 
$suma2ct=0;
$total2ct=0;
 while ($arrayct=mysql_fetch_array($qc1))
 {
$suma2ct = $suma2ct + $arrayct[0];
$total2ct= $total2ct +$arrayct[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $suma2ct=0;
	$total2ct=0;
 }
 $smnct1 = number_format($suma2ct,2);
 $dlsct1 = number_format($total2ct,2);

}
$qc2=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CREDITO' AND estado='' AND formapago='TRANSFERENCIA'");
if($qc2)
{
	$contadorctra=mysql_num_rows($qc2);

if($contadorctra>0)
{ 
$sumactra=0;
$totalctra=0;
 while ($arrayctra=mysql_fetch_array($qc2))
 {
$sumactra = $sumactra + $arrayctra[0];
$totalctra= $totalctra +$arrayctra[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $sumactra=0;
$totalctra=0;
 }
 $smnctra = number_format($sumactra,2);
 $dlsctra = number_format($totalctra,2);

}
$qc3=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CREDITO' AND estado!='cancelada' AND formapago='CHEQUE' ");
if($qc3)
{
	$contadorche=mysql_num_rows($qc3);

if($contadorche>0)
{ 
$sumache=0;
$totalche=0;
 while ($arrayche=mysql_fetch_array($qc3))
 {
$sumache = $sumache + $arrayche[0];
$totalche= $totalche +$arrayche[1];
  //  array_sum($array);
 }
}
 else 
 {
	$sumache=0;
	$totalche=0;
 }
 $smnche = number_format($sumache,2);
 $dlsche = number_format($totalche,2);

}
$qc4=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CREDITO' AND estado!='CANCELADA' AND formapago='EFECTIVO'");
if($qc4)
{
	$contadorefe=mysql_num_rows($qc4);

if($contadorefe>0)
{ 
$sumaefe=0;
$totalefe=0;
 while ($arrayefe=mysql_fetch_array($qc4))
 {
$sumaefe = $sumaefe + $arrayefe[0];
$totalefe= $totalefe +$arrayefe[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $sumaefe=0;
$totalefe=0;
 }
 $smnefe = number_format($sumaefe,2);
 $dlsefe = number_format($totalefe,2);
}

/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES DE CREDITO FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO EFECTIVO
/****************************************************/
$q3=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'EFECTIVO' AND estado!='CANCELADA'");
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
else
{
	$total3=0;
	$suma3=0;
}

 $fsmn = number_format($suma3,2);
 $fdls = number_format($total3,2);

}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES EFECTIVO FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO TARJETA
/****************************************************/
$q4=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'TARJETA' AND
     estado!='CANCELADA'");
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
else
{
	$total4=0;
	$suma4=0;
}
 $fsmn1 = number_format($suma4,2);
 $fdls1 = number_format($total4,2);

}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO TARJETA FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CHEQUE CONTADO
/****************************************************/
$q5=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'CHEQUE' AND estado=''");
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
else
{
	$suma5=0;
	$total5=0;
}
$fsmn2 = number_format($suma5,2);
 $fdls2 = number_format($total5,2);

}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CHEQUE FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRANSFERENCIA CONTADO
/****************************************************/
$q6=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'TRANSFERENCIA' AND estado=''");
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
}
$fsmn3 = number_format($suma6,2);
 $fdls3 = number_format($total6,2);
}
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRANSFERENCIA FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRASPASO DE SALDO CONTADO
/****************************************************/
/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRANSFERENCIA FIN
/****************************************************/
/*total contado facturacion*/
		$suma1=$suma3+$suma4+$suma5+$suma6;
$total1=$total3+$total4+$total5+$total6;
$smnf1=number_format($suma1,2);
$dlsf1=number_format($total1,2);	

//********************************************************************************************************************************************************************************facturas
//********************************************************************************************************************************************************************************facturas
//********************************************************************************************************************************************************************************facturas
//********************************************************************************************************************************************************************************facturas

$queEmp1ta="select factura, cliente, restomn, restodls, tipopago, formapago, aplicacion from facturacion where fechafactura='$actual' AND formapago='TRASPASO DE FACTURA/ANTICIPO' or formapago='TRASPASO DE SALDO/FACTURA CON PUNTO'  order by factura";
$resEmp1ta = mysql_query($queEmp1ta) or die(mysql_error());
$totEmp1ta = mysql_num_rows($resEmp1ta);

$ixx1ta = 0;
while($datatmp1ta = mysql_fetch_assoc($resEmp1ta)) { 
	$ixx1ta = $ixx1ta+1;
	$data1ta[] = array_merge($datatmp1ta, array('num'=>$ixx1ta));
}	
$antita= array(
//'observaciones'=>'<b>OBSERVACIONES</b>',
				'factura'=>'<b>ANTICIPO</b>',
				'cliente'=>'<b>CLIENTE</b>',
				 'restomn'=>'<b>IMP M.N</b>',
				'restodls'=>'<b>IMP DLS</b>',
				'tipopago'=>'<b>TIPO PAGO</b>',
				'formapago'=>'<b>F.PAGO</b>',
				'aplicacion'=>'<b>APLICACION A FACTURA</b>'
);


$q2antitot=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND formapago='TRASPASO DE SALDO/FACTURA CON PUNTO' AND formapago='TRASPASO DE FACTURA/ANTICIPO' AND estado!='CANCELADA' ");
if($q2antitot)
{
	$contadorantitot=mysql_num_rows($q2antitot);

if($contadorantitot>0)
{ 
$sumaantitot=0;
$totalantitot=0;
 while ($arrayantitot=mysql_fetch_array($q2antitot))
 {
$sumaantitot = $sumaantitot + $arrayantitot[0];
$totalantitot= $totalantitot +$arrayantitot[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $sumaantitot=0;
$totalantitot=0;
 }
 $smnfantitot = number_format($sumaantitot,2);
 $dlsfantitot = number_format($totalantitot,2);

}
//***********************************************************************************************************************************************************************************facturas
//********************************************************************************************************************************************************************************facturas
//********************************************************************************************************************************************************************************facturas
//********************************************************************************************************************************************************************************facturas	
/******************************************************COBRANZA*******************************************************************///////////////				
$queEmp1="select facped, cliente, importemn, importedls, formapago, observaciones from cobranza  where fechacobro='$actual'";
$resEmp1 = mysql_query($queEmp1) or die(mysql_error());
$totEmp1 = mysql_num_rows($resEmp1);

$ixx1 = 0;
while($datatmp1 = mysql_fetch_assoc($resEmp1)) { 
	$ixx1 = $ixx1+1;
	$data1[] = array_merge($datatmp1, array('num'=>$ixx1));
}

	
$cobranza= array(
'observaciones'=>'<b>OBSERVACIONES.</b>',
'facped'=>'<b>FACTURA</b>',
'cliente'=>'<b>CLIENTE</b>',
'importemn'=>'<b>MN</b>',
'importedls'=>'<b>DSL</b>',
'formapago'=>'<b>F.PAGO</b>'
);
/***********************************************TOTALES ******************************/////////////////////////
/**********************************efectivo*/
$sqlr=mysql_query("select importemn, importedls from cobranza where formapago='EFECTIVO' AND fechacobro='$actual' AND observaciones!='AJUSTE'");
if ($sqlr)
{
	$cont=mysql_num_rows($sqlr);

if($cont>0)
{
	$smn1=0;
	$tdls1=0;
	while ($arr=mysql_fetch_array($sqlr))
	{
		$smn1=$smn1+$arr[0];
		$tdls1=$tdls1+$arr[1];
	}
	
}
else
{
	$smn1=0;
	$tdls1=0;
}
$smnf4 = number_format($smn1,2);
    $dlsf4 = number_format($tdls1,2);
}
/**************************************efectivo fin*/

/********************************* TARJETA*********////////////
$sqlq=mysql_query("select importemn, importedls from cobranza where formapago='TARJETA' AND fechacobro='$actual' AND observaciones!='AJUSTE'");
if ($sqlq)
{
	$cont=mysql_num_rows($sqlq);

if($cont>0)
{
	$smnct=0;
	$tdlsct=0;
	while ($arr=mysql_fetch_array($sqlq))
	{
		$smnct=$smnct+$arr[0];
		$tdlsct=$tdlsct3+$arr[1];
	}
}
else
{
	$smnct=0;
	$tdlsct=0;
}
$smnct1 = number_format($smnct,2);
$dlsct1 = number_format($tdlsct,2);
}






/**************************************efectivo fin*/

/******************************CHEQUE*/
$sqla=mysql_query("select importemn, importedls from cobranza where formapago='CHEQUE' AND fechacobro='$actual'
	AND observaciones!='AJUSTE'");
if ($sqla)
{
	$cont=mysql_num_rows($sqla);

if($cont>0)
{
	$smn=0;
	$tdls=0;
	while ($arr=mysql_fetch_array($sqla))
	{
		$smn=$smn+$arr[0];
		$tdls=$tdls+$arr[1];
	}
	
}
else
{
	$smn=0;
	$tdls=0;
}
$smnf3 = number_format($smn,2);
    $dlsf3 = number_format($tdls,2);
}
/**********************************CHEQUE FIN*/

/***********************************TRANSFERENFICA*/
$sqlv=mysql_query("select importemn, importedls from cobranza where formapago='TRANSFERENCIA' AND fechacobro='$actual' AND observaciones!='AJUSTE'");
if ($sqlv)
{
	$cont=mysql_num_rows($sqlv);

if($cont>0)
{
	$smn2=0;
	$tdls2=0;
	while ($arr=mysql_fetch_array($sqlv))
	{
		$smn2=$smn2+$arr[0];
		$tdls2=$tdls2+$arr[1];
	}
}
else
{
	$smn2=0;
	$tdls2=0;
}
$smnf5 = number_format($smn2,2);
    $dlsf5 = number_format($tdls2,2);
}
/*********************************TRANFERENCIA FIN*/

/********************TOTALES IMPORTEMNY DLS*/

$sqlz=mysql_query("select importemn, importedls from cobranza where fechacobro='$actual' AND observaciones!='AJUSTE'");
if ($sqlz)
{
	$cont=mysql_num_rows($sqlz);

if($cont>0)
{
	$smn3=0;
	$tdls3=0;
	while ($arr=mysql_fetch_array($sqlz))
	{
		$smn3=$smn3+$arr[0];
		$tdls3=$tdls3+$arr[1];
	}
	}
else
{
	$smn3=0;
	$tdls3=0;
}
	$smn3 = number_format($smn3,2);
    $dlsf6 = number_format($tdls3,2);
}

/********************TOTALES IMPORTEMN Y DLS*/

//FIN  ************************************************************************************

/********************************************************************REMISIONES********************************//////////////////				
$queEmp2="select remision, cliente, importemn, importedls, pedido, descr, tipopago, estado, formapago from remision where fecharem='$actual'";
$resEmp2 = mysql_query($queEmp2) or die(mysql_error());
$totEmp2 = mysql_num_rows($resEmp2);

$ixx2 = 0;
while($datatmp2 = mysql_fetch_assoc($resEmp2)) { 
	$ixx2 = $ixx2+1;
	$data2[] = array_merge($datatmp2, array('num'=>$ixx2));
}

	
$remision= array(
//campo para remisiones
'remision'=>'<b>REMISION</b>',
'cliente'=>'<b>NOMBRE CLIENTE        </b>',
'importemn'=>'<b>IMP MN</b>',
'importedls'=>'<b>IMP DLS</b>',
'tipopago'=>'<b>T.PAGO</b>',
'formapago'=>'<b>F.PAGO</b>',
'estado'=>'<b>ESTADO<b>'
);		
/******************************************************TOTALES REMISIONES******************************//////////////////
/**********************************TOTALES IMPORTE MN E IMPORTE DLS DE CONTADO  REMISIONES*/
$sqld=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CONTADO' AND estado!='CANCELADA' ");
if ($sqld)
{
	$cont=mysql_num_rows($sqld);

if($cont>0)
{
	$smn4=0;
	$tdls4=0;
	while ($arr=mysql_fetch_array($sqld))
	{
		$smn4=$smn4+$arr[0];
		$tdls4=$tdls4+$arr[1];
		
	}
	}
else
{
	$smn4=0;
	$tdls4=0;
}
$mnf = number_format($smn4,2);
	$dlsf = number_format($tdls4,2);

}
/***********************TOTALES DE REMISIONES FIN*/
/**********************************TOTALES IMPORTE MN E IMPORTE DLS DE CREDITO  REMISIONES*/
$sqlt=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CREDITO' AND estado!='CANCELADA'");
if ($sqlt)
{
	$cont=mysql_num_rows($sqlt);

if($cont>0)
{
	$smnc=0;
	$tdlsc=0;
	while ($arr=mysql_fetch_array($sqlt))
	{
		$smnc=$smnc+$arr[0];
		$tdlsc=$tdlsc+$arr[1];
		
	}
	}
else
{
	$smnc=0;
	$tdlsc=0;
}
$mnfc = number_format($smnc,2);
$dlsfc = number_format($tdlsc,2);

}
/***********************TOTALES DE REMISIONES FIN*/

/**********************************TOTALES CONTADO  EFECTIVO remisiones ********/
$sqln=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CONTADO' AND formapago='EFECTIVO' AND estado!='CANCELADA'");
if ($sqln)
{
	$cont=mysql_num_rows($sqln);

if($cont>0)
{
	$rmn=0;
	$rdls=0;
	while ($arr=mysql_fetch_array($sqln))
	{
		$rmn=$rmn+$arr[0];
		$rdls=$rdls+$arr[1];
		
	}
	}
else
{
	$rmn=0;
	$rdls=0;
}
$mnr = number_format($rmn,2);
	$dlsr = number_format($rdls,2);

}
/***********************TOTALES DE REMISIONES  EFECTIVO FIN*/
/**********************************TOTALES CONTADO TARJETA remisiones ********/
$sqlk=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CONTADO' AND formapago='TARJETA' AND estado!='CANCELADA'");
if ($sqlk)
{
	$cont=mysql_num_rows($sqlk);

if($cont>0)
{
	$rmn2=0;
	$rdls2=0;
	while ($arr=mysql_fetch_array($sqlk))
	{
		$rmn2=$rmn2+$arr[0];
		$rdls2=$rdls2+$arr[1];
		
	}
}
else
{
	$rmn2=0;
	$rdls2=0;
}
$mnr2 = number_format($rmn2,2);
$dlsr2 = number_format($rdls2,2);

}
/***********************TOTALES DE REMISIONES TARJETA FIN*/

/**********************************TOTALES CONTADO CHEQUE remisiones ********/
$sqlc=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CONTADO' AND formapago='CHEQUE' AND estado!='CANCELADA'");
if ($sqlc)
{
	$cont=mysql_num_rows($sqlc);

if($cont>0)
{
	$rmn1=0;
	$rdls1=0;
	while ($arr=mysql_fetch_array($sqlc))
	{
		$rmn1=$rmn1+$arr[0];
		$rdls1=$rdls1+$arr[1];
		
	}
}
else
{
	$rmn1=0;
	$rdls1=0;
}
$mnr1 = number_format($rmn1,2);
	$dlsr1 = number_format($rdls1,2);

}
/***********************TOTALES DE REMISIONES FIN*/

/**********************************TOTALES CONTADO TRANSFERENCIA remisiones ********/
$sqlg=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CONTADO' AND formapago='TRANSFERENCIA' AND estado!='CANCELADA'");
if ($sqlg)
{
	$cont=mysql_num_rows($sqlg);

if($cont>0)
{
	$rmn4=0;
	$rdls4=0;
	while ($arr=mysql_fetch_array($sqlg))
	{
		$rmn4=$rmn4+$arr[0];
		$rdls4=$rdls4+$arr[1];
		
	}
}
else
{
	$rmn4=0;
	$rdls4=0;
}
$mnr4f = number_format($rmn4,2);
$dlsr4f = number_format($rdls4,2);

}
/***********************TOTALES DE REMISIONES FIN*/

/**********************************TOTALES CONTADO T SALDO remisiones ********/
$sqlx=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CONTADO' AND formapago='TRASPSALDO' AND estado!='CANCELADA'");
if ($sqlx)
{
	$cont=mysql_num_rows($sqlx);
if($cont>0)
{
	$rmn3=0;
	$rdls3=0;
	while ($arr=mysql_fetch_array($sqlx))
	{
		$rmn3=$rmn3+$arr[0];
		$rdls3=$rdls3+$arr[1];
		
	}
	}
else
{
	$rmn3=0;
	$rdls3=0;
}
$mnr3 = number_format($rmn3,2);
$dlsr3 = number_format($rdls3,2);
}
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*/
/***********************TOTALES DE REMISIONES TARJETA FIN*/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/**********************************TOTALES CONTADO CHEQUE remisiones ********/
/**********************************TOTALES CONTADO  EFECTIVO remisiones ********/
$sqlcr1=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CREDITO' AND formapago='EFECTIVO' AND estado!='CANCELADA'");
if ($sqlcr1)
{
	$contcr1=mysql_num_rows($sqlcr1);
	if($cont>0)
	{
		$rmncr1=0;
		$rdlscr1=0;
		while ($arrcr1=mysql_fetch_array($sqlcr1))
		{
			$rmncr1=$rmncr1+$arrcr1[0];
			$rdlscr1=$rdlscr1+$arrcr1[1];
		}
	}
	else
	{
		$rmncr1=0;
		$rdlscr1=0;
	}
	$mnrcr1 = number_format($rmncr1,2);
	$dlsrcr1 = number_format($rdlscr1,2);
}
/***********************TOTALES DE REMISIONES  EFECTIVO FIN*/
/**********************************TOTALES CONTADO TARJETA remisiones ********/
$sqlcr2=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CREDITO' AND formapago='TARJETA' AND estado!='CANCELADA'");
if ($sqlcr2)
{
	$contcr2=mysql_num_rows($sqlcr2);

if($contcr2>0)
{
	$rmncr2=0;
	$rdlscr2=0;
	while ($arrcr2=mysql_fetch_array($sqlcr2))
	{
		$rmncr2=$rmncr2+$arrcr2[0];
		$rdlscr2=$rdlscr2+$arrcr2[1];
	}
}
else
{
	$rmncr2=0;
	$rdlscr2=0;
}
$mnrcr2 = number_format($rmncr2,2);
$dlsrcr2 = number_format($rdlscr2,2);

}

$sqlcr3=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CREDITO' AND formapago='CHEQUE' AND estado!='CANCELADA'");
if ($sqlcr3)
{
	$contcr3=mysql_num_rows($sqlcr3);

if($contcr3>0)
{
	$rmncr3=0;
	$rdlscr3=0;
	while ($arrcr3=mysql_fetch_array($sqlcr3))
	{
		$rmncr3=$rmncr3+$arrcr3[0];
		$rdlscr3=$rdlscr3+$arrcr3[1];
	}
}
else
{
	$rmncr3=0;
	$rdlscr3=0;
}
	$mnrcr3 = number_format($rmncr3,2);
	$dlsrcr3 = number_format($rdlscr3,2);
}
/***********************TOTALES DE REMISIONES FIN*/

/**********************************TOTALES CONTADO TRANSFERENCIA remisiones ********/
$sqlcr4=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CREDITO' AND formapago='TRANSFERENCIA' AND estado!='CANCELADA'");
if ($sqlcr4)
{
	$contcr4=mysql_num_rows($sqlcr4);

if($contcr4>0)
{
	$rmncr4=0;
	$rdlscr4=0;
	while ($arrcr4=mysql_fetch_array($sqlcr4))
	{
		$rmncr4=$rmncr4+$arrcr4[0];
		$rdlscr4=$rdlscr4+$arrcr4[1];
		
	}
}
else
{
	$rmncr4=0;
	$rdlscr4=0;
}
$mnrcr4 = number_format($rmncr4,2);
$dlsrcr4 = number_format($rdlscr4,2);

}
/***********************TOTALES DE REMISIONES FIN*/

/**********************************TOTALES CONTADO T SALDO remisiones ********/
$sqlcr5=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CREDITO' AND formapago='TRASPSALDO' AND estado!='CANCELADA' ");
if ($sqlcr5)
{
	$contcr5=mysql_num_rows($sqlcr5);
if($contcr5>0)
{
	$rmncr5=0;
	$rdlscr5=0;
	while ($arrcr5=mysql_fetch_array($sqlcr5))
	{
		$rmncr5=$rmncr5+$arrcr5[0];
		$rdlscr5=$rdlscr5+$arrcr5[1];
		
	}
	}
else
{
	$rmncr5=0;
	$rdlscr5=0;
}
$mnrcr5 = number_format($rmncr5,2);
$dlsrcr5 = number_format($rdlscr5,2);
}
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************TOTALES DE REMISIONES  TRANSFERENCIA FIN*************************************************************************************************/
/***********************************************FIN REMISIONES*****************************************/////////////////////

$queEmp3="select nota, cliente, importemn, importedls, factura, descri, estado  from notacredito  where fechanota='$actual'";
$resEmp3 = mysql_query($queEmp3) or die(mysql_error());
$totEmp3 = mysql_num_rows($resEmp3);

$ixx3 = 0;
while($datatmp3 = mysql_fetch_assoc($resEmp3)) { 
	$ixx3 = $ixx3+1;
	$data3[] = array_merge($datatmp3, array('num'=>$ixx3));
}

	
$notas= array(
'nota'=>'<b>NOTA</b>',
'cliente'=>'<b>      NOMBRE CLIENTE      </b>',
'importemn'=>'<b>IMP MN</b>',
'importedls'=>'<b> DLS</b>',
'factura'=>'<b>FACTURA</b>',
'estado'=>'<b>ESTADO<b>'

);//NOTAS DE CREDITO**************/	
$qc5=mysql_query("select importemn, importedls from cheque  where estado=''");
if($qc5)
{
	$contadortche=mysql_num_rows($qc5);

if($contadortche>0)
{ 
$sumatche=0;
$totaltche=0;
 while ($arraytche=mysql_fetch_array($qc5))
 {
$sumatche = $sumatche + $arraytche[0];
$totaltche= $totaltche +$arraytche[1];
  //  array_sum($array);
 }
}
 else 
 {
	 $sumatche=0;
$totaltche=0;
 }
 $smntche = number_format($sumatche,2);
 $dlstche = number_format($totaltche,2);
}

//**********************************************************************************************************************************************************************************************
//**********************************************************************************************************************************************************************************************
//************************************************************************|ACTUALIZACION 2017|********************************************************************************************************
//**********************************************************************************************************************************************************************************************
//**********************************************************************************************************************************************************************************************
$q12=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'TRASPASO DE SALDO/FACTURA CON PUNTO' AND estado!='CANCELADA'");
if($q12)
{
	$contador12=mysql_num_rows($q12);

if($contador12>0)
{ 
$suma12=0;
$total12=0;
 while ($array12=mysql_fetch_array($q12))
 {
   //$cont++;
$suma12 = $suma12 + $array12[0];
$total12= $total12 +$array12[1];
  //  array_sum($array);
 }
}
else{
$suma12=0;
$total12=0;
}
 $fsmn5 = number_format($suma12,2);
 $fdls5 = number_format($total12,2);
}


$q11=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'TRASPASO DE FACTURA/ANTICIPO' AND estado!='CANCELADA'");
if($q11)
{
	$contador11=mysql_num_rows($q11);

if($contador11>0)
{ 
$suma11=0;
$total11=0;
 while ($array11=mysql_fetch_array($q11))
 {
   //$cont++;
$suma11 = $suma11 + $array11[0];
$total11= $total11 +$array11[1];
  //  array_sum($array);
 }
}
else{
$suma11=0;
$total11=0;
}
$fsmn4 = number_format($suma11,2);
 $fdls4 = number_format($total11,2);
}

/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/
/*****************************************************************************************************************************************************************************************/	
$mnota=$mnota+$datatmp3[2];
$mnnota = number_format($mnota,2);

$mnotad=$mnotad+$datatmp3[3];
$mnnotad = number_format($mnotad,2);

$queEmp4="select nocheque,fechaexp, banco, cliente, fechacobro, importemn, importedls from cheque  where estado=''";
$resEmp4 = mysql_query($queEmp4) or die(mysql_error());
$totEmp4 = mysql_num_rows($resEmp4);

$ixx4 = 0;
while($datatmp4 = mysql_fetch_assoc($resEmp4)) { 
	$ixx4 = $ixx4+1;
	$data4[] = array_merge($datatmp4, array('num'=>$ixx4));
}

	
$cheque= array(
'nocheque'=>'<b>CHEQUE</b>',
'fechaexp'=>'<b>FECHA EXP</b>',
'banco'=>'<b>BANCO</b>',
'cliente'=>'<b>CLIENTE</b>',
'fechacobro'=>'<b>F. COBRO</b>',
'importemn'=>'<b>IMPORTE MN</b>',
'importedls'=>'<b>IMPORTE DLS</b>'
);
/***************************************************************** FIN NOTAS DE CREDITO********************************************///////////////////

/*************************************************TOTALES GENERALES DESGLOSADOS**************************/////////////////////
$tefe=0;
$tdol=0;

/******************************************************************

/********************************************TERMINA TOTALES GENERALES*********************************************/////////////////
$tefe=$suma3+$rmn;//efectivo mn
$totale=number_format($tefe,2);
$tdol=$total3+$rdls;//efectivo dls
$totald=number_format($tdol,2);
$tcheque=$suma5+$rmn1;//cheque mn
$chequet=number_format($tcheque,2);
$dcheque=$total5+$rdls1;//cheque dls
$chequedl=number_format($dcheque,2);
$tar=$suma4+$rmn2;//tarjeta mn
$tarf=number_format($tar,2);
$tardl=$total4+$rdls2;//tarjeta dls
$tdlf=number_format($tardl,2);
$transmn=$suma6+$rmn4;//transf mn
$ftran=number_format($transmn,2);
$trandl=$total6+$rdls4;//transf dls
$ftrans=number_format($trandl,2);/// imprimir

//al momento de poner cancelada no se suma en los totales 2019 JB
$quenot=mysql_query("select nota, cliente, importemn, importedls, factura, descri, estado  from notacredito  where fechanota='$actual' and estado!='CANCELADA'");
if($quenot)
{
	$contadornot=mysql_num_rows($quenot);

	if($contadornot>0)
	{	 
		$sumanotmn=0;
		$sumanotdls=0;
    	while ($notarr=mysql_fetch_array($quenot))
 		{
    	//$cont++;
			$sumanotmn = $sumanotmn + $notarr[2];
			$sumanotdls= $sumanotdls +$notarr[3];
    	//array_sum($array);
 		}
	}
	else
	{
		$sumanotmn=0;
		$sumanotdls=0;
	}
	
	$snot1 = number_format($sumanotmn,2);
 	$snotdls1 = number_format($sumanotdls,2);
}

$totalg=$suma1+$smn4+$suma11;//total general contado
$tgral=number_format($totalg,2);


$totaldl=$total1+$tdls4+$total11;//total general contado dls
$dltotal=number_format($totaldl,2);

$totalmncr=$suma2+$smnc;//total general credito
$dltotalmncr=number_format($totalmncr,2);

$totaldlcr=$total2+$tdlsc;//total general credito dls
$dltotalcr=number_format($totaldlcr,2);
//*****************************************************************************total general contado
$totalimxn=$suma1+$smn4+$smn3;
$totalimxn=number_format($totalimxn,2);
//*****************************************************************************total general CREDITO
$totalimxncred=$suma2+$smnc+$sumanotmn;
$totalimxncred=number_format($totalimxncred,2);
//*****************************************************************************total general CONTADO DLS
$totalimxncdls=$total1+$tdls4+$tdls3;
$totalimxncdls=number_format($totalimxncdls,2);
//*****************************************************************************total general CREDITO DLS
$totalimxncrdls=$total2+$tdlsc+$sumanotdls+$totaltche;
$totalimxncrdls=number_format($totalimxncrdls,2);
/******************************************************************TOT GENERAL POR FORMA DE PAGO MXN*****************************************************************************************/	
$totrmnefe=$sumaefe+$rmncr1;
$totrmnefe=number_format($totrmnefe,2);
/*************************************************************************************************************************************************************************************/	
$totrmnche=$sumache+$rmncr3;
$totrmnche=number_format($totrmnche,2);
/*************************************************************************************************************************************************************************************/	
$totrmntar=$suma2ct+$rmncr2;
$totrmntar=number_format($totrmntar,2);
/*************************************************************************************************************************************************************************************/	
$totrmntr=$sumactra+$rmncr4;
$totrmntr=number_format($totrmntr,2);
/*************************************************************************************************************************************************************************************/	
/******************************************************************TOT GENERAL POR FORMA DE PAGO DLS*****************************************************************************************/	
$totrdlsefe=0.00;
$totrdlsefe=$totalefe+$rdlscr1;
$totrdlsefe=number_format($totrdlsefe,2);
/*************************************************************************************************************************************************************************************/	
$totrdlsche=0.00;
$totrdlsche=$totalche+$rdlscr3;
$totrdlsche=number_format($totrdlsche,2);
/*************************************************************************************************************************************************************************************/	
$totrdlstar=0.00;
$totrdlstar=$total2ct+$rdlscr2;
$totrdlstar=number_format($totrdlstar,2);
/*************************************************************************************************************************************************************************************/	
$totrdlstr=0.00;
$totrdlstr=$totalctra+$rdlscr4;
$totrdlstr=number_format($totrdlstr,2);
/*************************************************************************************************************************************************************************************/	
$options = array(
				'shadeCol'=>array(0.8,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>550,
				'fontSize'=>7);

	$txttit = "<b>COMERCIALIZADORA DE SUMINISTROS DEL NORTE S.A DE C.V</b>\n<b>CORTE DEL DIA $actual</b>";


$pdf->ezText($txttit, 10);
if ($data!='')
{
$pdf->ezTable($data, $titles, 'FACTURAS', $options, array('justification'=>'right'));
$pdf->ezText("");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO    			  ------CONTADO MN-------------------CONTADO DLS--------------CREDITO MN-------------------CREDITO DLS",9);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                    $".$fsmn."                                         ".$fdls." DLS"."                                      ".$smnefe."                                   ".$dlsefe." DLS"." ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                     $".$fsmn1."                                      ".$fdls1." DLS"."                                      ".$smnct1."                                    ".$dlsct1." DLS"." ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                      $".$fsmn2."                                      ".$fdls2." DLS"."                                    ".$smnche."                                      ".$dlsche." DLS"." ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF"."                      $".$fsmn3."                                       ".$fdls3." DLS"."                                    ".$smnctra."                                    ".$dlsctra." DLS"." ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("T.SALDO-PUNTO"."            $".$fsmn5."                               ".$fdls5." DLS",9); 
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Contado MN $".$smnf1."           Contado DLS $".$dlsf1."           Credito MN $".$smnf2."           Credito DLS $".$dlsf2,9);
$pdf->ezText("Total MN $".$smnct1fin."           Total DLS $".$dlsct1fin,9);
}

if ($data1ta!='')
{
$pdf->ezTable($data1ta, $antita, 'APLICACION DE ANTICIPOS', $options);
$pdf->ezText("");
$pdf->ezText("TOTAL (aplicacion de anticipos)");
$pdf->ezText("Total MN $".$fsmn4."           Total DLS $".$fdls4,9);
}
if ($data3!='')
{
$pdf->ezTable($data3, $notas, 'NOTAS DE CREDITO', $options);
$pdf->ezText("");
$pdf->ezText("TOTAl (notas de credito)");
$pdf->ezText("Total MN $".$snot1."           Total DLS $".$snotdls1."",9);
}
if ($data2!='')
{
$pdf->ezText("");
$pdf->ezTable($data2, $remision, 'REMISIONES', $options);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO    --------CONTADO MN-------------------CONTADO DLS--------------------CREDITO MN------------CREDITO DLS  ",9);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."           $".$mnr."                                                   ".$dlsr." DLS"."                                         ".$mnrcr1."                             ".$dlsrcr1." DLS"."    ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."            $".$mnr2."                                                     ".$dlsr2." DLS"."                                     ".$mnrcr2."                             ".$dlsrcr2." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."            $".$mnr1."                                                  ".$dlsr1." DLS"."                                         ".$mnrcr3."                             ".$dlsrcr3." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF"."            $".$mnr4f."                                                  ".$dlsr4f." DLS"."                                        ".$mnrcr4."                             ".$dlsrcr4." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("T.SALDO"."            $".$mnr3."                                                       ".$dlsr3." DLS"."                                    ".$mnrcr5."                             ".$dlsrcr5." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);

$pdf->ezText("Contado MN $".$mnf."           Contado DLS ".$dlsf."             Credito MN $".$mnfc."      Credito DLS ".$dlsfc,9);
$pdf->ezText("");
$pdf->ezText("");

$pdf->ezText("TOTAL DE VENTAS (Fac + Rem + anticipos - Nc)");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO   --------CONTADO MN-------------------CONTADO DLS--------------------CREDITO MN------------CREDITO DLS  ",9);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO                     $".$totale."                                        ".$totald."DLS"."                                        ".$totrmnefe."                            ".$totrdlsefe."DLS"  ,8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("CHEQUE                     $".$chequet."                                        ".$chequedl."DLS"."                                        ".$totrmnche."                            ".$totrdlsche."DLS" ,8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("TARJETA                     $".$tarf."                                        ".$tdlf."DLS"."                                           ".$totrmntar."                              ".$totrdlstar."DLS"  ,8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("TRANSF.                     $".$ftran."                                        ".$ftrans."DLS"."                                        ".$totrmntr."                               ".$totrdlstr."DLS"   ,8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("Contado MN $".$tgral."           Contado DLS $".$dltotal."           Credito MN $".$dltotalmncr."           Credito DLS $".$dltotalcr."",9);
}
if ($data1!='')
{
$pdf->ezText("");
$pdf->ezTable($data1, $cobranza, 'COBRANZA', $options);
$pdf->ezText("");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("    F.PAGO          	        --------          MN        ------------------                  DLS",8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                              $".$smnf4."                                                        ".$dlsf4." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                                $".$smnct1."                                                       ".$dlsct1." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                              $".$smnf3."                                                      ".$dlsf3." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF"."                                   $".$smnf5."                                                           ".$dlsf5." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Total MN $".$smn3."           Total DLS $".$dlsf6."",9);
}
$pdf->ezText("");
$pdf->ezText("___________________________________________________________________________________________");
$pdf->ezText("|                                                                                 TOTAL GENERAL                                                                       ");
$pdf->ezText("|                                                                                                                                                                                      ");
$pdf->ezText("|CONTADO MN $".$totalimxn."         CONTADO DLS $".$totalimxncdls."         CREDITO MN $".$totalimxncred."         CREDITO DLS $".$totalimxncrdls."",9);
$pdf->ezText("|___________________________________________________________________________________________");
$pdf->ezText("");
$pdf->ezText("");
$pdf->ezTable($data4, $cheque, 'CHEQUES POSFECHADOS', $options);
$pdf->ezText("");
if($data=='' && $data1=='' && $data2=='')
{
	$pdf->ezText("NO EXISTEN REGISTROS");
}
else{
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  TOTAL      ----- MN------------------------   DLS",9);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("                        Credito MN $".$smntche."           Credito DLS $".$dlstche."",9);
}

$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10,$op);
$pdf->ezText("<b>Hora:</b> ".date("g:i:s A")."\n\n", 10);
$pdf->ezStream();
$fichero = fopen('prueba.pdf','wb');
fwrite ($fichero, $documento_pdf);
fclose ($fichero);