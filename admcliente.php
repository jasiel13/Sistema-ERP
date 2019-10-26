 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<?php
error_reporting(0);
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}
if ($_SESSION["autentificado"]=="2"){
header("Location: accesodenegado.php");
exit();
}

?>

</head>

<body>
<div align="center">
<p></p>
<font size="+2" color="#000066"><strong>MODIFICAR CLIENTE</strong></font>
<p></p>
<?php
include ('conexion.php');
$tb=$_POST['tb'];

if ($tb=='TODOS'){
//$q=mysql_query("select cliente, cartera, saldo, dias from clientes order by cliente");

for($i=65; $i<=90; $i++) {  
    $letra = chr($i);  
    echo '<a href="admcliente.php?letra='.$letra.'">'.$letra.'</a> | ';  
}
?>
<table border="1" align="center">
<tr>
<td>CLIENTE</td>
<td>CARTERA</td>
<td>DIAS P/PAGO</td>
<td>SALDO</td>
</tr>
<?php
while ($r=mysql_fetch_array($q))
{
	echo "<tr><td>".utf8_decode($r[0])."</td></tr>";
}
?>
</table>
<?php
}
elseif(isset($_GET['letra'])) {
	$q=mysql_query("select id, cliente, cartera, saldo, dias from clientes where cliente like '".addslashes(strip_tags($_GET['letra']))."%' order by cliente");
	for($i=65; $i<=90; $i++) {  
    $letra = chr($i);  
    echo '<a href="admcliente.php?letra='.$letra.'">'.$letra.'</a> | ';  
}
?>
<table border="1" align="center">
<tr>
<td>CLIENTE</td>
<td>CARTERA</td>
<td>SALDO</td>
<td>DIAS P/PAGO</td>
</tr>
<?php

while ($r=mysql_fetch_array($q))
{
	?>
    <tr style="CURSOR:hand;" onclick="window.location='admcliente.php?id=<?php echo $r[0];?>'" ><td><?php echo utf8_decode($r[1]);?></td><td><?php echo utf8_decode($r[2]);?></td><td><?php echo utf8_decode($r[3]);?></td><td><?php echo utf8_decode($r[4]);?></td></tr>
    <?php
}
echo "</table>";
}
if ($tb=='CLIENTE'){
	$cliente=$_POST['cliente'];
$q=mysql_query("select id, cliente, cartera, saldo, dias from clientes where cliente='$cliente'");
$rid=mysql_fetch_array($q);	
$id=$rid[0];
//echo $id.","."select id, cliente, cartera, saldo, dias from clientes where cliente='$cliente'";
}
if(isset($_GET['id']) or $id!='') {
	$q=mysql_query("select id, cliente, cartera, saldo, dias from clientes where id= '".addslashes(strip_tags($_GET['id']))."' or id='$id'");
	$a=mysql_fetch_array($q);

?>
<form name="nota" id="nota" method="post" action="procli.php">
<table border="1">
<!--aqui va el else if del id con isset y el get-->
<input type="hidden" name="id" value="<?php echo $a[0];?>"
<tr><td>Cliente</td>
<td><input name="cliente" type="text" id="cliente" size="100" value="<?php  echo $a[1];?>" /></td>
</tr>
<tr><td>Cartera</td>
<td><select name="cartera"  value=""> 
<option value="<?php echo $a[2]; ?>" selected><?php echo $a[2]; ?>
<option value="ACTUALIZADA">ACTUALIZADA
<option value="ANALIZAR">ANALIZAR
<option value="ABOGADO">ABOGADO 
</select>
</td>
</tr><tr><td>Dias p/pago</td>
<td><input type="text" name="dias" value="<?php echo $a[4]; ?>" /></td>
</tr>
<tr><td>Saldo</td>
<td><input type="text" name="saldo" value="<?php echo $a[3]; ?>" /></td>
</tr>
<tr><td></td>
<td><input type="image" name="enviar" src="../csn/images/save.png" /></td>
</tr>

</table>
</div>
<?php
}
$qq=mysql_query("select id, cliente, cartera, saldo, dias from clientes order by id desc limit 20'");



?>
<table border="1" align="center">
<tr>
<td>ID</td>
<td>CLIENTE</td>
<td>CARTERA</td>
<td>SALDO</td>
<td>DIAS P/PAGO</td>
</tr>
<?php

while ($rr=mysql_fetch_array($qq))
{
	?>
    <tr style="CURSOR:hand;" ><td><?php echo $rr[0];?></td><td><?php echo utf8_decode($rr[1]);?></td><td><?php echo utf8_decode($rr[2]);?></td><td><?php echo utf8_decode($rr[3]);?></td><td><?php echo utf8_decode($rr[4]);?></td></tr>
    <?php
}
echo "</table>";

?>
</form>

</body>
</html>