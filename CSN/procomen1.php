<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
if ($_SESSION["autentificado"]=="" ){
header("Location: accesodenegado.php");
exit();
}
?>
</head>
<body>
	<?php
	error_reporting(0);
		include('conexion.php');

		date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    $hora=date('G:i:s');
			//echo $_POST['idpedido'];
			$idpedido=$_POST['idpedido'];
			$fechac=$_POST['fechac'];
			$comentarios=$_POST['comentarios'];
			$fechapc=$_POST['fechapc'];
			$usuario=$_POST['usuario'];
			$flisto=$_POST['flisto'];
			$con=$_POST['contestada'];
			$reb=$_POST['rebotar'];
			$lib=$_POST['liberar'];
			$seg=$_POST['seguimiento'];
			$hoy=date('Y-m-d');



			if ($comentarios!=''){
		$q=mysql_query("insert into comentarios (idpedido, fechac, comentarios, fechapc, hora, usuario) values ('$idpedido','$fechac','$comentarios', '$fechapc', '$hora', '$usuario')");}
		
	for ($i=1; $i<=22; $i++)
	{
		$idmat=$_POST['idmat'.$i];
		/*echo $idmat;
		echo "fecha".$hoy;*/
	if ($idmat!='')
		 {	
			$w=mysql_query("update pedmat set flisto='$hoy' where idpedido='$idpedido' and idmaterial='$idmat'");
			//echo "update pedmat set flisto='$hoy' where idpedido='$idpedido' and idmaterial='$idmat'";
		 }
	}
	if ($con!='') {//contestada a ventas
		$c=mysql_query("update pedido set contestada='$hoy', estado='CONTESTADA' where idpedido='$idpedido'");
		//echo "update pedido set contestada='$hoy', estado='CONTESTADA' where idpedido='$idpedido'";
	}
	if ($reb!='') {//rebotar a compras
		$c=mysql_query("update pedido set contestada='$hoy', estado='PENDIENTE' where idpedido='$idpedido'");
		//echo "update pedido set contestada='$hoy', estado='PENDIENTE' where idpedido='$idpedido'";
	}
	if ($lib!='') {//liberado
		$c=mysql_query("update pedido set contestada='$hoy', estado='LIBERADO' where idpedido='$idpedido'");
		//echo "update pedido set contestada='$hoy', estado='PENDIENTE' where idpedido='$idpedido'";
	}
	if ($seg!='') {//liberado
		$c=mysql_query("update pedido set contestada='$hoy', estado='SEGUIMIENTO' where idpedido='$idpedido'");
		//echo "update pedido set contestada='$hoy', estado='PENDIENTE' where idpedido='$idpedido'";
	}
	if($q or $w or $c){
?>
<script language="javascript">
alert("Registro almacenado con éxito");
</script>
<?php
}
else
{?>
<script language="javascript">
alert("Falló el registro Error 0.2");
</script>
<?php
}
//header("refresh:2;url=junta.php");
?>
</body>
</html>