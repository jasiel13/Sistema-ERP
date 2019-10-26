<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include('conexion.php');
$cheque=$_POST['cheque'];
$sql=mysql_query("select * from cheque where nocheque='$cheque' AND cobrado='' and estado=''");
if ($sql)
{
$contador =mysql_num_rows($sql);
 	 
 while ($array=mysql_fetch_array($sql))
 {
 //echo "correcto";
 $impf=number_format($array[6],2);
 $impdf=number_format($array[7],2);
?>
<div align="center">
<p></p>
<strong><font size="+2" color="#000099">CHEQUE COBRADO</font></strong>
<p></p>
<form name="buscarche" method="post" action="cobrado.php">
<table border="1">
<tr>
<td>No.Cheque</td>
<td><input type="text" name="nocheque" value="<?php if ($contador >0){echo $array[1];} else {echo "";}?> " readonly="readonly" /></td>
</tr>
<tr>
<td>Fecha exp</td>
<td><input type="text" name="fechaexp" value="<?php if ($contador >0){echo $array[2];} else {echo "";}?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Cliente</td>
<td><input type="text" name="cliente" value="<?php if ($contador >0){echo $array[4];} else {echo "";}?>" readonly="readonly" style="width:20em;" value="Init. Val."/></td>
</tr>
<tr>
<td>Fecha cobro</td>
<td><input type="text" name="fcobro" value="<?php if ($contador >0){echo $array[5];} else {echo "";}?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Importe mn</td>
<td><input type="text" name="importe" value="<?php if ($contador >0){echo $impf;} else {echo "";}?>" readonly="readonly" /></td>
</tr>
<tr>
<td>Importe dls</td>
<td><input type="text" name="importe" value="<?php if ($contador >0){echo $impdf;} else {echo "";}?>" readonly="readonly"/></td>
</tr>

<tr>
<td>Seleccione</td>
<td><select name='estado'>
<option value='#'>Seleccione</option>
<option value='cobrado'>Cobrado</option>
<option value='cancelado'>Cancelado</option>
<option value='garantia'>Garantia</option>
<option value='rebotado'>Rebotado</option>
</select></td>
</tr>
<tr>
<td></td>
<td><input type="image" name="enviar" src="images/1396468944_34.png" /></td>
</tr>
</table>
<input type="hidden" name="hoy" value="<?php $hoy?>"
</form>
<?php
 }
}
if($contador<=0)
{
	?>
<script language="javascript">
alert("No se localizó el cheque");
</script>

<?php
}
?>
</div>
</body>
</html>
