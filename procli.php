<?php
include ("conexion.php");
$id=$_POST['id'];
$cliente=$_POST['cliente'];
$cartera=$_POST['cartera'];
$saldo=$_POST['saldo'];
$dias=$_POST['dias'];
$q=mysql_query("update clientes set saldo='$saldo', cliente='$cliente', cartera='$cartera', dias='$dias' where id=$id") or die (mysql_error());
if(isset ($q))
{
	?>
    <script language="javascript">
	alert ("Datos actualizados con éxito!");
	</script>
    <?php
}
else
{
	?>
    <script language="javascript">
	alert ("Ha ocurrido un error!");
	</script>

    <?php
}
?>