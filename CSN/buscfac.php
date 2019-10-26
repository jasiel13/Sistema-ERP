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
if ($_SESSION["autentificado"]=="5" ){
header("Location: accesodenegado.php");
exit();
}
if ($_SESSION["autentificado"]=="6" ){
header("Location: accesodenegado.php");
exit();
}
?>

<style type="text/css">

.fuente
{
	font-size:12px;
}
.fuente2
{
	font-size:13px;
}
.ti{ background-color:#009; font-size:14px; color:#FFF;
}

</style>
</head>

<body>
<?php
error_reporting(0);
include ("conexion.php");

//setTimeout(Location.reload(),9000);
?>
<div align="center">
<br>
<form name="busfac" method="post" action="facturas.php">
<strong><font size="+2" color="#FFFFFF"><center>CONSECUTIVO FACTURACIÓN</center></font></strong>
<p></p>
<table border="1" align="center">
<tr class="ti">
  <td>FACTURA</td><td><input type="text" name="factura" /></td>
  <td width="70">FECHA</td><td><input type="date" name="fecha"  /></td>
  <td>TIPO PAGO</td>
  <td><select name="tipo">
  <option value="#">SELECCIONE</option>
  <option value="TODAS">TODAS</option>
  <option value="CREDITO">CREDITO</option>
  <option value="CONTADO">CONTADO</option>
  </select></td>
  <td><input type="image" src="../csn/images/1396468944_34.png" /></td>
    </tr>
</table>
<br>
<br>

<strong><font size="+2" color="#FFFFFF"><center>INGRESE EL RANGO DE FECHA</center></font></strong>
<p></p>

<table border="1" align="center">
    <tr class="ti">
      <td width="80">Fecha Inicio</td>
      <td><input name="finicio" type="date" 'aaaa/mm/dd'  id="finicio" /></td>
      <td width="80">Fecha Final</td>
      <td><input name="ffin" type="date" 'aaaa/mm/dd' id="ffin" value="<?php echo date("Y-m-d");?>"/></td>
      <td><input type="image" src="../csn/images/1396468944_34.png" /></td>
    </tr>
</table>
</form>
</div>
</body>
</html>