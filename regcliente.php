<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>


<body>
<?php
$id=$_POST['idcliente'];
$cliente=$_POST['cliente'];
$cartera=$_POST['cartera'];
$saldo=$_POST['saldo'];
$dias=$_POST['dias'];
include ('conexion.php');
$sql=mysql_query("INSERT INTO clientes (IDcliente, cliente, cartera, saldo, dias) VALUES ('$id','$cliente','$cartera','$saldo','$dias') ");
if ($sql)
{
?>
    <script language="javascript">
	alert("Cliente se ha registrado con éxito");
	</script>
    <?php
}
else
{?>
    <script language="javascript">
	alert("Ocurrió un error");
	</script>
    <?php
    }
?>
</body>
</html>