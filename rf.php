<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
	<?php
	include ('conexion.php');
	$remision=$_POST['remision'];
	$fact=$_POST['factura'];
	/*echo "rem".$remision;
	echo "fact".$fact;*/
	$sql=mysql_query("update remision set facturada='$fact' where remision='$remision'");
if(!$sql)
{
	?>
    <script language="javascript">
    alert("Registro fallido!"); 
	</script>
<?php
}
else
{
?>
    <script language="javascript">
    alert("Remision facturada!"); 
	</script>
    <?php
    header("refresh:1;url=remfacturada.php");
}
	?>
</body>
</html>
