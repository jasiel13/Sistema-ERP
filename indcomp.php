<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bscBusc2.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="query/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
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
        $(document).ready(function(){

		$('#tabtot').hide();
		$('#det').hide();
		$('#table').hide();//nuevo 2019
		$('#container').hide();//nuevo 2019

            $("#vta").click(function(){
            $('#tab').show();
                 $('#tabtot').hide();
                 $('#table').hide();
                 $('#container').hide(); 
                 $('#det').hide(); // Remove player from DOM            
                 });

              $("#vto").click(function(){
                 $('#tabtot').show();
                 $('#table').show();
                 $('#container').show();
                 $('#tab').hide();
                 $('#det').hide(); // Remove player from DOM          
                 });               

                 $("#btndet").click(function(){
                 $('#det').show();
                 $('#tab').hide();
                 $('#table').hide();
                 $('#container').hide(); 
                 $('#tabtot').hide(); // Remove player from DOM            
                 });
                 $(document).ready(function() {
	$('.zoom-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
});
        });
</script>
<!--este codigo era para la grafica que no se uso 2019-->
<script>
$(document).ready(function()
{           
        var pnum1= document.getElementById('pnum1').value;
        var pnum2= document.getElementById('pnum2').value;
        var pnum3= document.getElementById('pnum3').value;
        var pnum4= document.getElementById('pnum4').value;

    $("#boton").click(function(){
        $.get("prueba_barr.php", {coche: "$pnum1", modelo: "Focus", color: "rojo"}, function(htmlexterno){
   $("#cargaexterna").html(htmlexterno);
            });
    });
});
</script>
     <!--este codigo era para la grafica que no se uso 2019-->
<body>
<style type="text/css">
.bg1 { background:#FF8080; color:#000; font-size:10px; }
.bg2 { background:#CCC; color:#000; font-size:10px; }

	table {width:100%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2; font-family:Arial;}
	th {padding:5px;background:#555;color:#fff; font-size: 0.8em;}
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
a
{
background-color: white;
color: black;
width: 13%;
border: 2px solid #4CAF50;
padding: 3px 20px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin-left: 20px;
line-height: 1.5;
font-family: Verdana,sans-serif;
}

a:hover, a:active {
    background-color: #069A12;
    color:white;
}
.image-source-link {
	color: #98C3D1;
}

.mfp-with-zoom .mfp-container,
.mfp-with-zoom.mfp-bg {
	opacity: 0;
	-webkit-backface-visibility: hidden;
	/* ideally, transition speed should match zoom duration */
	-webkit-transition: all 0.3s ease-out; 
	-moz-transition: all 0.3s ease-out; 
	-o-transition: all 0.3s ease-out; 
	transition: all 0.3s ease-out;
}

.mfp-with-zoom.mfp-ready .mfp-container {
		opacity: 1;
}
.mfp-with-zoom.mfp-ready.mfp-bg {
		opacity: 0.8;
}

.mfp-with-zoom.mfp-removing .mfp-container, 
.mfp-with-zoom.mfp-removing.mfp-bg {
	opacity: 0;
}

#table{	width:50%;margin: 0 auto;}
</style>

<?php
error_reporting(0);
include ("conexion.php");
$fecha1=$_POST['finicio'];
$fecha2=$_POST['ffin'];
$ia=0;$if=0;
//$ct=0; $cnt=0;
?>
<input type="image" src="images/reporte.png" name="imprimir" onclick="window.print(); return false;"/>

<input type="button" name="vt" id='vta' value='VER TABLA'><input type="button" name="vto" id="vto" value='VER TOTALES'><input type="button" name="btndet" id="btndet" value='DETALLES'><!--<a href="prueba_barr.php">grafica</a>--->
<strong><font size="+2" color="#FFFFFF"><center>DETALLES DE COMENTARIOS</center></font></strong>
<p></p>
<table border="1" align="center" id="tab">	
<tr class="bg4">
  <th>PEDIDO</th>
  <th>FECHA DE <br>COMENTARIOS <br>Ventas</th>
  <th>SOLICITO</th>
  <th>MATERIAL</th>
  <th>HORA VENTAS</th>
  <th width="10">HORA DE <br>RESPUESTA COMPRAS</th>
  <th>FECHA DE <br>COMENTARIOS <br>Compras</th>
  <th>TIEMPO DE <br>RESPUESTA</th>
  <th>ESTATUS</th>
  <th width="20"><img src="images/lupa.png" width="120%"></th>
</tr>

<?php
//////////////////////////////////////////PRIMERA TABLA QUE APARECE///////////////////////////////////////////
					 				
 $query = mysql_query("SELECT idpedido, fechac, hora FROM comentarios WHERE fechac>='$fecha1' AND fechac<='$fecha2' AND tipo='6' GROUP BY idpedido ASC ORDER BY fechac,hora ASC ");
 	
 $contador =mysql_num_rows($query);
if ($contador!=0)
{
 	while ($array=mysql_fetch_array($query))
 	{
 		$query2 = mysql_query("SELECT idpedido, fecha, hora FROM pedido WHERE fecha>='$fecha1' AND fecha<='$fecha2' GROUP BY idpedido ASC ORDER BY fecha,hora ASC  ");
 		while ($array2=mysql_fetch_array($query2))
 		{	 	
 			if($array[0]==$array2[0] )
 			{			
 					//SELECT AVG(nota) AS nota FROM notas;  <---[SACAR PROMEDIO]
						
					$hcom=$array[2];
					$hvent=$array2[2];					

					$hc = strtotime($hcom);
					$hv = strtotime($hvent);

					$hc = $hc / 60;
					$hv = $hv / 60;

					if($hc>$hv)
					{
						//$rest = $hc - $hv;
						$datetime1 = new DateTime($hcom);
						$datetime2 = new DateTime($hvent);
						$interval = $datetime1->diff($datetime2);
					}
					else
					{
						$datetime1 = new DateTime($hvent);
						$datetime2 = new DateTime($hcom);
						$interval = $datetime1->diff($datetime2);
					} 

 					$query4 = mysql_query("SELECT idpedido, solicito, tipo FROM pedido WHERE fecha>='$fecha1' AND fecha<='$fecha2'");
 					while ($array4=mysql_fetch_array($query4))
 					{
 						if($array[0]==$array4[0])
 						{
							$close=$array4[1];
							$t=$array4[2];	 								
 						}
 					}
 					//////////////////////////MATERIAL/////////////////////////////////////////////////
 					$q=mysql_query("SELECT idmaterial, flisto from pedmat where idpedido='$array2[0]' and flisto='0000-00-00'"); 
					while ($q1=mysql_fetch_array($q))
					{
					    $p=mysql_query("select material from material where id='$q1[0]'");
					    while ($p1=mysql_fetch_array($p))
					    {
					     	$t4=240;
					     	$t24=1440;
					     	$hv4 = $hv + $t4;
					     	$hv5 = $hv + $t24;
					     					
					if($p1[0]=='POLIETILENO ADS SANIPROPLUS' && $close!='INFORMACION' && $t!=1 )
					{
						
						if($hc>$hv5)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv5)
						{
							$r='A TIEMPO';
							$estilo='bg2';
							$ia=$ia+1;
						}
					}
					
					if($p1[0]=='POLIETILENO ADS SANIPROPLUS' && $close=='INFORMACION' && $t==1 )
					{
						
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$r='A TIEMPO';
							$estilo='bg2';
							$ia=$ia+1;
						}
					} 

    			 	if($q1[0]==1 && $array4[3]!='PIEZA ESPECIAL')
    			 	{
    			 		
    			 		if($hc>$hv4)
    			 		{
    			 			$r='FUERA DE TIEMPO';
    			 			$estilo='bg1';
    			 			$if=$if+1;
    			 		}
    			 		elseif($hc<$hv4)
    			 		{
    			 			$ia=$ia+1;
    			 			$r='A TIEMPO';
    			 			$estilo='bg2';
    			 		}
    			 	}
    			 	
    			 	if($q1[0]==2 && $array4[3]!='PIEZA ESPECIAL')
					{

						if($hc>$hv4 && $array[1]>$array2[1])
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							 //echo max($sum, -4); //returns -4
						}	
					}  

					if($q1[0]==5 && $close!='PIEZA ESPECIAL')//aqui encontre error jasiel
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
						
					if($q1[0]==6 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==9 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4 && $array[1]>$array2[1])
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==11 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4 && $array[1]>$array2[1])
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
						
					if($q1[0]==12 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==13 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==14 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
					
					if($q1[0]==15 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==17 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
					
					if($q1[0]==18 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==19 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
					
					if($q1[0]==22 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==23 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==24 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==8 && $close!='INFORMACION' && $t!=1 )
					{
						$hv4 = $hv + $t24;
						
						if($hc>$hv4)
						{

							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}
					if($q1[0]==8 && $close=='INFORMACION' && $t==1 )
					{
						$hv4 = $hv + $t4;
						
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 && $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}

					//////////////////////////MATERIAL//////////////////////////////////////////////////

					?>

						<tr class="<?php echo $estilo?>">
						<td><?php echo $array[0];?></td><td><?php echo $array2[1]?></td><td><?php echo $close; ?></td><td><?php echo $p1[0];?></td><td width="25"><?php echo $array2[2]; ?></td><td><?php echo $array[2] ?></td><td><?php echo $array[1]?></td><td><?php echo $interval->format('%a dias <br/> %h hrs <br/> %i min <br/> %s seg');?></td><td><?php echo $r;?></td>
						<td bgcolor="white" style="cursor: pointer" onmouseover="this.style.backgroundColor = '#06FD1D'" onmouseout="this.style.backgroundColor = '#eee'; ; this.style.color = '#000'" onclick="window.open('prueba/indexpop.php?idpedido=<?php echo $array[0];?>', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=400')">VER</td></tr> 						
 	
 						<?php


				    }

				}
 			}	
 		}		
 	}
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";	
 }
 echo "</table>"; 
 ?> 
<!--TABLA DE VER TOTALES/////////////////////////////////////////////////////////////////////////////////////-->
<p></p>
<table border="1" align="center" id="tabtot">
</tr>
<tr class="bg4">
  <th>SOLICITO</th>
  <th>MATERIAL</th>
  <th>FUERA DE TIEMPO</th>
  <th>A TIEMPO</th>
</tr>

 <?php					 				
 $query = mysql_query("SELECT idpedido, fechac, hora FROM comentarios WHERE fechac>='$fecha1' AND fechac<='$fecha2' AND tipo='6' GROUP BY idpedido ASC ORDER BY fechac,hora ASC ");
 	
 $contador =mysql_num_rows($query);

 //# Declarando las variables ESTO ES NUEVO 2019
 $_f_tiempo = 0;
 $_a_tiempo = 0;
if ($contador!=0)
{
 	while ($array=mysql_fetch_array($query))
 	{
 		$query2 = mysql_query("SELECT idpedido, fecha, hora FROM pedido WHERE fecha>='$fecha1' AND fecha<='$fecha2' GROUP BY idpedido ASC ORDER BY fecha,hora ASC  ");
 		while ($array2=mysql_fetch_array($query2))
 		{	 	
 			if($array[0]==$array2[0] )
 			{			
 					//SELECT AVG(nota) AS nota FROM notas;  <---[SACAR PROMEDIO]
						
					$hcom=$array[2];
					$hvent=$array2[2];					

					$hc = strtotime($hcom);
					$hv = strtotime($hvent);

					$hc = $hc / 60;
					$hv = $hv / 60;

					if($hc>$hv)
					{
						//$rest = $hc - $hv;
						$datetime1 = new DateTime($hcom);
						$datetime2 = new DateTime($hvent);
						$interval = $datetime1->diff($datetime2);
					}
					else
					{
						$datetime1 = new DateTime($hvent);
						$datetime2 = new DateTime($hcom);
						$interval = $datetime1->diff($datetime2);
					} 

 					$query4 = mysql_query("SELECT idpedido, solicito, tipo FROM pedido WHERE fecha>='$fecha1' AND fecha<='$fecha2'");
 					while ($array4=mysql_fetch_array($query4))
 					{
 						if($array[0]==$array4[0])
 						{
							$close=$array4[1];
							$t=$array4[2];	 								
 						}
 					}

 					//////////////////////////MATERIAL/////////////////////////////////////////////////
 					$q=mysql_query("SELECT idmaterial, flisto from pedmat where idpedido='$array2[0]' and flisto='0000-00-00' GROUP BY idmaterial asc"); 
					while ($q1=mysql_fetch_array($q))
					{
					    $p=mysql_query("select material from material where id='$q1[0]'");
					    while ($p1=mysql_fetch_array($p))
					    {
					     	$t4=240;
					     	$t24=1440;
					        $hv4 = $hv + $t4;
					     	$hv5 = $hv + $t24;
					     	$if=0;
					     	$ia=0;
					if($p1[0]=='POLIETILENO ADS SANIPROPLUS' && $close!='INFORMACION' && $t!=1 )
					{
						
						if($hc>$hv5)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv5)
						{
							$r='A TIEMPO';
							$estilo='bg2';
							$ia=$ia+1;
						}
					}
					
					if($p1[0]=='POLIETILENO ADS SANIPROPLUS' && $close=='INFORMACION' && $t==1 )
					{
						
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$r='A TIEMPO';
							$estilo='bg2';
							$ia=$ia+1;
						}
					} 

    			 	if($q1[0]==1 && $close!='PIEZA ESPECIAL')
    			 	{
    			 		if($hc>$hv4)
    			 		{
    			 			$r='FUERA DE TIEMPO';
    			 			$estilo='bg1';
    			 			$if=$if+1;
    			 		}
    			 		elseif($hc<$hv4)
    			 		{
    			 			$ia=$ia+1;
    			 			$r='A TIEMPO';
    			 			$estilo='bg2';
    			 		}
    			 	}
    			 	
    			 	if($q1[0]==2 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							 //echo $ia;
							 //echo max($sum, -4); //returns -4
						}	
					}  

					if($q1[0]==5 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
						
					if($q1[0]==6 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==9 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4 && $array[1]>$array2[1])
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 || $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
												
					if($q1[0]==11 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
						
					if($q1[0]==12 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==13 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==14 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
					
					if($q1[0]==15 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==17 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
					
					if($q1[0]==18 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==19 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
					
					if($q1[0]==22 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==23 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==24)
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==8 && $close!='INFORMACION' && $t!=1 )
					{
						$hv4 = $hv + $t24;
						
						if($hc>$hv4)
						{

							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}
					if($q1[0]==8 && $close=='INFORMACION' && $t==1 )
					{
						$hv4 = $hv + $t4;
						
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';

						}
					}
				?>
						<tr class="<?php echo $estilo?>">
							<td><?php echo $close;?></td>
							<td><?php echo $p1[0]; ?></td>
							<td><?php echo $if; ?></td>
							<td><?php echo $ia; ?></td>	
							<?php
                                //Sumamos ESTO ES NUEVO 2019
                                $_f_tiempo += $if; 
                                $_a_tiempo += $ia; 
                            ?>						
						</tr>
 					<?php
				    }

				}
 			}	
 		}		
 	}
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";
	 
 }
 echo "</table>";
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////
//echo "<br><br>";   ESTO SI FUNCIONA SI LO DESELECCIONAS
//echo "\"Fuera de tiempo\" total : ".$_f_tiempo;  ESTO SI FUNCIONA SI LO DESELECCIONAS
//echo "\"A tiempo\" total : ".$_a_tiempo;  ESTO SI FUNCIONA SI LO DESELECCIONAS
//ESTE CODIGO ES PRA GENERAR LA TABLA DE TOTALES Y LA GRAFICA
$total_entr= $_a_tiempo+$_f_tiempo;
$ia_porcen= (100*$_a_tiempo)/ $total_entr;
$if_porcen= 100 - $ia_porcen;
 ?>
<p></p>
  <table id="table">
  <tr>
    <td align="center">Entregas a Tiempo</td>
    <td><?php echo ($_a_tiempo);?></td>
     <td><?php echo round($ia_porcen);echo "%"?></td>
  </tr>
  <tr>
    <td align="center">Entregas Fuera de Tiempo</td>
    <td><?php echo ($_f_tiempo);?></td>
     <td><?php echo round($if_porcen);echo "%"?></td>
  </tr> 
  <tr>
    <td align="center">Total de Entregas</td>
    <td><?php echo ($total_entr);?></td>
   <td>
   	
   </td>
  </tr>  
</table>
<p></p>
<div id="container" style="min-width: 310px; height: 400px; width: 400px; margin:0 auto;
  background-color:#FFFFFF;"></div>
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'INDICADOR DE PEDIDO Y COTIZACIONES'
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>Entregas<br/>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,                
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Columna',
        colorByPoint: true,
        data: [{
            name: 'A Tiempo',
            y: <?php echo ($_a_tiempo);?>,
            //sliced: true,
            //selected: true
        }, {
            name: 'Fuera de Tiempo',
            y: <?php echo ($_f_tiempo);?>
        }, ]
    }]
});
</script>
<!--ESTE CODIGO ES PRA GENERAR LA TABLA DE TOTALES Y LA GRAFICA-->
 <?php
///////////////////////////////////////////////////////PENDIENTE////////////////////////////////////////
//////////////////////////////////////////PARA GRAFICA//////////////////////////////////////////////////				 				
 $query = mysql_query("SELECT idpedido, fechac, hora FROM comentarios WHERE fechac>='$fecha1' AND fechac<='$fecha2' AND tipo='6' GROUP BY idpedido ASC ORDER BY fechac,hora ASC ");
 	
 $contador =mysql_num_rows($query);
if ($contador!=0)
{
 	while ($array=mysql_fetch_array($query))
 	{
 		$query2 = mysql_query("SELECT idpedido, fecha, hora FROM pedido WHERE fecha>='$fecha1' AND fecha<='$fecha2' GROUP BY idpedido ASC ORDER BY fecha,hora ASC  ");
 		while ($array2=mysql_fetch_array($query2))
 		{	 	
 			if($array[0]==$array2[0] )
 			{			
 					//SELECT AVG(nota) AS nota FROM notas;  <---[SACAR PROMEDIO]
						
					$hcom=$array[2];
					$hvent=$array2[2];					

					$hc = strtotime($hcom);
					$hv = strtotime($hvent);

					$hc = $hc / 60;
					$hv = $hv / 60;

					if($hc>$hv)
					{
						//$rest = $hc - $hv;
						$datetime1 = new DateTime($hcom);
						$datetime2 = new DateTime($hvent);
						$interval = $datetime1->diff($datetime2);
					}
					else
					{
						$datetime1 = new DateTime($hvent);
						$datetime2 = new DateTime($hcom);
						$interval = $datetime1->diff($datetime2);
					} 

 					$query4 = mysql_query("SELECT idpedido, solicito, tipo FROM pedido WHERE fecha>='$fecha1' AND fecha<='$fecha2'");
 					while ($array4=mysql_fetch_array($query4))
 					{
 						if($array[0]==$array4[0])
 						{
							$close=$array4[1];
							$t=$array4[2];	 								
 						}
 					}

 					//////////////////////////MATERIAL/////////////////////////////////////////////////
 					$q=mysql_query("SELECT idmaterial, flisto from pedmat where idpedido='$array2[0]' and flisto='0000-00-00' GROUP BY idmaterial asc"); 
					while ($q1=mysql_fetch_array($q))
					{
					     	$t4=240;
					     	$t24=1440;
					        $hv4 = $hv + $t4;
					     	$hv5 = $hv + $t24;
					     	$if=0;
					     	$ia=0;
					if($q1[0]==8 && $close!='INFORMACION' && $t!=1 )
					{
						
						if($hc>$hv5)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv5)
						{
							$r='A TIEMPO';
							$estilo='bg2';
							$ia=$ia+1;
						}
					}
					
					if($q1[0]==8 && $close=='INFORMACION' && $t==1 )
					{
						
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$r='A TIEMPO';
							$estilo='bg2';
							$ia=$ia+1;
						}
					} 

    			 	if($q1[0]==1 && $close!='PIEZA ESPECIAL')
    			 	{
    			 		if($hc>$hv4)
    			 		{
    			 			$r='FUERA DE TIEMPO';
    			 			$estilo='bg1';
    			 			$if=$if+1;
    			 		}
    			 		elseif($hc<$hv4)
    			 		{
    			 			$ia=$ia+1;
    			 			$r='A TIEMPO';
    			 			$estilo='bg2';
    			 		}
    			 	}
    			 	
    			 	if($q1[0]==2 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
							 //echo $ia;
							 //echo max($sum, -4); //returns -4
						}	
					}  

					if($q1[0]==5 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
						
					if($q1[0]==6 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==9 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4 && $array[1]>$array2[1])
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4 || $array[1]<=$array2[1])
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
												
					if($q1[0]==11 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
						
					if($q1[0]==12 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==13 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
						
					if($q1[0]==14 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';	
						}
					}  
					
					if($q1[0]==15 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==17 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
					
					if($q1[0]==18 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==19 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}  
					
					if($q1[0]==22 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==23 && $close!='PIEZA ESPECIAL')
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==24)
					{
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}   
						
					if($q1[0]==8 && $close!='INFORMACION' && $t!=1 )
					{
						$hv4 = $hv + $t24;
						
						if($hc>$hv4)
						{

							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';
						}
					}
					if($q1[0]==8 && $close=='INFORMACION' && $t==1 )
					{
						$hv4 = $hv + $t4;
						
						if($hc>$hv4)
						{
							$r='FUERA DE TIEMPO';
							$estilo='bg1';
							$if=$if+1;
						}
						elseif($hc<$hv4)
						{
							$ia=$ia+1;
							$r='A TIEMPO';
							$estilo='bg2';

						}
					}
					?>
						<input type="hidden" id="pnum1" value="<?php echo $close;?> " />
    					<input type="hidden" id="pnum2" value="<?php echo $if; ?>" />
    					<input type="hidden" id="pnum" value="<?php echo $ia; ?> " />
 					<?php
				}
 			}	
 		}		
 	}
 }
 else
 {
	 echo "<tr><td>No hay registros</td></tr></table>";	
 }
 echo "</table>";
 ?> 
      <!--ESTA ES LA IMAGEN DE DETALLE-->
      <img name="det" id='det'src="images/detalles_indicomp.jpg" style="width: 100%; height: 100%;"/>
    
    