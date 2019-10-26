<style type="text/css">
.t{background-color: #08088A; color: #FFFFFF;}
.to{background-color: #2E9AFE; color: #FFFFFF; }
 
table {
   width: 80%;
   border: 2px solid #000;
   margin-left: 0%;
}
tr, td {

   text-align: left;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
tr {
   background: #eee;
}
input[type=text], select {
    width: 100%;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>

<?php
include ('conexion.php');

$finicio=$_POST['finicio'];
$ffin=$_POST['ffin'];

$tpesosc=0;$tpesoscr=0; $tdlsc=0; $tdlscr=0;$tdlsc=0;
	$tpesosc1=0;$tpesoscr1=0; $tdlsc1=0; $tdlscr1=0;$tdlsc1=0;
	$tpesosc2=0;$tpesoscr2=0; $tdlsc2=0; $tdlscr2=0;$tdlsc2=0;
	$tpesosc3=0;$tpesoscr3=0; $tdlsc3=0; $tdlscr3=0;$tdlsc3=0;
		$tpesosc4=0;$tpesoscr4=0; $tdlsc4=0; $tdlscr4=0;$tdlsc4=0;

$q=mysql_query("select importemn, importe_dls, tipopago, vendedor from facturacion where fechafactura >= '$finicio' AND fechafactura <= '$ffin'");
while ($q1=mysql_fetch_array($q)) 
{
	
	if ($q1[3]=='SILVIA MEDINA') 
		{
				if($q1[2]=='CONTADO')
				{
					$tpesosc1=$tpesosc1+$q1[0];
					$tdlsc1=$tdlsc1+$q1[1];
				}
				if($q1[2]=='CREDITO')
				{
					$tpesoscr1=$tpesoscr1+$q1[0];
					$tdlscr1=$tdlscr1+$q1[1];
				}
		}
	
	if ($q1[3]=='NALLELI REYNA') 
		{
				if($q1[2]=='CONTADO')
				{
					$tpesosc2=$tpesosc2+$q1[0];
					$tdlsc2=$tdlsc2+$q1[1];
				}
				if($q1[2]=='CREDITO')
				{
					$tpesoscr2=$tpesoscr2+$q1[0];
					$tdlscr2=$tdlscr2+$q1[1];
				}
		}
		
	if ($q1[3]=='YADIRA SIFUENTES') 
		{
				if($q1[2]=='CONTADO')
				{
					$tpesosc3=$tpesosc3+$q1[0];
					$tdlsc3=$tdlsc3+$q1[1];
				}
				if($q1[2]=='CREDITO')
				{
						$tpesoscr3=$tpesoscr3+$q1[0];
						$tdlscr3=$tdlscr3+$q1[1];
				}
        }

	if ($q1[3]=='CLAUDIA MORALES') 
		{
				if($q1[2]=='CONTADO')
				{
					$tpesosc4=$tpesosc4+$q1[0];
					$tdlsc4=$tdlsc4+$q1[1];
				}
				if($q1[2]=='CREDITO')
				{
					$tpesoscr4=$tpesoscr4+$q1[0];
					$tdlscr4=$tdlscr4+$q1[1];
				}
	    }


}//importes

//totales de todos los vendedores
	$tvcp=$tpesosc+$tpesosc1+$tpesosc2+$tpesosc3+$tpesosc4;// total contado pesos
	$tvcd=$tdlsc+$tdlsc1+$tdlsc2+$tdlsc3+$tdlsc4;// total contado dolares
	$tvcrp=$tpesoscr+$tpesoscr1+$tpesoscr2+$tpesoscr3+$tpesoscr4;//total credito pesos
	$tvcrd=$tdlscr+$tdlscr1+$tdlscr2+$tdlscr3+$tdlscr4;// total credito dolares

?>
<DIV align='center'>
	<p></p>
	<strong><font size='+2' color="#000000">RELACION DE VENTAS DEL DIA <?php echo $finicio; ?> AL <?php echo $ffin;?></font></strong>
	<p></p>
<table border='1'>
<tr class='t'><td>Vendedor</td><td>Contado pesos</td><td>Credito Pesos</td><td>Contado Dls</td><td>Credito Dls</td></tr>
<tr><td>SILVIA MEDINA</td><td><?php echo number_format($tpesosc1,2)?></td><td><?php echo number_format($tpesoscr1,2)?></td><td><?php echo number_format($tdlsc1,2)?></td><td><?php echo number_format($tdlscr1,2)?></td></tr>
<tr><td>NALLELI REYNA</td><td><?php echo number_format($tpesosc2,2)?></td><td><?php echo number_format($tpesoscr2,2)?></td><td><?php echo number_format($tdlsc2,2)?></td><td><?php echo number_format($tdlscr2,2)?></td></tr>
<tr><td>YADIRA SIFUENTES</td><td><?php echo number_format($tpesosc3,2)?></td><td><?php echo number_format($tpesoscr3,2)?></td><td><?php echo number_format($tdlsc3,2)?></td><td><?php echo number_format($tdlscr3,2)?></td></tr>
<tr><td>CLAUDIA MORALES</td><td><?php echo number_format($tpesosc4,2)?></td><td><?php echo number_format($tpesoscr4,2)?></td><td><?php echo number_format($tdlsc4,2)?></td><td><?php echo number_format($tdlscr4,2)?></td></tr>
<!--<tr><td></td><td><?php echo number_format($tpesosc3,2)?></td><td><?php echo number_format($tpesoscr3,2)?></td><td><?php echo number_format($tdlsc3,2)?></td><td><?php echo number_format($tdlscr3,2)?></td></tr>-->
<tr class='to'><td>TOTALES</td><td><?php echo "$ ".number_format($tvcp,2)?></td><td><?php echo "$ ".number_format($tvcrp,2)?></td><td><?php echo "$ ".number_format($tvcd,2)?></td><td><?php echo "$ ".number_format($tvcrd,2)?></td></tr>
</table> </DIV>