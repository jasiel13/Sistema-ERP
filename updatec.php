<?php
include ('conexion.php');
$pedido=$_POST['pedido'];
$motivo=$_POST['motivo'];
$com=$_POST['com'];
$fecha_canc=$_POST['fecha_canc'];
$up=mysql_query("update pedido set estadoc='CANCELADA', motivo='$motivo', com_cancelada='$com', fecha_canc='$fecha_canc' where idpedido='$pedido'");
//echo "update pedido set estadoc='CANCELADA', motivo='$motivo' where idpedido='$pedido'";

			if($up){
				?>
					<script language="javascript">
					alert("Registro almacenado con éxito");
					
					</script>
					<?php
				  }
			else
			{?>
				<script language="javascript">
				alert("Falló el registro Error 0.4");
				</script>
			<?php
			header("refresh:1;url=coti.php");
			}
?>