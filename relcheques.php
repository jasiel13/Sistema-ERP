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
if ($_SESSION["autentificado"]=="2" ){
header("Location: accesodenegado.php");
exit();
}

?>

<style type="text/css">
.ti{ background-color:#009; font-size:14px; color:#FFF;
}
</style>
</head>
<?php
error_reporting(0);
include ("conexion.php");
$fecha1=$_POST['finicio'];
$fecha2=$_POST['ffin'];
$contat=0;$contft=0;
$ct=0; $cnt=0;
?>
<form action="" name="cheques" id="cheques" method="post">
<div align="center">
<font size="+2" color="#000066"><strong>RELACION DE CHEQUES COBRADOS</strong></font>
<p></p>
<table border="1" align="center">
<tr class="ti">
<td>No. Cheque</td>
<td>Fecha exp.</td>
<td>Banco</td>
<td>Cliente</td>
<td>F. Cobro</td>
<td>Imp. MN</td>
<td>Imp. DLS</td>
<td>F. Cobrado</td>
<td>Estado</td>
</tr>

<?php
include ('conexion.php');
$q=mysql_query("SELECT nocheque, fechaexp, banco, cliente, fechacobro, importemn, importedls, fcobro, estado from cheque WHERE fechaexp >= '$fecha1' AND fechaexp <= '$fecha2' AND estado !='' order by fechaexp");
	$qu=mysql_query("SELECT SUM(importemn) as Total_MXN, sum(importedls) as Total_DLS from cheque WHERE fechaexp >= '$fecha1' AND fechaexp <= '$fecha2' AND estado !='' order by fechaexp");
 
  $contador =mysql_num_rows($q);
 
 if ($contador!=0)
 {
	while($arr=mysql_fetch_array($q))
	 {
		echo "<tr><td>".$arr[0]."</td><td>".$arr[1]."</td><td>".$arr[2]."</td><td>".$arr[3]."</td><td>".$arr[4]."</td><td>".$arr[5]."</td><td>".$arr[6]."</td><td>".$arr[7]."</td><td>".$arr[8]."</td></tr>";
	 }
     
     	while($arra=mysql_fetch_array($qu))
	 {
	 	$mxn = $arra['Total_MXN'];
	 	$dls = $arra['Total_DLS'];
	 	$mxn_n = number_format($mxn,2);
	 	$dls_n = number_format($dls,2);

		echo "<tr class=".ti."><td>"."</td><td>"."</td><td>"."</td><td>"."</td><td>" .TOTAL."</td><td>".$mxn_n."</td><td>".$dls_n."</td></tr>";
	 }

 }
  else
 {
	 echo "<tr><td>No hay cheques cobrados!!!</td></tr></table>";
	 //Mensaje de no hay registros
 }

 echo "</table>";
 ?> 
 </table>
 </div>
 </form>
 </html>