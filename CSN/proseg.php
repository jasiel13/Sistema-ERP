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
		$u=$_SESSION['name'];

		$us=mysql_query("select nombre, apellido, tipo from usuarios where usuario='$u'");
		$f=mysql_fetch_array($us);
		$usuario=$f[0]." ".$f[1];
		$tipo=$f[2];
		//echo "tipo ".$tipo;
			//echo $_POST['idpedido'];
			$idpedido=$_POST['idpedido'];
			$fecha=$_POST['fechac[]'];
			$comentarios=$_POST['contenido[]'];
			$segacot=$_POST['cotapen'];
			
		
			

			date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    $hoy=date('Y-m-d');
			$hoy=date('Y-m-d');
			 $hora=date('G:i:s');
for ($i=1; $i <=10 ; $i++) { 

	$f=$_POST['fecha'.$i];
	$c=$_POST['comentarios'.$i];
	//echo $f."c  ".$c;
	
if ($c!='') {
	$q=mysql_query("insert into segcot (folio, fecha, hora, comentarios, usuario) values ('$idpedido','$hoy','$hora', '$c', '$usuario')");
	//echo "insert into segcot (folio, fecha, hora, comentarios, usuario) values ('$idpedido','$hoy','$hora', '$c', '$f', '$usuario')";
}	

}

for ($i=1; $i<=22; $i++)
	{

	}

	if ($segacot!='') {//liberado
		$c=mysql_query("update pedido set estado='PENDIENTE' where idpedido='$idpedido'");
		//echo "update pedido set contestada='$hoy', estado='PENDIENTE' where idpedido='$idpedido'";
	}

if($q or $c)
		{
			?>
				<script language="javascript">
				alert("Registro almacenado con éxito");
				parent.window.location='/csn/junta.php';
				//document.location.href=' /csn/pedido.php', 3000;
 
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
?>
</body>
</html>
