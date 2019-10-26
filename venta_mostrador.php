<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/formfull.css" type="text/css"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
  <script src="query/jquery.min.js"></script>
<script src="jquery-1.4.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript" src="jquery.autocomplete.js"></script>
<script>
$(document).ready(function(){
 $("#cliente").autocomplete("autocomplete.php", {
    selectFirst: true
  });
});
</script>

<script language="JavaScript" type="text/javascript">
<?php
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}
if ($_SESSION["autentificado"]==""){
header("Location: accesodenegado.php");
exit();
}

?>


 <!-- Funcion que permite validar las cajas de texto -->
function valida(document)
{
 document.factura.focus();
}
</script>

<style type="text/css">
.almacen{
position:absolute;
top:45px;
left:560px;	
}
.boton
{
	position:absolute;
	top:150px;
	left:400px;
}
.fuente
{
	font-size:10px;
}

.bl
{
  display: inline-block;
  width: 45%;
  font-size: 11px;
  padding-left: 30px;
  margin-left: 30px; 
}
td
{
  width: 60%;
}
</style>

</script>
<?php
   error_reporting(0);
  include ('conexion.php');
  date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    $hoy=date('Y-m-d');
    $hora=date('G:i');
    $usuario=$_SESSION["name"];
    $tipou=$_SESSION['autentificado'];
    
    $u=mysql_query("select nombre, apellido from usuarios where usuario='$usuario'");
    //echo "select nombre, apellido from usuarios where usuario='$usuario ";
    $f=mysql_fetch_array($u)
?>
</head>
<body>
<div>
<center>
  
<h2>VENTAS DE MOSTRADOR</h2>
</center>
        <form name='mostr' id="mostr" action='reg_venta_m.php' method='POST' onsubmit="return valida(this);">
        <div align='center'>
          <strong>REGISTRAR VENTA</strong>
          <p></p>
          <p><input type='text' name='pedido' id="pedido" placeholder="PEDIDO/COTIZACION" required></p>
        <table>
          <tr>
            <td>
            <input type='text' size="35" name='vendedor' value='<?php echo $f[0]." ".$f[1];?>' readonly>
            <input type='text' name='fecha' id="fecha" value='<?php echo $hoy;?>'>
            <input type='text' name='hora' id="hora" value='<?php echo $hora;?>'>
            <input type="text" name="cliente" id="cliente" placeholder="CLIENTE">
            <input type="text" name="imp_finalmxn" id="imp_finalmxn" placeholder="IMPORTE MXN">
            <input type="text" name="imp_finaldls" id="imp_finaldls" placeholder="IMPORTE DLS">
            </td>
            <td>
              <div style="width: 318px; height: 275px; overflow-y: scroll; background-color: white; margin-left: 20px;">
              <input type='hidden' name='cont' value='<?php echo $cont;?>'>
                <?php
                  $m=mysql_query("select id, material from material");
                    ?>
                    <B>SELECCIONE MATERIAL:</B> <br>
                    <?php
                    while ($m1=mysql_fetch_array($m)) 
                    {
                      ?>

                        <p name="lr" id="lr" onMouseOver="this.style.backgroundColor='#069A12'; this.style.cursor='Pointer';" onMouseOut="this.style.backgroundColor='#FFFFFF';"><input type='checkbox' name='<?php echo "mat".$m1[0]?>'/><?php echo $m1[1];?></p>
                      <?php 
                    }
                ?>
                </div>
            </td>
          </tr>
      </table>
        <input type='image' src='images/save.png'>  
      </form>

</body>