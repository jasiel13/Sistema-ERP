<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<script>

    function marcar(source) 
    {
    	var campo1 ="?idpedido=";
        var checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
                    window.open("prueba/indexpop.php"+campo1+checkboxes[i], "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=400");
        }
    }
//-->
</script>
<body>
<style type="text/css">
.bg1 { background:#FF8080; color:#000; font-size:11px; }
.bg2 { background:#CCC; color:#000; font-size:11px; }

	table {width:95%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2; font-family:Arial;}
	th {padding:5px;background:#555;color:#fff}
	td {padding:5px;border:solid #ddd;border-width:0 0 1px; font-size: 1.4em;}
		
tr:hover
{
    background: #069A12;
    color: white;
    cursor:pointer;
}
tr:out
{
    background: #FFFFFF;
    color: #000000;
}
</style>
<?php
	error_reporting(0);
	include ("conexion.php");
	$fecha1=$_POST['finicio'];
	$fecha2=$_POST['ffin'];
	$contat=0;$contft=0;
	$ct=0; $cnt=0;
?>

<form action="" name="almacen" id="almacen" method="post">
<strong><font size="+2" color="#FFFFFF"><center>DETALLES DE COMENTARIOS</center></font></strong>
<font size="+1" color="#FFFFFF"><center>Del:<strong> <?php echo $fecha1."</strong> Al <strong>". $fecha2 ?> </strong></center></font>
<p></p>
<table border="1" align="center">
</tr>
<tr class="bg4">
  <th>SOLICITO</th>
  <th>MATERIAL</th>
  <th>FUERA DE TIEMPO</th>
  <th>A TIEMPO</th>
</tr>

<?php

//////////////////////////////////////////MATERIAL//////////////////////////////////////////////////
$query5 = mysql_query("SELECT pedido.idpedido,pedido.tipo, pedido.hora, pedido.solicito, pedmat.idmaterial FROM pedido, pedmat WHERE pedido.idpedido=pedmat.idpedido AND pedido.fecha>='$fecha1' AND pedido.fecha<='$fecha2' AND pedido.solicito!='SEGUIMIENTO' group by pedido.solicito,pedmat.idmaterial asc ");
while ($array5=mysql_fetch_array($query5))
{	 
				$q=mysql_query("SELECT idmaterial, flisto from pedmat where idpedido='$array5[0]' and flisto='0000-00-00'"); 
					while ($q1=mysql_fetch_array($q))
					{
					    $p=mysql_query("select material from material where id='$q1[0]'");
					    while ($p1=mysql_fetch_array($p))
					    {
	$query4 = mysql_query("SELECT pedido.idpedido,pedido.tipo, pedido.hora, pedido.solicito, pedmat.idmaterial FROM pedido, pedmat WHERE pedido.idpedido=pedmat.idpedido AND pedido.fecha>='$fecha1' AND pedido.fecha<='$fecha2' AND pedido.solicito!='SEGUIMIENTO'");
	while ($array4=mysql_fetch_array($query4))
	{
 	
 	$query = mysql_query("SELECT idpedido, fechac, hora FROM comentarios WHERE fechac>='$fecha1' AND fechac<='$fecha2' AND tipo='6' GROUP BY idpedido ASC ORDER BY fechac,hora ASC ");

	$contador =mysql_num_rows($query);
	if ($contador!=0)
	{
 		while ($array=mysql_fetch_array($query))
 		{
 			$query2 = mysql_query("SELECT idpedido, fechac, hora FROM comentarios WHERE fechac>='$fecha1' AND fechac<='$fecha2' AND tipo!='6' GROUP BY idpedido ASC ORDER BY fechac,hora ASC  ");
 			while ($array2=mysql_fetch_array($query2))
 			{	 	
 				if($array[0]==$array2[0] )
 				{			
 					//SELECT AVG(nota) AS nota FROM notas;  <---[SACAR PROMEDIO]
		    		$if=0;
		 			$ia=0;
					//////////////////////////MATERIAL////////////////////////////////////////////////////////
    			 	$t4=240;
    			 	$t24=1440;
    			 	$hv4 = $hv + $t4;
    			 	$rest2=0;
    			 	$rest=0;

    			 	$num_lineas = 0;
						
					$hcom=$array[2];
					$hvent=$array2[2];					

					$hc = strtotime($hcom);
					$hv = strtotime($hvent);

					$hc = $hc / 60;
					$hv = $hv / 60;

					if($array4[4]==3 && $array4[3]!='PIEZA ESPECIAL' )
					{
    			 		if($hc>$hv4)
    			 		{
    			 			$if=$if+1;
    			 			$r='FUERA DE TIEMPO';
    			 			$estilo='bg1';
    			 										$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
    			 		}
    			 		elseif($hc<$hv4)
    			 		{
    			 			$ia=$ia+1;
    			 			$r='A TIEMPO';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);

    			 		}
					}  

    			 	if($array4[4]==1 && $array4[3]!='PIEZA ESPECIAL')
    			 	{
    			 		
    			 		if($hc>$hv4)
    			 		{
    			 			$r='FUERA DE TIEMPO';
    			 			$estilo='bg1';
    			 			$if=$if+1;
    			 										$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
    			 		}
    			 		elseif($hc<$hv4)
    			 		{
    			 			$ia=$ia+1;
    			 			$r='A TIEMPO';
    			 			$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
    			 		}
    			 	}
    			 	
    			 	if($array4[4]==2 && $array4[3]!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
							$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
							
							 //echo max($sum, -4); //returns -4

						}	
					}  

					if($array4[4]==5 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}  
						
					if($array4[4]==6 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);	
						}
					}  
						
					if($array4[4]==9 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);	
						}
					}  
						
					if($array4[4]==8 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);	
						}
					}  
						
					if($array4[4]==11 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}  
						
					if($array4[4]==12 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);	
						}
					}  
						
					if($array4[4]==13 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);	
						}
					}  
						
					if($array4[4]==14 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);	
						}
					}  
					
					if($array4[4]==15 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}   
						
					if($array4[4]==17 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}   
					
					if($array4[4]==18 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}   
						
					if($array4[4]==19 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}  
					
					if($array4[4]==22 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}   
						
					if($array4[4]==23 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}   
						
					if($array4[4]==24 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}   
						
					//if($p1[0]=='CONEXIONES ADS' && $close!='PIEZA ESPECIAL')
					//{
					//	if($hc>$hv4)
					//	{
					//		$r='FUERA DE TIEMPO';
					//		$estilo='bg1';
					//		$if=$if+1;
					//	}
					//	elseif($hc<$hv4)
					//	{
					//		$r='A TIEMPO';
					//		$estilo='bg2';
					//		$ia=$ia+1;	
					//	}
					//}   
						
					if($array4[4]==8 && $close!='INFORMACION' && $t!=1 )
					{
						$hv4 = $hv + $t24;
						
						if($hc>$hv4)
						{

							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}
					if($array4[4]==8 && $close=='INFORMACION' && $t==1 )
					{
						$hv4 = $hv + $t4;
						
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
														$length2 = strlen(utf8_decode($if));
							$sum2 = $sum2 +$length2;
							$rest2 = substr($sum2, -2);
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							$length = strlen(utf8_decode($ia));
							$sum = $sum +$length;
							$rest = substr($sum, -2);
						}
					}
					    }
					}
				}
 				}
 			}
					//////////////////////////MATERIAL//////////////////////////////////////////////////

		?>
			<tr class="<?php echo $estilo?>">
			<td><?php echo $array5[3]; ?></td><td><?php echo $p1[0];?></td><td><?php echo $rest2;?></td><td><?php echo $rest;?></td>
			</tr>
 		<?php
 						    	
 		}
 	}
				
	}
 echo "</table>";
 ?> 
 <p></p>

    °°°°<input type="image" src="images/reporte.png" name="imprimir" onclick="window.print(); return false;" />

</body>