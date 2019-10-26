<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
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


//facturas
$queEmp = ( "select factura, cliente, importemn, importe_dls, tipopago, formapago, estado from facturacion where fechafactura='2014-05-03'");


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
				'formapago'=>'<b>F.PAGO</b>',
				'estado'=>'<b>ESTATUS</b>');//facturas
$options = array(
				'shadeCol'=>array(0.8,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>580,
				'fontsize'=>6);			
	$txttit = "<b>COMERCIALIZADORA DE SUMINISTROS DEL NORTE S.A DE C.V</b>\n<b>CORTE DEL DIA $actual</b>";


$pdf->ezText($txttit, 10);

$pdf->ezTable($data, $titles,'FACTURAS', $options);
$pdf->ezText("");

$pdf->ezStream();
?>
</body>
</html>