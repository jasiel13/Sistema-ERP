<?php
include ('conexion.php');
$pedido=$_POST['pedido'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$cliente=$_POST['cliente'];
$vendedor=$_POST['vendedor'];
$estado='VENTA MOSTRADOR';
$impx=$_POST['imp_finalmxn'];
$impd=$_POST['imp_finaldls'];
$v=3;
$up=mysql_query("insert into pedido (idpedido, fecha, hora, cliente, vendedor, estado, importemn, importedls, tipo) values ('$pedido','$fecha','$hora','$cliente','$vendedor','$estado', '$impx', '$impd', '$v')");
//echo "update pedido set estadoc='CANCELADA', motivo='$motivo' where idpedido='$pedido'";

if($up)
{
	//$i=1;
		for ($i=1; $i<=22; $i++) 
		{
			$material=$_POST['mat'.$i];
			if($material!='')
			{
				$m=mysql_query("insert into pedmat (idpedido, idmaterial, material) values ('$pedido','$i','on')");
			}
		}
}

if ($up)
{	
	?>
		<script language="javascript">
			alert("Registro almacenado con éxito");
		</script>
	<?php
		header( "refresh:1;url=pedido.php" );
}
else
{
	?>
		<script language="javascript">
			alert("Falló el registro (Error 0.1)");
		</script>
	<?php
}