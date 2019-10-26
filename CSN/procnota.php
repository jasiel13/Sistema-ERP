<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
session_start();
include('conexion.php');
$nota=$_POST['nota'];
$cliente=$_POST['cliente'];
$factura=$_POST['fac'];
$desc=$_POST['descri'];
$restomn=0;
$restodls=0;
$saldo=0;
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();

$hoy=date('Y-m-d');
$usuario=$_SESSION['name'];
$tp=$_POST['tpago'];
//echo $factura;
$s=mysql_query("select saldo from clientes where cliente ='$cliente'");
$a= mysql_fetch_array($s);


$q=mysql_query("select importemn, importe_dls, restomn, restodls from facturacion where factura='$factura'");
 $c=mysql_num_rows($q);
 if($c!=0)
 {
	 while ($arr=mysql_fetch_array($q))
	 {
		 $importemn=$arr[0];
		 $importedls=$arr[1];
		 $restomn=$arr[2];
		 $restodls=$arr[3];
	 }
 }
		 if ($tp=='TOTAL')
			{
        		$importemn=$importemn;
    	     	 $importedls=$importedls;
		 		$estado='CANCELADA';
				$mn=$arr[2];
				$dls=$arr[3];
				//echo $importemn."mn";
	/*echo $importedls."dls";
	echo $estado."es";*/
	
	 		}
else if ($tp=='PARCIAL')
{
	$importemn=$_POST['importemn'];
	$importedls=$_POST['importedls'];
	$estado='NC PARCIAL';
	$mn=$restomn-$importemn;
	$dls=$restodls-$importedls;
	/*echo $importemn."mn";
	echo $importedls."dls";
	echo $estado."es";*/
}

$sql=mysql_query("insert into notacredito (nota, fechanota, cliente, importemn, importedls, factura, descri, usuario) values ('$nota', '$hoy', '$cliente', '$importemn', '$importedls', '$factura', '$desc', '$usuario')");
if($sql)
{
	$c=mysql_query("update facturacion set estado='$estado', nc='$nota', ncimportemn='$importemn', ncimportedls='$importedls', restomn='$mn', restodls='$dls' where factura='$factura'");
	if($c)
	{
		if($importemn!='')
		{
		$saldo=$a[0]-$importemn;
		//echo "SALDO".$saldo."=".$cl[0]."-".$importemn." ".$cliente;
		}
		else if($importedls!='0')
		{
		$saldo=$a[0]-$importedls;
		}
	}
		$l=mysql_query("update clientes set saldo='$saldo' where cliente='$cliente'");
		if ($l){
			//echo $l;
	?>
    <script language="javascript">
alert ('Regitsro almacenado');
</script>	
<?php
}
	
}
else
{
?>
<script language="javascript">
alert ('Ha ocurrido un error!!');
</script>	
<?php
}
?>

</body>
</html>