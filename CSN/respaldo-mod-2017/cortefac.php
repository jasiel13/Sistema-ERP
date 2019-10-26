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
$pdf->ezSetCmMargins(1.5,1.5,1.5,1.5);

//facturas
$queEmp = ( "select factura, cliente, restomn, restodls, tipopago, formapago, estado from facturacion where fechafactura='$actual' order by factura");


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
$q2=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CREDITO' AND estado!='CANCELADA' ");
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

$totfac=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND estado!='CANCELADA' ");
if($totfac)
{
	$totf=mysql_num_rows($totfac);

	if($totf>0)
	{ 
		$sumatot=0;
		$totaltot=0;
	 	while ($arraytot=mysql_fetch_array($totfac))
	 	{
			$sumatot = $sumatot + $arraytot[0];
			$totaltot= $totaltot +$arraytot[1];
	 	}
	}
	else 
	{
	    $sumatot=0;
		$totaltot=0;
	}

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$totrem=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND estado!='CANCELADA' ");
if($totrem)
{
	$totr=mysql_num_rows($totrem);

	if($totr>0)
	{ 
		$sumatotr=0;
		$totaltotr=0;
	 	while ($arraytotr=mysql_fetch_array($totrem))
	 	{
			$sumatotr = $sumatotr + $arraytotr[0];
			$totaltotr= $totaltotr +$arraytotr[1];
	 	}
	}
	else 
	{
	    $sumatotr=0;
		$totaltotr=0;
	}


}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES DE CREDITO FIN
/****************************************************/

/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES CONTADO EFECTIVO
/****************************************************/
$q3=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago='CONTADO' AND formapago='EFECTIVO' AND estado!='CANCELADA' ");
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
$q5=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'CHEQUE' AND estado!='CANCELADA'");
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
$q6=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'TRANSFERENCIA' AND estado!='CANCELADA'");
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


/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRASPASO DE SALDO/FACTURA CON PUNTO CONTADO
/****************************************************/
$q12=mysql_query("select restomn, restodls from facturacion where fechafactura='$actual' AND tipopago= 'CONTADO' AND formapago= 'TRASPASO DE SALDO/FACTURA CON PUNTO' AND estado!='CANCELADA'");
if($q11)
{
	$contador12=mysql_num_rows($q11);

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
/****************************************************/


/****************************************************/
//CONSULTA PARA TOTALES DE PESOS Y DOLARES TRANSFERENCIA FIN
/****************************************************/
/*total contado facturacion*/
		$suma1=$suma3+$suma4+$suma5+$suma6;
$total1=$total3+$total4+$total5+$total6;
$smnf1=number_format($suma1,2);
$dlsf1=number_format($total1,2);		
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
//'observaciones'=>'<b>OBSERVACIONES</b>',
'facped'=>'<b>FACTURA</b>',
'cliente'=>'<b>CLIENTE</b>',
'importemn'=>'<b>MN</b>',
'importedls'=>'<b>DSL</b>',
'formapago'=>'<b>F.PAGO</b>'
);
/***********************************************TOTALES ******************************/////////////////////////
/**********************************efectivo*/
$sqlr=mysql_query("select importemn, importedls from cobranza where formapago='EFECTIVO' AND fechacobro='$actual'");
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
$sqlq=mysql_query("select importemn, importedls from cobranza where formapago='TARJETA' AND fechacobro='$actual'  ");
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
$sqla=mysql_query("select importemn, importedls from cobranza where formapago='CHEQUE' AND fechacobro='$actual'");
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
$sqlv=mysql_query("select importemn, importedls from cobranza where formapago='TRANSFERENCIA' AND fechacobro='$actual'");
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

$sqlz=mysql_query("select importemn, importedls from cobranza where fechacobro='$actual'");
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
$smnf6 = number_format($smn3,2);
    $dlsf6 = number_format($tdls3,2);
}

/********************TOTALES IMPORTEMN Y DLS*/

//FIN  ************************************************************************************

/********************************************************************REMISIONES********************************//////////////////				
$queEmp2="select remision, cliente, importemn, importedls, pedido, descr, tipopago, estado from remision where fecharem='$actual' ";
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
'estado'=>'<b>ESTADO<b>'
);		
/******************************************************TOTALES REMISIONES******************************//////////////////
/**********************************TOTALES IMPORTE MN E IMPORTE DLS DE CONTADO  REMISIONES*/
$sqld=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CONTADO' AND estado!='CANCELADA'");
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
$sqlt=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CREDITO' and estado!='CANCELADA'");
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
$sqlx=mysql_query("select importemn, importedls from remision where fecharem='$actual' AND tipopago='CONTADO' AND formapago='TRASPSALDO' AND estado!='CANCELADA' ");
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
	
	$totrfmn= $sumatot + $sumatotr;
	$totrfm=number_format($totrfmn,2);
	$totrfdls=$totaltot + $totaltotr; 
	$totrfd=number_format($totrfdls,2);

    $smnftot = number_format($sumatot,2);
	$dlsftot = number_format($totaltot,2);

	$smnftotr = number_format($sumatotr,2);
	$dlsftotr = number_format($totaltotr,2);

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

$totalg=$tefe+$tcheque+$tar+$transmn;//total general contado
$tgral=number_format($totalg,2);

$totaldl=$tdol+$dcheque+$tardl+$trandl;
$dltotal=number_format($totaldl,2);
/*************************************************************************************************************************************************************************************/	
$options = array(
				'shadeCol'=>array(0.8,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>530,
				'fontSize'=>6);			
	$txttit = "<b>COMERCIALIZADORA DE SUMINISTROS DEL NORTE S.A DE C.V</b>\n<b>CORTE DEL DIA $actual</b>";


$pdf->ezText($txttit, 10);
if ($data!='')
{
$pdf->ezTable($data, $titles, 'FACTURAS', $options);
$pdf->ezText("");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO    			    --------CONTADO MN-------------------CONTADO DLS",9);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                    $".$fsmn."                                    ".$fdls." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                           $".$fsmn1."                                      ".$fdls1." DLS"."         ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                           $".$fsmn2."                                      ".$fdls2." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF"."                           $".$fsmn3."                                       ".$fdls3." DLS"."                             ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("T.SALDO-ANTICIPO"."                    $".$fsmn4."                                    ".$fdls4." DLS"."                           ",9); 
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("T.SALDO-PUNTO"."                    $".$fsmn5."                                    ".$fdls5." DLS"."                           ",9); 
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Contado MN $".$smnf1."           Contado DLS $".$dlsf1."           Credito MN $".$smnf2."           Credito DLS $".$dlsf2,9);
$pdf->ezText("Total MN $".$smnftot."           Total DLS $".$dlsftot,9);
}
if ($data2!='')
{
$pdf->ezTable($data2, $remision, 'REMISIONES', $options);
$pdf->ezText("");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO    			    --------CONTADO MN-------------------CONTADO DLS",9);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                    $".$mnr."                                                   ".$dlsr." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                     $".$mnr2."                                                     ".$dlsr2." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                     $".$mnr1."                                                  ".$dlsr1." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF"."                     $".$mnr4f."                                                  ".$dlsr4f." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("T.SALDO"."                     $".$mnr3."                                                       ".$dlsr3." DLS"."   ",8);
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Contado MN $".$mnf."           Contado DLS ".$dlsf."             Credito MN $".$mnfc."      Credito DLS ".$dlsfc,9);
$pdf->ezText("Total MN $".$smnftotr."           Total DLS $".$dlsftotr,9);}

$pdf->ezTable($data3, $notas, 'NOTAS DE CREDITO', $options);
	$pdf->ezText("");
$pdf->ezTable($data4, $cheque, 'CHEQUES POSFECHADOS', $options);
if($data=='' && $data1=='' && $data2=='')
{
	$pdf->ezText("NO EXISTEN REGISTROS");
}
else{
	$pdf->ezText("");
$pdf->ezText("TOTALES GENERALES (Fac, Rem)");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("  F.PAGO     ------------------ MN------------------------   DLS",9);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO                     $".$totale."                                        ".$totald."DLS",8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("CHEQUE                     $".$chequet."                                        ".$chequedl."DLS",8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("TARJETA                     $".$tarf."                                        ".$tdlf."DLS",8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("TRANSF.                     $".$ftran."                                        ".$ftrans."DLS",8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("Contado MN $".$tgral."           Contado DLS $".$dltotal."",9);
$pdf->ezText("Total MN $".$totrfm."           Total DLS $".$totrfd,9);
}
if ($data1!='')
{
$pdf->ezTable($data1, $cobranza, 'COBRANZA', $options);
$pdf->ezText("");
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("    F.PAGO          	        --------          MN        ------------------                  DLS",8);
$pdf->ezText("-----------------------------------------------------------------------------------------------------------------------",12);
$pdf->ezText("EFECTIVO"."                              $".$smnf4."                                                        ".$dlsf4." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TARJETA"."                                   $".$smnct1."                                                           ".$dlsct1." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("CHEQUE"."                              $".$smnf3."                                                      ".$dlsf3." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("TRANSF"."                                   $".$smnf5."                                                           ".$dlsf5." DLS"."                  ",8);   
$pdf->ezText("------------------------------------------------------------------------------------------------------------------------------------------------",10);
$pdf->ezText("Total MN $".$smnf6."           Total DLS $".$dlsf6."",9);
}

$pdf->ezText("");
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10,$op);
$pdf->ezText("<b>Hora:</b> ".date("g:i:s A")."\n\n", 10);
$pdf->ezStream();
$fichero = fopen('prueba.pdf','wb');
fwrite ($fichero, $documento_pdf);
fclose ($fichero);