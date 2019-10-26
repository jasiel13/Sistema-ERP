<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
error_reporting(0);
session_start();
include('conexion.php');
$remision=$_POST['remision'];
$cliente=$_POST['cliente'];
$importemn=$_POST['importemn'];
$importedls=$_POST['importedls'];
$pedido=$_POST['pedido'];
$factura=$_POST['factura'];
$tpago=$_POST['tpago'];
$fpago=$_POST['fpago'];
$desc=$_POST['descri'];
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();

$hoy=$_POST['fecha'];
/*******************************/
$hrarec=$_POST['horarec'];
$recibio=$_POST['recibio'];
$surtio=$_POST['surtio'];
$estatus=$_POST['estatus'];
$entregada=$_POST['entregada'];
$recibida=$_POST['recibida'];
$tiempo=$_POST['tiempo'];
$completa=$_POST['completa'];
$obser=$_POST['obser'];
$hora=date ("G:i");
$usuario=$_SESSION["name"];

//CODIGO NUEVO JB PARA QUE SE PUEDA INSERTAR EN REMISION CSN 
$query=mysql_query("insert into remision (remision, fecharem, cliente, importemn, importedls, pedido, facturada, tipopago, formapago, descr, horarem, usuario) VALUES ('$remision', '$hoy','$cliente', '$importemn', '$importedls', '$pedido', '$factura','$tpago', '$fpago', '$desc','$hora','$usuario')");
if($query)
			{
				?>
				<script language="javascript">
				alert ('Regitsro almacenado');
				</script>	
				<?php
			}
			else
			{
				
//CODIGO NUEVO JB PARA ACTUALIZAR DATOS EN TABLA REMISION PAGINA ALMACEN , ALMACEN REMISION
$sql=mysql_query("SELECT * FROM remision where remision='$remision'");
if(mysql_affected_rows() > 0)
{
 $q=mysql_query("UPDATE remision SET horarec='$hrarec',recibio='$recibio', surtio='$surtio', estatus='$estatus', recalma='$entregada',recfyc='$recibida', atiempo='$tiempo', completa='$completa', observ='$obser' WHERE remision='$remision'") or die(mysql_error());;
if ($q)
{?>
 <script language="javascript">
alert("Registro actualizado");
</script>
<?php
//header("refresh: 2; url= registro.php");
}
else
{
	?>
 <script language="javascript">
alert("No se pudo actualizar el registro");
</script>    
    <?php
}
  }
    }
  
?>
</body>
</html>