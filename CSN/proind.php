<html>
<title></title>
<HEAD>
	<style type="text/css">
	.t{background-color: #326BA8;}
	.c{font-size: 11px;}
	.f{position: absolute; left: 490px; top: 10px;}

		table {
		   width: 40%;
		   border: 2px solid #000;
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
</HEAD>
<body>
<?php
error_reporting(0);
include ('conexion.php');
$finicio=$_POST['finicio'];
$ffin=$_POST['ffin'];
$u=0;$d=0;$total1=0;$total2=0;
$p=mysql_query("Select idpedido, fecha from pedido where tipo!='2' and fecha >= '$finicio' AND fecha <= '$ffin'");
while ($r1=mysql_fetch_array($p)) 
	{
	$m=mysql_query("select idmaterial, flisto from pedmat where idpedido='$r1[0]' and flisto!='0000-00-00'");
	while ($m1=mysql_fetch_array($m)) 
	{
			$dif = strtotime($m1[1]) - strtotime($r1[1]);
        	    $tiempo = floor($dif/14400);
			
	  		if($m1[0]==1)
	  		{
	  			$u=$u+1;
	  			$total1=$total1+$tiempo;
	  			$p1=$total1/$u;
	  		}
	  		if($m1[0]==2)
	  		{
	  			
	  			$d=$d+1;
	  			$total2=$total2+$tiempo;
	  			$p2=$total2/$d;
	  		}
	  		if($m1[0]==3)
	  		{
	  			$t=$t+1;
	  			$total3=$total3+$tiempo;
	  			$p3=$total3/$t;
	  		}
	  		if($m1[0]==4)
	  		{
	  			$c=$c+1;
	  			$total4=$total4+$tiempo;
	  			$p4=$total4/$c;
	  		}
	  		if($m1[0]==5)
	  		{
	  			
	  			$ci=$ci+1;
	  			$total5=$total5+$tiempo;
	  			$p5=$total5/$ci;
	  		}
	  		if($m1[0]==6)
	  		{
	  			
	  			$s=$s+1;
	  			$total6=$total6+$tiempo;
	  			$p6=$total6/$s;
	  		}
	  		if($m1[0]==7)
	  		{
	  			$si=$si+1;
	  			$total7=$total7+$tiempo;
	  			$p7=$total7/$si;
	  		}
	  		if($m1[0]==8)
	  		{
	  			$o=$o+1;
	  			$total8=$total8+$tiempo;
	  			$p8=$total8/$o;
	  		}
	  		if($m1[0]==9)
	  		{
	  			$n=$n+1;
	  			$total9=$total9+$tiempo;
	  			$p9=$total9/$n;
	  		}
	  		if($m1[0]==10)
	  		{
	  			$di=$di+1;
	  			$total10=$total10+$tiempo;
	  			$p10=$total10/$di;
	  		}
	  		if($m1[0]==11)
	  		{
	  			$on=$on+1;
	  			$total11=$total11+$tiempo;
	  			$p11=$total11/$on;
	  		}
	  		if($m1[0]==12)
	  		{
	  			$do=$do+1;
	  			$total12=$total12+$tiempo;
	  			$p12=$total12/$do;
	  		}
	  		if($m1[0]==13)
	  		{
	  			$tr=$tr+1;
	  			$total13=$total13+$tiempo;
	  			$p13=$total13/$tr;
	  		}
	  		if($m1[0]==14)
	  		{
	  			$ca=$ca+1;
	  			$total14=$total14+$tiempo;
	  			$p14=$total14/$ca;
	  		}
	  		if($m1[0]==15)
	  		{
	  			$q=$q+1;
	  			$total15=$total15+$tiempo;
	  			$p15=$total15/$q;
	  		}
	  		if($m1[0]==16)
	  		{
	  			$ds=$ds+1;
	  			$total16=$total16+$tiempo;
	  			$p16=$total16/$ds;
	  		}
	  		if($m1[0]==17)
	  		{
	  			$dis=$dis+1;
	  			$total17=$total17+$tiempo;
	  			$p17=$total17/$dis;
	  		}
	  		if($m1[0]==18)
	  		{
	  			$do=$do+1;
	  			$total18=$total18+$tiempo;
	  			$p18=$total17/$do;
	  		}
	  		if($m1[0]==19)
	  		{
	  			$dn=$dn+1;
	  			$total19=$total19+$tiempo;
	  			$p19=$total19/$dn;
	  		}
	  		if($m1[0]==20)
	  		{
	  			$v=$v+1;
	  			$total20=$total20+$tiempo;
	  			$p20=$total20/$v;
	  		}
	  		if($m1[0]==21)
	  		{
	  			$vu=$vu+1;
	  			$total21=$total21+$tiempo;
	  			$p21=$total21/$vu;
	  		}
	  		if($m1[0]==20)
	  		{
	  			$vd=$vd+1;
	  			$total22=$total22+$tiempo;
	  			$p22=$total22/$vd;
	  		}
	  		//echo "HACE ".$tiempo." DIAS ".$r1[0]."-".$r1[1]."mat--".$m1[0]."**".$m1[1]."*".$dif."<br>"; 
	  		
	}
	}
		
?>
<table border='1'>
<tr class='t' align='center'><td>ID</td><td>MATERIAL</td><td >DIAS PROMEDIO</td></tr>
<tr align='center' class='c'><td>1</td><td >ABRAZADERAS</td><td><?php echo $p1?></td></tr>
<tr align='center' class='c'><td>2</td><td>CONEXIONES FOFO</td><td><?php echo $p2?></td></tr>
<tr align='center' class='c'><td>3</td><td>PEGAMENTOS Y LIMPIADORES</td><td><?php echo $p3?></td></tr>
<tr align='center' class='c'><td>4</td><td>POLIETILENO ALCANTARILLADO ADS</td><td><?php echo $p4?></td></tr>
<tr align='center' class='c'><td>5</td><td>POLIETILENO BROCAL Y REJILLA</td><td><?php echo $p5?></td></tr>
<tr align='center' class='c'><td>6</td><td>POLIETILENO CONDUIT ADS</td><td><?php echo $p6?></td></tr>
<tr align='center' class='c'><td>7</td><td>POLIETILENO ADS SANIPRO</td><td><?php echo $p7?></td></tr>
<tr align='center' class='c'><td>8</td><td>POLIETILENO ADS SANIPRO PLUS</td><td><?php echo $p8?></td></tr>
<tr align='center' class='c'><td>9</td><td>POLIETILENO ADS STORMTITE</td><td><?php echo $p9?></td></tr>
<tr align='center' class='c'><td>10</td><td>POLIPROPILENO</td><td><?php echo $p10?></td></tr>
<tr align='center' class='c'><td>11</td><td>PVC ALCANTARILLADO</td><td><?php echo $p11?></td></tr>
<tr align='center' class='c'><td>12</td><td>PVC CONDUIT</td><td><?php echo $p12?></td></tr>
<tr align='center' class='c'><td>13</td><td>PVC HID ING</td><td><?php echo $p13?></td></tr>
<tr align='center' class='c'><td>14</td><td>PVC HID MET</td><td><?php echo $p14?></td></tr>
<tr align='center' class='c'><td>15</td><td>PVC SANITARIO</td><td><?php echo $p15?></td></tr>
<tr align='center' class='c'><td>16</td><td>RIEGO</td><td><?php echo $p16?></td></tr>
<tr align='center' class='c'><td>17</td><td>TOMA PE-AL-PE</td><td><?php echo $p17?></td></tr>
<tr align='center' class='c'><td>18</td><td>TOMA PEAD</td><td><?php echo $p18?></td></tr>
<tr align='center' class='c'><td>19</td><td>TORNILLO CON TUERCA</td><td><?php echo $p19?></td></tr>
<tr align='center' class='c'><td>20</td><td>TUBERIA RHINO</td><td><?php echo $p20?></td></tr>
<tr align='center' class='c'><td>12</td><td>TUBERIAS PT</td><td><?php echo $p21?></td></tr>
<tr align='center' class='c'><td>12</td><td>TUBO VARIAS</td><td><?php echo $p22?></td></tr>
</table>
<table border='1' class='f'>
	<tr class='t'><td align='center'>ID</td><td align='center'>MATERIAL</td><td align='center'>FRECUENCIA</td></tr>
<?php

$c=mysql_query("Select idmaterial, Count(*) from pedmat group by idmaterial order by Count(*) desc");
//echo "Select Count(*) from pedmat where id='$i'";
while($row=mysql_fetch_array($c))  
{  
	$m=mysql_query("select material from material where id='$row[0]'");
	//echo "select material from material where id='$row[0]'";
	while($m1=mysql_fetch_array($m)){  
echo "<tr>";  
echo "<td align='center' class='c'>" . $row['idmaterial'] . "</td>";
echo "<td align='center' class='c'>" . $m1['material'] . "</td>";  
echo "<td align='center' class='c'>" . $row['Count(*)'] . "</td>";  
echo "</tr>";  
}  
}
echo "</table>";  
?>
<input type="image" name="imprimir" src="images/print.png" onclick="window.print(); return false;"/>
</body
</html>

