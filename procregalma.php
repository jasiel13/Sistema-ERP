<?php
error_reporting(0);
include('conexion.php');
$factura=$_POST['factura'];
$hrarec=$_POST['horarec'];
$recibio=$_POST['recibio'];
$surtio=$_POST['surtio'];
$estatus=$_POST['estatus'];
$entregada=$_POST['entregada'];
$recibida=$_POST['recibida'];
$tiempo=$_POST['tiempo'];
$completa=$_POST['completa'];
$obser=$_POST['obser'];


$sql=mysql_query("SELECT * FROM facturacion where factura='$factura'");
if(mysql_affected_rows() > 0)
{
	$q=mysql_query("UPDATE facturacion SET horarecibido='$hrarec', recibio='$recibio', surtio='$surtio', estatus='$estatus', entregada='$entregada', recibida='$recibida', atiempo='$tiempo', completa='$completa', observaciones='$obser' WHERE factura='$factura'")or die(mysql_error());;
if ($q)
{?>
 <script language="javascript">
alert("Registro almacenado");
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
?>