<?php
include ('conexion.php');
$pedido=$_POST['pedido'];
$impx=$_POST['imp_finalmxn'];
$impd=$_POST['imp_finaldls'];

/*este codigo es para que en el formulario ventas/cotizacion/aceptar/importe final
acepte el valor con comas, jas*/
$varimportes=$impx;
$st3= quitar($varimportes);
function quitar($varimportes){
$sig[]=',';
$sig[]='$';
return str_replace($sig,'',$varimportes);}

$vardolar=$impd;
$st4= quitar2($vardolar);
function quitar2($vardolar){
$sig[]=',';
$sig[]='$';
return str_replace($sig,'',$vardolar);}     
//codigo comas

$up=mysql_query("update pedido set estadoc='ACEPTADA', importemn='$st3', importedls='$st4' where idpedido='$pedido'");
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

