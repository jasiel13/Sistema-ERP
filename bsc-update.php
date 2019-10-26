<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include('conexion.php');
$id=$_POST['id'];
//////////////////////////////////
$vmes=$_POST['vmes'];
$varvmes=$vmes;
$st= quitar($varvmes);
function quitar($varvmes){
$sig[]=',';
$sig[]='$';
return str_replace($sig,'',$varvmes);} 
/////////////////////////////////
$vsem=$_POST['vsem'];
$varvsem=$vsem;
$sts= quitar2($varvsem);
function quitar2($varvsem){
$sig[]=',';
$sig[]='$';
return str_replace($sig,'',$varvsem);} 
/////////////////////////////////
$vdia=$_POST['vdia'];
$varvdia=$vdia;
$std= quitar3($varvdia);
function quitar3($varvdia){
$sig[]=',';
$sig[]='$';
return str_replace($sig,'',$varvdia);} 
/////////////////////////////////
$usu=$_POST['usu'];
$fechav=$_POST['fechav'];

$query=mysql_query("update limites set max_mes='$st', max_semana='$sts', max_dia='$std', usuario='$usu', fecha='$fechav' where id='$id'");

if($query)
{
	?>
    <script language="javascript">
	alert("Registro almacenado!");
    </script>
 <?php
}
else
{
?>
?>
    <script language="javascript">
	alert("Registro almacenado!");
    </script>
<?php
}
?>
</body>
</html>