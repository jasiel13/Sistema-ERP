<?php 
include ("conexion.php");
	//Establecemos zona horaria por defecto
    date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
	
$fact=$_POST['factura'];
$hora=date ("g:i");
$query=mysql_query("UPDATE facturacion SET horarecibido= '$hora' WHERE factura='$fact'");
echo $query;
if(!$query)
{
echo $fact." ".$hora;
die("Error".mysql_error());
}
else
{echo "Factura Modificada";
echo $fact." ".$hora;
}

?>
