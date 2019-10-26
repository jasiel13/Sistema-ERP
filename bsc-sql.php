
<head>
        <link rel="stylesheet" href="css/bsc.css" type="text/css" media="all"/>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
      <script>
$(document).ready(function()
{           
        var pnum1= document.getElementById('pnum1').value;
        var pnum2= document.getElementById('pnum2').value;
        var pnum3= document.getElementById('pnum3').value;
        var pnum4= document.getElementById('pnum4').value;

    $("#boton").click(function(){
        $.get("prueba.php", {coche: "$pnum1", modelo: "Focus", color: "rojo"}, function(htmlexterno){
   $("#cargaexterna").html(htmlexterno);
            });
    });
});
     </script>
<title>Grafica</title>

<?php
error_reporting(0);

 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i'); 

//Primero leemos los datos enviados
//por el formulario
/*$v1 = $_POST['v1'];
$v2 = $_POST['v2'];
$v3 = $_POST['v3'];*/
$finicio=$_POST['finicio'];
$ffin=$_POST['ffin'];
$ven=$_POST['ven'];
$option=$_POST['opt'];


   //$lffin=$finicio;
   //$lfinicio=$ffin;

   //$li = strtotime($lfinicio);
   //$lf = strtotime($lffin);
   //$li = $li / 60;
   //$lf = $lf / 60;  

  $dias = (strtotime($finicio)-strtotime($ffin))/86400;
  $dias   = abs($dias); $dias = floor($dias); 

 include ('conexion.php');
    $sql=mysql_query("select max_mes, max_semana, max_dia from limites order by fecha ");
    while($sq1=mysql_fetch_array($sql))
    {
    $mm= $sq1[0];
    $ms= $sq1[1];
    $md= $sq1[2];
    }
    $sdls=mysql_query("select fecha, valor from tipo_de_cambio order by fecha ");
    while($sq1=mysql_fetch_array($sdls))
    {
    $vdls= $sq1[1];
    echo "<u>Tipo de cambio: $".$vdls."</u>";
    }

?>
<FONT FACE="arial">
</head>

<strong><font size="+2" color="#800040"><center>PERIODO EVALUADO </center></font></strong>
<font size="+2" color="#800040"><center>Del: <?php echo $finicio;?> al <?php echo $ffin;?> </center></font>
<p></p>
    

<?php  

    if($dias<=7 && $dias>=4)
//***************************************** CONDICION POR "DIA" ********************************
  {
        $mar = $finicio;
        $mar = strtotime ( '+1 day' , strtotime ( $mar ) ) ;
        $mar = date ( 'Y-m-j' , $mar );
        echo $mar;
        echo "<br>";
        
        $mie = $finicio;
        $mie = strtotime ( '+2 day' , strtotime ( $mie ) ) ;
        $mie = date ( 'Y-m-j' , $mie );
        echo $mie;
        echo "<br>";
        
        $jue = $finicio;
        $jue = strtotime ( '+3 day' , strtotime ( $jue ) ) ;
        $jue = date ( 'Y-m-j' , $jue );
        echo $jue;
        echo "<br>";

        $vie = $finicio;
        $vie = strtotime ( '+4 day' , strtotime ( $vie ) ) ;
        $vie = date ( 'Y-m-j' , $vie );
        echo $vie;

        echo "<br>";

//***************************************** Tabla POR "DIA" ********************************    
 include ('conexion.php');
    

    $sql1=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura= '$finicio' AND estado!='CANCELADA' AND tipopago!='CREDITO' ");
    while($sq1=mysql_fetch_array($sql1))
    {
    $trdls1= $trdls1+$sq1[2] * $vdls;
    $tr1= $tr1+$trdls1+$sq1[1];
    $por1= $tr1/$tp * 100;
    }


    $sql2=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura='$mar' AND estado!='CANCELADA' AND tipopago!='CREDITO' ");
    while($sq2=mysql_fetch_array($sql2))
    {
    $trdls2= $trdls2+$sq2[2] * $vdls;
    $tr2= $tr2+$trdls2+$sq2[1];
    $por2= $tr2/$tp * 100;
    }   
    
    $sql3=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura='$mie' AND estado!='CANCELADA' AND tipopago!='CREDITO' ");
    while($sq3=mysql_fetch_array($sql3))
    {
    $trdls3= $trdls3+$sq3[2] * $vdls;
    $tr3= $tr3+$trdls3+$sq3[1];
    $por3= $tr3/$tp * 100;
    }

    $sql4=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura='$jue' AND fechafactura<= '$ffin' AND estado!='CANCELADA' AND tipopago!='CREDITO' ");
    while($sq4=mysql_fetch_array($sql4))
    {
    $trdls4= $trdls4+$sq4[2] * $vdls;
    $tr4= $tr4+$trdls4+$sq4[1];
    $por4= $tr4/$tp * 100;
    }

    $sql5=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura='$vie' AND fechafactura<= '$ffin' AND estado!='CANCELADA' AND tipopago!='CREDITO' ");
    while($sq5=mysql_fetch_array($sql5))
    {
    $trdls5= $trdls5+$sq5[2] * $vdls;
    $tr5= $tr5+$trdls5+$sq5[1];
    $por5= $tr5/$tp * 100;
    }

    $sql6=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura='$ffin' AND fechafactura<= '$ffin' AND estado!='CANCELADA' AND tipopago!='CREDITO' ");
    while($sq6=mysql_fetch_array($sql6))
    {
    $trdls6= $trdls6+$sq6[2] * $vdls;
    $tr6= $tr6+$trdls6+$sq6[1];
    $por6= $tr6/$tp * 100;
    }

    $tpre= $md * 6 + 60000; 
    $treal= $tr1 + $tr2 + $tr3 + $tr4 + $tr5 + $tr6; 
    $totvs= $treal/$tpre * 100;

  

    echo "<center>DIAS ".$dias." contados entre el rango de fechas</center>"; 

        echo "<strong>360,000.00 x Dia </strong><br>";
        echo "<strong>360,000.00 Semana </strong>";
        echo"<hr> <hr>";

        echo "<table border='1' align='center'>";
          
          echo "<tr class='bg0'>";
            echo "<td colspan='9'><center><strong>PROYECCION DE VENTAS </strong></center></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td colspan='7'></td>";
          echo "</tr>";

          echo "<tr class='bg0'>";
            echo "<td width='15%'>#</td>";
            echo "<td width='8%'><strong>Lunes</strong></td>";
            echo "<td width='8%'><strong>Martes</strong></td>";
            echo "<td width='8%'><strong>Miercoles</strong></td>";
            echo "<td width='8%'><strong>Jueves</strong></td>";
            echo "<td width='8%'><strong>Viernes</strong></td>";
            echo "<td width='8%'><strong>Sabado</strong></td>";
            echo "<td width='8%'>Rendimiento total</td>";
            echo "<td class='w' rowspan='4' width='25%' style='CURSOR:Hand;' onmouseover=this.style.backgroundColor='#009023' onmouseout=this.style.backgroundColor='white'> <center><input type='image' src='images/A.jpg' height='128' width='198' /></center></td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Previsto</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($tpre,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real</td>";
            echo "<td>".number_format($tr1,2)."</td>";
            echo "<td>".number_format($tr2,2)."</td>";
            echo "<td>".number_format($tr3,2)."</td>";
            echo "<td>".number_format($tr4,2)."</td>";
            echo "<td>".number_format($tr5,2)."</td>";
            echo "<td>".number_format($tr6,2)."</td>";
            echo "<td>".number_format($treal,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real vs Previsto (%)</td>";
            echo "<td>".number_format($por1)."%</td>";
            echo "<td>".number_format($por2)."%</td>";
            echo "<td>".number_format($por3)."%</td>";
            echo "<td>".number_format($por4)."%</td>";
            echo "<td>".number_format($por5)."%</td>";
            echo "<td>".number_format($por6)."%</td>";
            if ($totvs<=40)
            {
            echo "<td class='r'> ".number_format($totvs)."%</td>";
            }
            if ($totvs>40 && $totvs<80)
            {
              echo "<td class='a'> ".number_format($totvs)."%</td>"; 
            }
            if ($totvs>80 && $totvs<=100)
            {
              echo "<td class='v'> ".number_format($totvs)."%</td>"; 
            } 
            if ($totvs>100)
            {
              echo "<td class='v'> ".number_format($totvs)."%</td>"; 
            }         
          echo "</tr>";
          echo "</table>";

//***************************************** TABLA DE "CARTERA" ****************************************
    $sqlcre1=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura= '$finicio' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqcre1=mysql_fetch_array($sqlcre1))
    {
    $tcdls1= $tcdls1+$sqcre1[2] * $vdls;
    $trc1= $trc1+$tcdls1+$sqcre1[1];
    $porcre1= $trc1/$md * 100;
    }


    $sql2=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura='$mar' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sq2=mysql_fetch_array($sql2))
    {
    $tcdls2= $tcdls2+$sq2[2] * $vdls;    
    $trc2= $trc2+$tcdls2+$sq2[1];
    $porcre2= $trc2/$md * 100;
    }   
    
    $sql3=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura='$mie' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sq3=mysql_fetch_array($sql3))
    {
    $tcdls3= $tcdls3+$sq3[2] * $vdls;    
    $trc3= $trc3+$tcdls3+$sq3[1];
    $porcre3= $trc3/$md * 100;
    }

    $sql4=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura='$jue' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sq4=mysql_fetch_array($sql4))
    {
    $tcdls4= $tcdls4+$sq4[2] * $vdls;
    $trc4= $trc4+$tcdls4+$sq4[1];
    $porcre4= $trc4/$md * 100;
    }
    $sql5=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura='$vie' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sq5=mysql_fetch_array($sql5))
    {
    $tcdls5= $tcdls5+$sq5[2] * $vdls;
    $trc5= $trc5+$tcdls5+$sq5[1];
    $porcre5= $trc5/$md * 100;
    }
        $sql6=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura='$ffin' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sq6=mysql_fetch_array($sql6))
    {
    $tcdls6= $tcdls6+$sq6[2] * $vdls;    
    $trc6= $trc6+$tcdls6+$sq6[1];
    $porcre6= $trc6/$md * 100;
    }

    $tcpre= $md * 6 + 60000; 
    $tcreal= $trc1 + $trc2 + $trc3 + $trc4 + $trc5 + $trc6; 
    $ctotvs= $tcreal/$tcpre * 100;

        echo "<table border='1' align='center'>";
          echo "<br>";

          echo "<tr class='bg0'>";
            echo "<td colspan='9'><center>CRECIMIENTO DE CARTERA</center></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td colspan='7'></td>";
          echo "</tr>";

          echo "<tr class='bg0'>";
            echo "<td width='13%'>#</td>";
            echo "<td width='8%'>Lunes</td>";
            echo "<td width='8%'>Martes</td>";
            echo "<td width='8%'>Miercoles</td>";
            echo "<td width='8%'>Jueves</td>";
            echo "<td width='8%'>Viernes</td>";
            echo "<td width='8%'>Sabado</td>";
            echo "<td width='8%'>Rendimiento total</td>";
            echo "<td class='w' rowspan='4' width='25%' style='CURSOR:Hand;' onmouseover=this.style.backgroundColor='#009023' onmouseout=this.style.backgroundColor='white'> <center><input type='image' src='images/A.jpg' height='128' width='198' /></center></td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Previsto</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($md,2)."</td>";
            echo "<td>".number_format($tcpre,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real</td>";
            echo "<td>".number_format($trc1,2)."</td>";
            echo "<td>".number_format($trc2,2)."</td>";
            echo "<td>".number_format($trc3,2)."</td>";
            echo "<td>".number_format($trc4,2)."</td>";
            echo "<td>".number_format($trc5,2)."</td>";
            echo "<td>".number_format($trc6,2)."</td>";
            echo "<td>".number_format($tcreal,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real vs Previsto (%)</td>";
            echo "<td>".number_format($porcre1)."%</td>";
            echo "<td>".number_format($porcre2)."%</td>";
            echo "<td>".number_format($porcre3)."%</td>";
            echo "<td>".number_format($porcre4)."%</td>";
            echo "<td>".number_format($porcre5)."%</td>";
            echo "<td>".number_format($porcre6)."%</td>";
            if ($ctotvs<=40)
            {
            echo "<td class='r'> ".number_format($ctotvs)."%</td>";
            }
            if ($ctotvs>40 && $ctotvs<80)
            {
              echo "<td class='a'> ".number_format($ctotvs)."%</td>"; 
            }
            if ($ctotvs>80 && $ctotvs<=100)
            {
              echo "<td class='v'> ".number_format($ctotvs)."%</td>"; 
            } 
            if ($ctotvs>100)
            {
              echo "<td class='v'> ".number_format($ctotvs)."%</td>"; 
            }         
          echo "</tr>";
          echo "</table>";
          echo "<br>";
  }
//************************************************************************
    if($dias<=31 && $dias>=28)
//***************************************** CONDICION POR "SEMANA" ********************************
  {

        //***************************************** "OPERACIONES" ****************************************
    

        $semc1 = $finicio;
        $semc1 = strtotime ( '-182 day' , strtotime ( $semc1 ) ) ;
        $semc1 = date ( 'Y-m-j' , $semc1 );
        //echo $semc1;

        $sem1 = $finicio;
        $sem1 = strtotime ( '+7 day' , strtotime ( $sem1 ) ) ;
        $sem1 = date ( 'Y-m-j' , $sem1 );
        
          $sem2 = $finicio;
        $sem2 = strtotime ( '+14 day' , strtotime ( $sem2 ) ) ;
        $sem2 = date ( 'Y-m-j' , $sem2 );
        
          $sem3 = $finicio;
        $sem3 = strtotime ( '+21 day' , strtotime ( $sem3 ) ) ;
        $sem3 = date ( 'Y-m-j' , $sem3 );

//***************************************** TABLA DE "PROYECCION DE VENTAS" *********************************
    include ('conexion.php');
    $sql1=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>= '$finicio' AND fechafactura<= '$sem1' AND estado!='CANCELADA' ");
    while($sq1=mysql_fetch_array($sql1))
    {
    $trdls1= $trdls1+$sq1[2] * $vdls;
    $tr1= $tr1+$trdls1+$sq1[1];
    $por1= $tr1/$ms * 100;
    }


    $sql2=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>'$sem1' AND fechafactura<= '$sem2' AND estado!='CANCELADA' ");
    while($sq2=mysql_fetch_array($sql2))
    {
    $trdls2= $trdls2+$sq2[2] * $vdls;
    $tr2= $tr2+$trdls2+$sq2[1];
    $por2= $tr2/$ms * 100;
    }   
    
    $sql3=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>'$sem2' AND fechafactura<= '$sem3' AND estado!='CANCELADA' ");
    while($sq3=mysql_fetch_array($sql3))
    {
    $trdls3= $trdls3+$sq3[2] * $vdls;
    $tr3= $tr3+$trdls3+$sq3[1];
    $por3= $tr3/$ms * 100;
    }

    $sql4=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>'$sem3' AND fechafactura<= '$ffin' AND estado!='CANCELADA' ");
    while($sq4=mysql_fetch_array($sql4))
    {
    $trdls4= $trdls4+$sq4[2] * $vdls;
    $tr4= $tr4+$trdls4+$sq4[1];
    $por4= $tr4/$ms * 100;
    }
    $tpre= $ms * 4 + 600000; 
    $treal= $tr1 + $tr2 + $tr3 + $tr4; 
    $totvs= $treal/$tpre * 100;

    echo "<center> 'Balanced Scorecard Ventas' </center>"; 
        
        echo "<strong>".number_format($ms,2)." x Semana </strong><br>";
        echo "<strong>".number_format($tpre,2)." Mensual</strong>";
        echo"<hr> <hr>";

        echo "<table border='1' align='center'>";
          
          echo "<tr class='bg0'>";
            echo "<td colspan='7'><center><strong>PROYECCION DE VENTAS </strong></center></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td colspan='7'></td>";
          echo "</tr>";

          echo "<tr class='bg0'>";
            echo "<td width='13%'>#</td>";
            echo "<td width='8%'>Semana 1</td>";
            echo "<td width='8%'>Semana 2</td>";
            echo "<td width='8%'>Semana 3</td>";
            echo "<td width='8%'>Semana 4</td>";
            echo "<td width='8%'>Rendimiento total</td>";
            echo "<td class='w' rowspan='4' width='25%' style='CURSOR:Hand;' onmouseover=this.style.backgroundColor='#009023' onmouseout=this.style.backgroundColor='white'> <center><input type='image' src='images/A.jpg' height='128' width='198' /></center></td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Previsto</td>";
            echo "<td>".number_format($ms,2)."</td>";
            echo "<td>".number_format($ms,2)."</td>";
            echo "<td>".number_format($ms,2)."</td>";
            echo "<td>".number_format($ms,2)."</td>";
            echo "<td>".number_format($tpre,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real</td>";
            echo "<td>".number_format($tr1,2)."</td>";
            echo "<td>".number_format($tr2,2)."</td>";
            echo "<td>".number_format($tr3,2)."</td>";
            echo "<td>".number_format($tr4,2)."</td>";
            echo "<td>".number_format($treal,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real vs Previsto (%)</td>";
            echo "<td>".number_format($por1)."%</td>";
            echo "<td>".number_format($por2)."%</td>";
            echo "<td>".number_format($por3)."%</td>";
            echo "<td>".number_format($por4)."%</td>";
            if ($totvs<=40)
            {
            echo "<td class='r'> ".number_format($totvs)."%</td>";
            }
            if ($totvs>40 && $totvs<80)
            {
              echo "<td class='a'> ".number_format($totvs)."%</td>"; 
            }
            if ($totvs>80 && $totvs<=100)
            {
              echo "<td class='v'> ".number_format($totvs)."%</td>"; 
            } 
            if ($totvs>100)
            {
              echo "<td class='v'> ".number_format($totvs)."%</td>"; 
            }         
          echo "</tr>";
          echo "</table>";

//***************************************** TABLA DE "CARTERA" ****************************************

    $sqlcre1=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura>= '$finicio' AND fechafactura<= '$sem1' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqcre1=mysql_fetch_array($sqlcre1))
    {

    $tpc1= $tpc1+$sqcre1[2] * $vdls; 
    $trc1= $trc1+$tpc1+$sqcre1[1];
    $porcre1= $trc1/$tpc1 * 100;
    }


    $sql2=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura>'$sem1' AND fechafactura<= '$sem2' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sq2=mysql_fetch_array($sql2))
    {
    $tpc2= $tpc2+$sq2[2] * $vdls;
    $trc2= $trc2+$tpc2+$sq2[1];
    $porcre2= $trc2/$tpc2 * 100;
    }   
    
    $sql3=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura>'$sem2' AND fechafactura<= '$sem3' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sq3=mysql_fetch_array($sql3))
    {
    $tpc3= $tpc3+$sq3[2] * $vdls;
    $trc3= $trc3+$tpc3+$sq3[1];
    $porcre3= $trc3/$tpc3 * 100;
    }

    $sql4=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura>'$sem3' AND fechafactura<= '$ffin' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sq4=mysql_fetch_array($sql4))
    {
    $tpc4= $tpc4+$sq4[2] * $vdls;
    $trc4= $trc4+$tpc4+$sq4[1];
    $porcre4= $trc4/$tpc4 * 100;
    }

    $tcpre= $ms * 4 + 600000; 
    $tcreal= $trc1 + $trc2 + $trc3 + $trc4; 
    $ctotvs= $tcreal/$tcpre * 100;

        echo "<table border='1' align='center'>";
          echo "<br>";

          echo "<tr class='bg0'>";
            echo "<td colspan='7'><center><strong>CRECIMIENTO DE CARTERA</strong></center></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td colspan='7'></td>";
          echo "</tr>";

          echo "<tr class='bg0'>";
            echo "<td width='13%'>#</td>";
            echo "<td width='8%'>Semana 1</td>";
            echo "<td width='8%'>Semana 2</td>";
            echo "<td width='8%'>Semana 3</td>";
            echo "<td width='8%'>Semana 4</td>";
            echo "<td width='8%'>Rendimiento total</td>";
            echo "<td class='w' rowspan='4' width='25%' style='CURSOR:Hand;' onmouseover=this.style.backgroundColor='#009023' onmouseout=this.style.backgroundColor='white'> <center><input type='image' src='images/A.jpg' height='128' width='198' /></center></td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Previsto</td>";
            echo "<td>".number_format($ms,2)."</td>";
            echo "<td>".number_format($ms,2)."</td>";
            echo "<td>".number_format($ms,2)."</td>";
            echo "<td>".number_format($ms,2)."</td>";
            echo "<td>".number_format($tcpre,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real</td>";
            echo "<td>".number_format($trc1,2)."</td>";
            echo "<td>".number_format($trc2,2)."</td>";
            echo "<td>".number_format($trc3,2)."</td>";
            echo "<td>".number_format($trc4,2)."</td>";
            echo "<td>".number_format($tcreal,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real vs Previsto (%)</td>";
            echo "<td>".number_format($porcre1)."%</td>";
            echo "<td>".number_format($porcre2)."%</td>";
            echo "<td>".number_format($porcre3)."%</td>";
            echo "<td>".number_format($porcre4)."%</td>";
            if ($ctotvs<=40)
            {
            echo "<td class='r'> ".number_format($ctotvs)."%</td>";
            }
            if ($ctotvs>40 && $ctotvs<80)
            {
              echo "<td class='a'> ".number_format($ctotvs)."%</td>"; 
            }
            if ($ctotvs>80 && $ctotvs<=100)
            {
              echo "<td class='v'> ".number_format($ctotvs)."%</td>"; 
            } 
            if ($ctotvs>100)
            {
              echo "<td class='v'> ".number_format($ctotvs)."%</td>"; 
            }         
          echo "</tr>";
          echo "</table>";

          echo "<br>";

  }
//*************************************************************************
    if($dias<=366 && $dias>=364)

//***************************************** CONDICION POR "MES" ********************************
  {


        //***************************************** "OPERACIONES" ****************************************

        $ene = $finicio;
        $ene = strtotime ( '+30 day' , strtotime ( $ene ) ) ;
        $ene = date ( 'Y-m-j' , $ene );
        echo $finicio ." |enero| ".$ene;
        echo "<br>";



                  $ifeb = $finicio;
        $ifeb = strtotime ( '+31 day' , strtotime ( $ifeb ) ) ;
        $ifeb = date ( 'Y-m-j' , $ifeb );
                    $ffeb = $finicio;
        $ffeb = strtotime ( '+59 day' , strtotime ( $ffeb ) ) ;
        $ffeb = date ( 'Y-m-j' , $ffeb );
        echo $ifeb ." |febrero| ".$ffeb;
        echo "<br>";
        

                  $imar = $finicio;
        $imar = strtotime ( '+60 day' , strtotime ( $imar ) ) ;
        $imar = date ( 'Y-m-j' , $imar );
          $fmar = $finicio;
        $fmar = strtotime ( '+90 day' , strtotime ( $fmar ) ) ;
        $fmar = date ( 'Y-m-j' , $fmar );
        echo $imar ." |marzo| ".$fmar ;
        echo "<br>";


                  $iabr = $finicio;
        $iabr = strtotime ( '+91 day' , strtotime ( $iabr ) ) ;
        $iabr = date ( 'Y-m-j' , $iabr );
                          $fabr = $finicio;
        $fabr = strtotime ( '+120 day' , strtotime ( $fabr ) ) ;
        $fabr = date ( 'Y-m-j' , $fabr );
                echo $iabr ." |abril| ".$fabr ;
        echo "<br>";


                  $imay = $finicio;
        $imay = strtotime ( '+121 day' , strtotime ( $imay ) ) ;
        $imay = date ( 'Y-m-j' , $imay );
                          $fmay = $finicio;
        $fmay = strtotime ( '+151 day' , strtotime ( $fmay ) ) ;
        $fmay = date ( 'Y-m-j' , $fmay );
        echo $imay ." |mayo| ".$fmay ;
        echo "<br>";


                  $ijun = $finicio;
        $ijun = strtotime ( '+152 day' , strtotime ( $ijun ) ) ;
        $ijun = date ( 'Y-m-j' , $ijun );
                  $fjun = $finicio;
        $fjun = strtotime ( '+181 day' , strtotime ( $fjun ) ) ;
        $fjun = date ( 'Y-m-j' , $fjun );
        echo $ijun ." |junio| ".$fjun ;
        echo "<br>";


                  $ijul = $finicio;
        $ijul = strtotime ( '+182 day' , strtotime ( $ijul ) ) ;
        $ijul = date ( 'Y-m-j' , $ijul );
                  $fjul = $finicio;
        $fjul = strtotime ( '+212 day' , strtotime ( $fjul ) ) ;
        $fjul = date ( 'Y-m-j' , $fjul );
        echo $ijul ." |julio| ".$fjul ;
        echo "<br>";


                  $iago = $finicio;
        $iago = strtotime ( '+213 day' , strtotime ( $iago ) ) ;
        $iago = date ( 'Y-m-j' , $iago );
                  $fago = $finicio;
        $fago = strtotime ( '+243 day' , strtotime ( $fago ) ) ;
        $fago = date ( 'Y-m-j' , $fago );
        echo $iago ." |agosto| ".$fago ;
        echo "<br>";


                  $isep = $finicio;
        $isep = strtotime ( '+244 day' , strtotime ( $isep ) ) ;
        $isep = date ( 'Y-m-j' , $isep );
                          $fsep = $finicio;
        $fsep = strtotime ( '+273 day' , strtotime ( $fsep ) ) ;
        $fsep = date ( 'Y-m-j' , $fsep );
        echo $isep ." |septiembre| ".$fsep ;
        echo "<br>";


                  $ioct = $finicio;
        $ioct = strtotime ( '+274 day' , strtotime ( $ioct ) ) ;
        $ioct = date ( 'Y-m-j' , $ioct );
                          $foct = $finicio;
        $foct = strtotime ( '+304 day' , strtotime ( $foct ) ) ;
        $foct = date ( 'Y-m-j' , $foct );
        echo $ioct ." |octubre| ".$foct ;
        echo "<br>";


                  $inov = $finicio;
        $inov = strtotime ( '+305 day' , strtotime ( $inov ) ) ;
        $inov = date ( 'Y-m-j' , $inov );
                          $fnov = $finicio;
        $fnov = strtotime ( '+334 day' , strtotime ( $fnov ) ) ;
        $fnov = date ( 'Y-m-j' , $fnov );
        echo $inov ." |noviembre| ".$fnov ;
        echo "<br>";

                  $dic = $finicio;
        $dic = strtotime ( '+335 day' , strtotime ( $dic ) ) ;
        $dic = date ( 'Y-m-j' , $dic );
        echo $dic;
        echo "<br>";


        echo $ffin; 
        echo "<br>";

//***************************************** TABLA DE "PROYECCION DE VENTAS" *********************************
    

    include ('conexion.php');
    $sql1=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>= '$finicio' AND fechafactura<='$ene' AND estado!='CANCELADA' ");
    while($sq1=mysql_fetch_array($sql1))
    {
    $trdls1= $trdls1+$sq1[2] * $vdls;
    $tr1= $tr1+$$trdls1+$sq1[1];
    $por1= $tr1/$mm * 100;
    }


    $sql2=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$ifeb' AND fechafactura<='$ffeb' AND estado!='CANCELADA' ");
    while($sq2=mysql_fetch_array($sql2))
    {
    $trdls2= $trdls2+$sq1[2] * $vdls;;
    $tr2= $tr2+$sq2[1];
    $por2= $tr2/$mm * 100;
    }   
    
    $sql3=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$imar' AND fechafactura<='$fmar' AND estado!='CANCELADA' ");
    while($sq3=mysql_fetch_array($sql3))
    {
    $trdls3= $trdls3+$sq3[2] * $vdls;;
    $tr3= $tr3+$sq3[1];
    $por3= $tr3/$mm * 100;
    }

    $sql4=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$iabr' AND fechafactura<='$fabr' AND estado!='CANCELADA' ");
    while($sq4=mysql_fetch_array($sql4))
    {
    $trdls4= $trdls4+$sq4[2] * $vdls;;
    $tr4= $tr4+$sq4[1];
    $por4= $tr4/$mm * 100;
    }

    $sql5=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$imay' AND fechafactura<='$fmay' AND estado!='CANCELADA' ");
    while($sq5=mysql_fetch_array($sql5))
    {
    $trdls5= $trdls5+$sq5[2] * $vdls;;
    $tr5= $tr5+$sq5[1];
    $por5= $tr5/$mm * 100;
    }

    $sql6=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$ijun' AND fechafactura<='$fjun' AND estado!='CANCELADA' ");
    while($sq6=mysql_fetch_array($sql6))
    {
    $trdls6= $trdls6+$sq6[2] * $vdls;;
    $tr6= $tr6+$sq6[1];
    $por6= $tr6/$mm * 100;
    }

    $sql7=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$ijul' AND fechafactura<='$fjul' AND estado!='CANCELADA' ");
    while($sq7=mysql_fetch_array($sql7))
    {
    $trdls7= $trdls7+$sq7[2] * $vdls;;
    $tr7= $tr7+$sq7[1];
    $por7= $tr7/$mm * 100;
    }

    $sql8=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$iago' AND fechafactura<='$fago' AND estado!='CANCELADA' ");
    while($sq8=mysql_fetch_array($sql8))
    {
    $trdls8= $trdls8+$sq8[2] * $vdls;;
    $tr8= $tr8+$sq8[1];
    $por8= $tr8/$mm * 100;
    }

    $sql9=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$isep' AND fechafactura<='$fsep' AND estado!='CANCELADA' ");
    while($sq9=mysql_fetch_array($sql9))
    {
    $trdls9= $trdls9+$sq9[2] * $vdls;;
    $tr9= $tr9+$trdls9+$sq9[1];
    $por9= $tr9/$mm * 100;
    }

        $sql10=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$ioct' AND fechafactura<='$foct' AND estado!='CANCELADA' ");
    while($sq10=mysql_fetch_array($sql10))
    {
    $trdls10= $trdls10+$sq10[2] * $vdls;
    $tr10= $tr10+$trdls10+$sq10[1];
    $por10= $tr10/$mm * 100;
    }

        $sql11=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$inov' AND fechafactura<='$fnov' AND estado!='CANCELADA' ");
    while($sq11=mysql_fetch_array($sql11))
    {
    $trdls11= $trdls11+$sq11[2] * $vdls;
    $tr11= $tr11+$trdls11+$sq11[1];
    $por11= $tr11/$mm * 100;
    }

        $sql12=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$dic' AND fechafactura<='$ffin' AND estado!='CANCELADA' ");
    while($sq12=mysql_fetch_array($sql12))
    {
    $trdls12= $trdls12+$sq12[2] * $vdls;
    $tr12= $tr12+$trdls12+$sq12[1];
    $por12= $tr12/$mm * 100;
    }

    $tpre= $mm * 12 + 600000; 
    $treal= $tr1 + $tr2 + $tr3 + $tr4 + $tr5 + $tr6 + $tr7 + $tr8 + $tr9 + $tr10 + $tr11 + $tr12; 
    $totvs= $treal/$tpre * 100;


    echo "<center>MES ".$dias." dias contados entre el rango de fechas</center>"; 
        
        echo "<strong>8,600,000.00 x Mes </strong><br>";
        echo "<strong>103,800,000.00 Año </strong>";
        echo"<hr> <hr>";

        echo "<table border='1' align='center'>";
          
          echo "<tr class='bg0'>";
            echo "<td colspan='15'><center><strong>PROYECCION DE VENTAS</strong></center></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td colspan='15'></td>";
          echo "</tr>";

          echo "<tr class='bg0'>";
            echo "<td width='10'>#</td>";
            echo "<td>Enero</td>";
            echo "<td>Febrero</td>";
            echo "<td>Marzo</td>";
            echo "<td>Abril</td>";
            echo "<td>Mayo</td>";
            echo "<td>Junio</td>";
            echo "<td>Julio</td>";
            echo "<td>Agosto</td>";
            echo "<td>Septiembre</td>";
            echo "<td>Octubre</td>";
            echo "<td>Noviembre</td>";
            echo "<td>Diciembre</td>";
             echo "<td width='8%'>Rendimiento total</td>";
            echo "<td class='w' rowspan='4' width='25%' style='CURSOR:Hand;' onmouseover=this.style.backgroundColor='#009023' onmouseout=this.style.backgroundColor='white'> <center><input type='image' src='images/A.jpg' height='128' width='198' /></center></td>";
          echo "</tr>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Previsto</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($tpre,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real</td>";
            echo "<td>".number_format($tr1,2)."</td>";
            echo "<td>".number_format($tr2,2)."</td>";
            echo "<td>".number_format($tr3,2)."</td>";
            echo "<td>".number_format($tr4,2)."</td>";
            echo "<td>".number_format($tr5,2)."</td>";
            echo "<td>".number_format($tr6,2)."</td>";
            echo "<td>".number_format($tr7,2)."</td>";
            echo "<td>".number_format($tr8,2)."</td>";
            echo "<td>".number_format($tr9,2)."</td>";
            echo "<td>".number_format($tr10,2)."</td>";
            echo "<td>".number_format($tr11,2)."</td>";
            echo "<td>".number_format($tr12,2)."</td>";
            echo "<td>".number_format($treal,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real vs Previsto (%)</td>";
            echo "<td>".number_format($por1)."%</td>";
            echo "<td>".number_format($por2)."%</td>";
            echo "<td>".number_format($por3)."%</td>";
            echo "<td>".number_format($por4)."%</td>";
            echo "<td>".number_format($por5)."%</td>";
            echo "<td>".number_format($por6)."%</td>";
            echo "<td>".number_format($por7)."%</td>";
            echo "<td>".number_format($por8)."%</td>";
            echo "<td>".number_format($por9)."%</td>";
            echo "<td>".number_format($por10)."%</td>";
            echo "<td>".number_format($por11)."%</td>";
            echo "<td>".number_format($por12)."%</td>";
            if ($totvs<=40)
            {
            echo "<td class='r'> ".number_format($totvs)."%</td>";
            }
            if ($totvs>40 && $totvs<80)
            {
              echo "<td class='a'> ".number_format($totvs)."%</td>"; 
            }
            if ($totvs>80 && $totvs<=100)
            {
              echo "<td class='v'> ".number_format($totvs)."%</td>"; 
            } 
            if ($totvs>100)
            {
              echo "<td class='v'> ".number_format($totvs)."%</td>"; 
            }         
          echo "</tr>";
          echo "</table>";

//***************************************** TABLA DE "CRECIMIENTO DE CARTERA" *********************************

   $sqlc1=mysql_query("select fechafactura, importemn, importe_dls, estado, tipopago from facturacion where fechafactura>= '$finicio' AND fechafactura<='$ene' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc1=mysql_fetch_array($sqlc1))
    {
    $trdls1= $trdls1+$sqc1[2] * $vdls;
    $trc1= $trc1+$sqc1[1];
    $porc1= $trc1/$mm * 100;
    }


    $sqlc2=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$ifeb' AND fechafactura<='$ffeb' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc2=mysql_fetch_array($sqlc2))
    {
    $trdls2= $trdls2+$sqc2[2] * $vdls;
    $trc2= $trc2+$sqc2[1];
    $porc2= $trc2/$mm * 100;
    }   
    
    $sqlc3=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$imar' AND fechafactura<='$fmar' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc3=mysql_fetch_array($sqlc3))
    {
    $trdls3= $trdls3+$sqc3[2] * $vdls;
    $trc3= $trc3+$sqc3[1];
    $porc3= $trc3/$mm * 100;
    }

    $sqlc4=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$iabr' AND fechafactura<='$fabr' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc4=mysql_fetch_array($sqlc4))
    {
    $trdls4= $trdls4+$sqc4[2] * $vdls;
    $trc4= $trc4+$sqc4[1];
    $porc4= $trc4/$mm * 100;
    }

    $sqlc5=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$imay' AND fechafactura<='$fmay' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc5=mysql_fetch_array($sqlc5))
    {
    $trdls5= $trdls5+$sqc5[2] * $vdls;
    $trc5= $trc5+$sqc5[1];
    $porc5= $trc5/$mm * 100;
    }

    $sqlc6=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$ijun' AND fechafactura<='$fjun' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc6=mysql_fetch_array($sqlc6))
    {
    $trdls6= $trdls6+$sqc6[2] * $vdls;
    $trc6= $trc6+$sqc6[1];
    $porc6= $trc6/$mm * 100;
    }

    $sqlc7=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$ijul' AND fechafactura<='$fjul' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc7=mysql_fetch_array($sqlc7))
    {
    $trdls7= $trdls7+$sqc7[2] * $vdls;
    $trc7= $trc7+$sqc7[1];
    $porc7= $trc7/$mm * 100;
    }

    $sqlc8=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$iago' AND fechafactura<='$fago' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc8=mysql_fetch_array($sqlc8))
    {
    $trdls8= $trdls8+$sqc8[2] * $vdls;
    $trc8= $trc8+$sqc8[1];
    $porc8= $trc8/$mm * 100;
    }

    $sqlc9=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$isep' AND fechafactura<='$fsep' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc9=mysql_fetch_array($sqlc9))
    {
    $trdls9= $trdls9+$sqc9[2] * $vdls;
    $trc9= $trc9+$sqc9[1];
    $porc9= $trc9/$mm * 100;
    }

        $sqlc10=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$ioct' AND fechafactura<='$foct' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc10=mysql_fetch_array($sqlc10))
    {
    $trdls10= $trdls10+$sqc10[2] * $vdls;
    $trc10= $trc10+$sqc10[1];
    $porc10= $trc10/$mm * 100;
    }

    $sqlc11=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$inov' AND fechafactura<='$fnov' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc11=mysql_fetch_array($sqlc11))
    {
    $trdls11= $trdls11+$sqc11[2] * $vdls;
    $trc11= $trc11+$sqc11[1];
    $porc11= $trc11/$mm * 100;
    }

        $sqlc12=mysql_query("select fechafactura, importemn, importe_dls, estado from facturacion where fechafactura>='$dic' AND fechafactura<='$ffin' AND estado!='CANCELADA' AND tipopago='CREDITO' ");
    while($sqc12=mysql_fetch_array($sqlc12))
    {
    $trdls12= $trdls12+$sqc12[2] * $vdls;
    $trc12= $trc12+$sqc12[1];
    $porc12= $trc12/$mm * 100;
    }

    $tpre= $mm * 12 + 600000; 
    $treal= $trc1 + $trc2 + $trc3 + $trc4 + $trc5 + $trc6 + $trc7 + $trc8 + $trc9 + $trc10 + $trc11 + $trc12; 
    $totvs= $treal/$tpre * 100;


    echo "año ".$dias; 
        echo "<table border='1' align='center'>";
          
          echo "<tr class='bg0'>";
            echo "<td colspan='15'><center><strong>CRECIMIENTO DE CARTERA </strong></center></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td colspan='15'></td>";
          echo "</tr>";

          echo "<tr class='bg0'>";
            echo "<td width='10'>#</td>";
            echo "<td>Enero</td>";
            echo "<td>Febrero</td>";
            echo "<td>Marzo</td>";
            echo "<td>Abril</td>";
            echo "<td>Mayo</td>";
            echo "<td>Junio</td>";
            echo "<td>Julio</td>";
            echo "<td>Agosto</td>";
            echo "<td>Septiembre</td>";
            echo "<td>Octubre</td>";
            echo "<td>Noviembre</td>";
            echo "<td>Diciembre</td>";
             echo "<td width='8%'>Rendimiento total</td>";
            echo "<td class='w' rowspan='4' width='25%' style='CURSOR:Hand;' onmouseover=this.style.backgroundColor='#009023' onmouseout=this.style.backgroundColor='white'> <center><input type='image' src='images/A.jpg' height='128' width='198' /></center></td>";
          echo "</tr>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Previsto</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($mm,2)."</td>";
            echo "<td>".number_format($tpre,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real</td>";
            echo "<td>".number_format($trc1,2)."</td>";
            echo "<td>".number_format($trc2,2)."</td>";
            echo "<td>".number_format($trc3,2)."</td>";
            echo "<td>".number_format($trc4,2)."</td>";
            echo "<td>".number_format($trc5,2)."</td>";
            echo "<td>".number_format($trc6,2)."</td>";
            echo "<td>".number_format($trc7,2)."</td>";
            echo "<td>".number_format($trc8,2)."</td>";
            echo "<td>".number_format($trc9,2)."</td>";
            echo "<td>".number_format($trc10,2)."</td>";
            echo "<td>".number_format($trc11,2)."</td>";
            echo "<td>".number_format($trc12,2)."</td>";
            echo "<td>".number_format($treal,2)."</td>";
          echo "</tr>";

          echo "<tr class=''>";
            echo "<td>Real vs Previsto (%)</td>";
            echo "<td>".number_format($porc1)."%</td>";
            echo "<td>".number_format($porc2)."%</td>";
            echo "<td>".number_format($porc3)."%</td>";
            echo "<td>".number_format($porc4)."%</td>";
            echo "<td>".number_format($porc5)."%</td>";
            echo "<td>".number_format($porc6)."%</td>";
            echo "<td>".number_format($porc7)."%</td>";
            echo "<td>".number_format($porc8)."%</td>";
            echo "<td>".number_format($porc9)."%</td>";
            echo "<td>".number_format($porc10)."%</td>";
            echo "<td>".number_format($porc11)."%</td>";
            echo "<td>".number_format($porc12)."%</td>";
            if ($totvs<=40)
            {
            echo "<td class='r'> ".number_format($totvs)."%</td>";
            }
            if ($totvs>40 && $totvs<80)
            {
              echo "<td class='a'> ".number_format($totvs)."%</td>"; 
            }
            if ($totvs>80 && $totvs<=100)
            {
              echo "<td class='v'> ".number_format($totvs)."%</td>"; 
            } 
            if ($totvs>100)
            {
              echo "<td class='v'> ".number_format($totvs)."%</td>"; 
            }         
          echo "</tr>";
          echo "</table>";

   //******************* TABLA DE "CRECIMIENTO DE CARTERA" *********************************

  }
?>
<input type="image" name="imprimir" src="images/print.png" onclick="window.print(); return false;"/>

           <input type="text" id="pnum1" value="<?php echo $tr1; ?> " />
           <input type="text" id="pnum2" value="<?php echo $tr2; ?> " />
           <input type="text" id="pnum3" value="<?php echo $tr3; ?> " />
           <input type="text" id="pnum4" value="<?php echo $tr4; ?> " />
               <input type="submit" value="Crear grafica" onclick="cargar()">

  <a href="prueba.php">grafica</a>
  <center>
<div id="grafica">
</center>
<br>
<input type="button" id="boton" value="Enviar parámetros">
<div id="cargaexterna">Aquí se mostrarán los parámetros enviados</div>
</FONT>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



