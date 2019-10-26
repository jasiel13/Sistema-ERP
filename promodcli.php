<?php
include ("conexion.php");
$id=$_POST['id'];
echo $id;
$cliente=$_POST['cliente'];
$cartera=$_POST['cartera'];
$saldo=$_POST['saldo'];
$dias=$_POST['dias'];
$query=("update clientes set cliente='$cliente', cartera='$cartera', saldo='$saldo', dias='$dias' where id='$id'");
if($query)
{
	?>
    <script language="javascript">
	alert ("Datos actualizados con éxito!<?php echo $id;?>");
	</script>
    <?php
}
else
{
	?>
    <script language="javascript">
	alert ("Datos actualizados con éxito!");
	</script>

    <?php
}
?>