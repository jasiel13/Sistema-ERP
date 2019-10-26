<style type="text/css">
.bg0 { background:#59ACAC; color:#000; font-size:18px; font-style:inherit;}
.bg1 { background:#FF8080; color:#000; font-size:18px; }
.bg4 { background:#CCC; color:#000; font-size:18px; }
.bg3 { background:#FF8080; color:#000; font-size:18px; }
.bg2 { background:#999; color:#FFF; font-size:18px; }
.bg5 {backgroud:#900; color:#FFF; font-size:18px; }
.bgt { background:#333; color:#FFF; font-size:18px; }
.bgv{position: absolute; top: 50px; left: 460px;}
.bgt{background:#59ACAC; content:#FFF;  }
.sea{position: absolute; top: 150px; left: 460px;}
.cta{position: absolute; top: 250px; left: 460px;}
</style>
<?php
error_reporting(0);
include ("conexion.php");
$finicio= $_POST["finicio"];
$ffin=$_POST["ffin"];
$sel=$_POST['opcion'];
$contador=0;
$status;
$ta=0;$tda=0;$tab=0;$tdab=0;$tan=0;$tdan=0;$to=0;$tdo=0;
$factual=date_default_timezone_set('UTC');
$tiempo;$estilo;$contat=0;$contft=0;$cat=0; $cft=0;
$tf=0;$tf1=0;
 $hoy=date("Y-m-d");//FECHA ACTUAL DEL SISTEMA
?>
<p></p>
<strong><font size="+2" color="#800040"><center>COBRANZA DE <?php echo $finicio." ";?> A <?php echo $ffin;?></center></font></strong>
<p></p>
<table border='1'>
	
	<tr class='bgt'><td>RECUPERACION CARTERA</td><td><strong>PESOS</strong></td><td><strong>DLS</strong></td></tr>

<?php

 $query = mysql_query("SELECT fechacobro, cliente, importemn, importedls FROM cobranza WHERE fechacobro >= '$finicio' AND fechacobro <= '$ffin' order by fechacobro"); 

 $contador =mysql_num_rows($query);
 
 if ($contador!=0)
 {
	
	// echo $hoy;
 while ($array=mysql_fetch_array($query))
 {
	 $c=mysql_query("select cartera from clientes where cliente='$array[1]'");
	 $ca=mysql_fetch_array($c);
	 $tmn=$tmn+$array[2];
	 $tdls=$tdls+$array[3];
	 if($array[1]=='*SERVICIOS ECO AMBIENTALES, S.A DE C.V')
	 {
	 	$sead=$sead+$array[3];
	 }
	 elseif ($array[1]=='SERVICIOS ECO AMBIENTALES, S.A DE C.V') 
	 {
	 	$seap=$seap+$array[2];
	 }
	 elseif ($array[1]=='CONSORCIO TECNOAMBIENTAL, S.A DE C.V') {
	 	$ctap=$ctap+$array[2];
	 	$ctad=$ctad+$array[3];
	 }
	 elseif($ca['0']=='ACTUALIZADA')
	 {
		$ta=$ta+$array[2];
		$tda=$tda+$array[3]; 
		$tta=number_format($ta,2);
		$ttda=number_format($tda,2);
	 }
	 elseif($ca['0']=='ABOGADO')
	 {
		$tab=$tab+$array[2];
		$tdab=$tdab+$array[3]; 
		$ttab=number_format($tab,2);
		$ttdab=number_format($tdab,2);
	 }
	 elseif($ca['0']=='ANALIZAR')
	 {
		$tan=$tan+$array[2];
		$tdan=$tdan+$array[3]; 
		$ttan=number_format($tan,2);
		$ttdan=number_format($tdan,2);
	 }
	 elseif($ca['0']=='')
	 {
		$to=$to+$array[2];
		$tdo=$tdo+$array[3]; 
		$tto=number_format($to,2);
		$ttdo=number_format($tdo,2);
	 }
	 //*****************termina diferencia de dias
	/*echo "<tr class='bg4'>
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$mn."</td><td>".$dls."</td><form action='modifact.php' method='post'><input type='hidden' name='cliente' value='".$array[2]."'><td>".$ca[0]."</td></form></td>";
	echo"</tr>";*/
 }
 $fmn=number_format($tmn,2);
 $fdls=number_format($tdls,2);
 echo "<p></p>";
 echo "<tr class='bg3'><td><strong>ACTUALIZADA</strong></td><td><strong>$ $tta</strong></td><td><strong> $ $ttda</strong></td></tr>
 <tr class='bg2'><td><strong>ABOGADO<strong></td><td><strong> $ $ttab<strong></td><td><strong>$ $ttdab</strong></td></tr>
  <tr class='bg3'><td><strong>ANALIZAR</strong></td><td><strong>$ $ttan</strong></td><td><strong> $ $ttdan</strong></td></tr>
  <tr class='bg2'><td><strong>OTROS</strong></td><td><strong> $ $tto</strong></td><td><strong> $ $ttdo</strong></td></tr>
  <tr class='bg3'><td><strong>TOTAL GRAL</strong></td><td><strong> $ $fmn</strong></td><td><strong> $ $fdls</strong></td></td></tr>
 </table>";
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }
 echo "</table>";
 
 $f=mysql_query("SELECT  restomn, restodls, tipopago, cliente FROM facturacion where  estado!='CANCELADA' AND fechafactura >= '$finicio' AND fechafactura <= '$ffin'");
 echo "";
 while ($fa=mysql_fetch_array($f)){
 if($fa['tipopago']=='CONTADO'){
 	if($fa['cliente']=='*SERVICIOS ECO AMBIENTALES, S.A DE C.V')
 	{
 		$sea=$sea+$fa[1];
 	}
 	else if($fa['cliente']=='SERVICIOS ECO AMBIENTALES, S.A. DE C.V.')
 	{
 		$sea1=$sea1+$fa[0];
 	}
 	else if ($fa['cliente']=='CONSORCIO TECNOAMBIENTAL, S.A DE C.V') {
 		$cta=cta+$fa[0];
 		$cta1=$cta1+$fa[1];
 	}
 	else{
 $tf=$tf+$fa[0];
 $tf1=$tf1+$fa[1];}
}
  if($fa['tipopago']=='CREDITO'){
if($fa['cliente']=='*SERVICIOS ECO AMBIENTALES, S.A DE C.V')
	{
	$scd=$scd+$fa[1];
	}
	else if($fa['cliente']=='SERVICIOS ECO AMBIENTALES, S.A. DE C.V.')
 		{
 			$scp=$scp+$fa[0];
 		}
 		else if ($fa['cliente']=='CONSORCIO TECNOAMBIENTAL, S.A DE C.V') {
 			$ccp=$ccp+$fa[0];
 			$ccd=$ccd+$fa[1];
 		}
 			else{
 				$tfc=$tfc+$fa[0];
 				$tf1c=$tf1c+$fa[1];
				}

 }
}
 ?>
 <table border="1" class='bgv'>

 <tr class='bgt'><td><strong>VENTAS</strong></td><td><strong>CONTADO</strong></td><td><strong>CREDITO</strong></td></tr>
 <tr class='bg3'><td><strong>PESOS</strong></td><td><strong><?php echo "$ ".number_format($tf,2); ?></strong></td><td><strong><?php echo "$ ".number_format($tfc,2); ?></strong></td></tr>
 <tr class='bg2'><td><strong>DLS</strong></td><td><strong><?php echo "$ ".number_format($tf1,2); ?></strong></td><td><strong><?php echo "$ ".number_format($tf1c,2); ?></strong></td></tr>
 </table>
 <table border='1' class='sea'>
<tr class='bgt'><td>SEA S.A DE C.V</td><td>CONTADO</td><td>CREDITO</td></tr>
<tr class='bg3'><td>PESOS</td><td><?php echo number_format($sea1,2);?></td><td><?php echo number_format($scp,2);?></td></tr>
<tr class='bg2'><td>DOLARES</td><td><?php echo number_format($sea,2);?></td><td><?php echo number_format($scd,2);?></td></tr>
 </table>
  <table border='1' class='cta'>
<tr class='bgt'><td>CTA S.A DE C.V</td><td>CONTADO</td><td>CREDITO</td></tr>
<tr class='bg3'><td>PESOS</td><td><?php echo number_format($cta,2);?></td><td><?php echo number_format($ccp,2);?></td></tr>
<tr class='bg2'><td>DOLARES</td><td><?php echo number_format($cta1,2);?></td><td><?php echo number_format($ccd,2);?></td></tr>
 </table>
 <p></p>
    <tr class="bg3">
    <td></td><td></td>
    <td><input type="image" src="images/reporte.png" name="imprimir" onclick="window.print(); return false;" /></td>
  </tr>
<?php
while ($array[0])
{
echo $array[0];
}
?>

