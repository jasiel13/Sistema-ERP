<style type="text/css">
.bg0 { background:#CCC; color:#000; font-size:12px; font-style:inherit;}
.bg1 { background:#FF8080; color:#000; font-size:11px; }
.bg2 { background:#CCC; color:#000; font-size:11px; }
.bg3 { background:#FF8080; color:#000; font-size:14px; }
.bg4 { background:#999; color:#FFF; font-size:14px; }
.bg5 {backgroud:#900; color:#FFF; font-size:11px; }
.bgt { background:#333; color:#FFF; font-size:14px; }
</style>
<?php
error_reporting(0);
include ("conexion.php");
$finicio= $_POST["finicio"];
$ffin=$_POST["ffin"];
$sel=$_POST['opcion'];
$contador=0;
$status;
$factual=date_default_timezone_set('UTC');
$tiempo;$estilo;$contat=0;$contft=0;$cat=0; $cft=0;
 $hoy=date("Y-m-d");//FECHA ACTUAL DEL SISTEMA
?>
<p></p>
<strong><font size="+2" color="#FFFAF9"><center>DETALLE DE FACTURAS</center></font></strong>
<p></p>
<table border="1" align="center">
<tr class="bg0">
<td><strong>ESTADO</strong></td>
  <td><strong>FACTURA</strong></td>
  <td><strong>CLIENTE</strong></td>
  <td><strong>IMPORTE MN</strong></td>
  <td><strong>IMPORTE DLS</strong></td>
  <td><strong>F. FACTURACIÓN</strong></td>
  <td><strong>F. CONTRARECIBO</strong></td>
  <td><strong>ESTATUS CT</strong></td>
</tr>

<?php
if ($sel=='todas')
{
 $query = mysql_query("SELECT estado, factura, cliente, fechafactura, fechacontrarecibo, importemn, importe_dls FROM facturacion WHERE fechafactura >= '$finicio' AND fechafactura <= '$ffin' AND tipopago='CREDITO' AND estado!='CANCELADA' AND pagada!='on' order by fechafactura, factura"); 
}
if ($sel=='sct')
{
$query = mysql_query("SELECT estado, factura, cliente, fechafactura, fechacontrarecibo, importemn, importe_dls FROM facturacion WHERE fechafactura >= '$finicio' AND fechafactura <= '$ffin' AND tipopago='CREDITO' AND estado!='CANCELADA' AND pagada!='on' AND fechacontrarecibo='0000-00-00' order by fechafactura, factura"); 	
}
 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {
	
	// echo $hoy;
 while ($array=mysql_fetch_array($query))
 {
	 //Contar dias para el estatus
	 $ffact=$array[3];
	 $fconrec=$array[4];
	 $fcobro=$array[5];
	
	// echo "fconrec".$fconrec; //FECHA CONTRARECIBO
	 if($fconrec=='0000-00-00')
	 {
		 //echo "Ceros";
	   $diferencia = strtotime($hoy) - strtotime($ffact);
	 }
	 if($fconrec!='0000-00-00')
	 {
		 //echo "No Ceros";
	 $diferencia = strtotime($fconrec) - strtotime($ffact);//convertir fecha a segundos
	 //dia de pago.... aqui me quede
	
	 }//if fecha contrarecibo
	 //TERMINA COMPARACION DE FECHA DE PAGO
	 
	//echo "fechafact".$ffact, "fecha cr".$fconrec, "Dif".$diferencia;
	  if($diferencia > 86400)//2592000 = 1mes
	  {
        $tiempo = floor($diferencia/86400) ;
		//echo "HACE ".$tiempo." DIAS";
	  }
	  
	  
	  if ($tiempo<=8)
	  {
		  $status="A TIEMPO";
		  $estilo='bg2';
		  $contat=$contat+1;
	  }
	 else if ($tiempo>8)
	  {
		  $status="FUERA DE TIEMPO";
		  $estilo='bg1';
		  $contft=$contft+1;
	  }
/*************************ESTATUS DE DIA DE PAGO***********************/
 if($fcobro!='0000-00-00')
 {
 $diaspago= strtotime($fcobro) - strtotime($hoy);
	 
	
	  if($diaspago >= 86400 && $diaspago < 2592000)//2592000 = 1mes
	  {
        $time = floor($diaspago/86400) ;
		
	  }
	  else if($diaspago >= 2592000 && $diaspago < 31104000)//meses
	  {
        $time1 = floor($diaspago/2592000);
		
		//echo $tiempo1;
	  }

if ($time>0)
	  {
		  $statusp="A TIEMPO";
		 
		  $cat=$cat+1;
	  }
	 if ($time<0)
	  {
		  $statusp="FUERA DE TIEMPO";
		  $estilop='bg5';
		  $cft=$cft+1;
		  ?>
          <script language="javascript">
		  alert ("Hay facturas con pago vencido!!!");
		  </script>
          <?php
	  }
 }
	 if ($fcobro=='0000-00-00')
 {
	 $statusp="#";
 } 	 
	 //*****************termina diferencia de dias
	 echo "<tr class=".$estilo.">
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".number_format($array[5],2)."</td><td>".number_format($array[6],2)."</td><td>".$array[3]."</td><td>".$array[4]."</td><td>".$status."</td>";
	echo"</tr>";
 }
 
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
 ?>
 <p></p>
<form  name="pdf" id="pdf"> 
 <input type="hidden" name="factura" value="<?php $array[0];?>" />
 <table width="200" border="1" align="center">
  <tr class="bgt">
  <td></td><td>Contra recibo</td><td>Dia de pago</td></tr>
   <tr class="bg4"><td>Facturas a tiempo</td>
    <td><?php echo $contat;?></td><td><?php echo $cat ?></td>
  </tr>
  <tr class="bg3">
    <td>Facturas fuera de tiempo</td>
    <td><?php echo $contft; ?></td><td><?php echo $cft ?></td>
  </tr>
    <tr class="bg3">
    <td></td><td></td>
    <td><input type="image" src="images/reporte.png" name="imprimir" onclick="window.print(); return false;" /></td>
  </tr>
</table>
<?php
while ($array[0])
{
echo $array[0];
}
?>
</form>

