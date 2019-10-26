<?php
include ("conexion.php");
$count=$_POST["count"];
//echo $fact;
//$pagada=$_POST["pagada"];
$i=0;
for ($i=0; $i<$count; $i++){
$fact=$_POST['fact'.$i];
$fecha=$_POST['fechact'.$i];
//$fcobro=$_POST["fechacobro".$i];
//echo $fact;
//echo "*".$fecha;
$query=mysql_query("UPDATE facturacion SET fechacontrarecibo= '$fecha' WHERE factura='$fact'");
//echo $query;
if(!$query)
{
	?>
    <script language="javascript">
	alert("No se pudo actualizar el registro");
	</script>
    <?php
}
else
{?>
    <script language="javascript">
	alert("Registro actualizado con éxito");
	</script>
    <?php
    }
}
//********************
/*$fact=$_POST["fact"];
$fecha=$_POST["fechact"];
$query=mysql_query("UPDATE facturacion SET fechacontrarecibo= $fecha WHERE factura=$fact");
echo $query;
if(!mysql_query($query))
{
	echo $fact."   ".$fecha;
	die("Error".mysql_error());
}
else
{echo "Factura Modificada";
echo $fact."   ".$fecha;
}*/