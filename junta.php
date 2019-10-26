<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/iframe.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/estilos1.css" >
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >

        <script src="query/jquery.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
            $("#cerrar").click(function(){
            $('#alerta').hide();
                 $('#sound').remove(); // Remove player from DOM            
                 });
             });

        </script>
<script>setTimeout('document.location.reload()',15000); </script>
<style type="text/css">

.titles
{
   background-color: white;
color: black;
border: 2px solid #4CAF50;

text-align: center;

display: inline-block;
font-size: 14px;

line-height: 1.5;
font-family: Verdana,sans-serif;
}
.t{background-color: #0B0B61; color:#FAFAFA;}
.i{ background-color: #F4FA58; font: bold 90% monospace; }
.n{ background-color: #BDBDBD; font: bold 90% monospace; }


            #alerta
            {
                border: 2px solid #a1a1a1;
                padding: 10px 40px; 
                width: 300px;
                border-radius: 25px;
                position:absolute;
                margin-left: 300px;
                -webkit-animation: mymove 2s infinite; /* Chrome, Safari, Opera */
                animation: mymove 2s infinite;
                }

            /* Chrome, Safari, Opera */
            @-webkit-keyframes mymove 
            {
            from {background-color: #dddddd;}
            to {background-color: blue;}
            }

            /* Standard syntax */
            @keyframes mymove {
            from {background-color: red;}
            to {background-color: #dddddd;}
            }
            body
			{
			   background:url(images/3331.jpg) repeat-x center;
			}
</style>
<?php
include ('conexion.php');
session_start();
 $usuario=$_SESSION["name"];
 $tius=$_SESSION['autentificado'];

    //echo $usuario;
    $u=mysql_query("select nombre, apellido from usuarios where usuario='$usuario'");
    //echo "select nombre, apellido from usuarios where usuario='$usuario ";
    while ($f=mysql_fetch_array($u))
    {
    $user=$f[0]." ".$f[1];
    //echo $user;
	}
if ($_SESSION["autentificado"]=="6" )
{
	
	$r_sol=mysql_query("SELECT * FROM comentarios where tipo='5' ");
	$n = mysql_num_rows($r_sol);
	
	$nombre=0;
	$myname=0;
	setcookie('myname', $n);
	if($_COOKIE['myname'])
	{
	$nombre = $_COOKIE['myname'];
	}
	
	$_SESSION['total'] = $n;
	$r = $n;
	//EJECUTAMOS EL CONDICIONAL PARA VERIFICAR SI HAY O NO NUEVOS REGISTROS O SOLICITUDES
	    if($_SESSION['total'] > $nombre)

    	{
        	//VALIDAMOS QUE LA VARIABLE SESSION "ULTIMO_TOTAL" NO ESTE VACIA PARA GARANTIZAR QUE NO ES 	PRIMERA VEZ QUE ENTRA A LA PAGINA DE LO CONTRARIO SI MUESTRA EL MENSAJE DE ALERTA	
        	if($nombre != "")
        		{
            		//CALCULAMOS LOS REGISTROS O SOLICITUDES NUEVAS SIN REVISAR
            		$total = $_SESSION['total'] - $nombre;
            		?>
    
            		<center>
            		<div id="alerta" align="center"> Tienes <?php echo $total;?> mensajes sin leer!!!
            		<hr>
            		<audio id="sound" autoplay loop>
            		  <source src="mp3/Alarm08.wav" type="audio/mpeg">
            		  <p>If you can read this, your browser does not support the audio element.</p>
            		</audio>
            		    <button type="submit" CLASS="btn btn-info btn-lg" id="cerrar">Cerrar</button>
            		</div>   
            		</center> 
            		<?php
            		//GUARDAMOS EL ULTIMO TOTAL CONTADO
            		$nombre = $_SESSION['total'];
        		}
        
    	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
</head>
<body>
<br>
<br>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            
               <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">TITULO DE LA CABEZERA</h4>
                    </div>
                           <div class="modal-body">
                           </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                    </div>
               </div>

        </div>
    </div>

    <br>
<script src="query/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
	
	<div align='center'>
		<p></p>
	<strong><font size='+2' style="color:white">Revisión de Pedidos y Cotizaciones</font></strong>
	<p></p>
	<p></p>

	<table border='1'>
		<tr class="titles">
		    <td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#069A12'" onmouseout="this.style.backgroundColor = 'white'" onclick="window.location='junta.php?$t=1'"> COTIZACIONES - PENDIENTES</td>
			<td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#069A12'" onmouseout="this.style.backgroundColor = 'white'" onclick="window.location='junta.php?$t=2'"> COTIZACIONES - CONTESTADAS</td>
			<td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#069A12'" onmouseout="this.style.backgroundColor = 'white'" onclick="window.location='junta.php?$t=3'"> PEDIDOS - PENDIENTES</td>
			<td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#069A12'" onmouseout="this.style.backgroundColor = 'white'" onclick="window.location='junta.php?$t=4'"> PEDIDOS - CONTESTADOS</td>
			<td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#069A12'" onmouseout="this.style.backgroundColor = 'white'" onclick="window.location='junta.php?$t=5'"> EN SEGUIMIENTO</td>
			<td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#069A12'" onmouseout="this.style.backgroundColor = 'white'" onclick="window.location='junta.php?$t=6'"> PEDIDOS - LIBERADOS</td>
		</tr>
	</table>
	
<?php

if (isset ($_GET['$t'])) 
{
	if($_GET['$t']==1 )
	{
		$est='PENDIENTE';
		$tipo='2';

		?>
			<style>
				tr
				 {
					background-color: white;
			   	 } 
			
			</style>

		<?php
		
	}
	if($_GET['$t']==2)
	{
		$est='CONTESTADA';
		$tipo='2';
		
	}
	if($_GET['$t']==3 )
	{
		$est='PENDIENTE';
		$tipo='1';
		
	}
	if($_GET['$t']==4)
	{
		$est='CONTESTADA';
		$tipo='1';
		
	}
	if($_GET['$t']==5)
	{
		$est='SEGUIMIENTO';
		$tipo='2';
		
	}
	if($_GET['$t']==6)
	{
		$est='LIBERADO';
		$tipo='1';
	}
			if($_GET['$t']==6)
	{
		$est='LIBERADO';
		$tipo='2';
	}
	//echo $tipo;
	?>
	//echo $tipo;
	?>

	<table border='1'>
		<tr class='t'><td>PEDIDO</td><td>FECHA</td><td>HORA</td><td>CLIENTE</td><td>IMP MN</td><td>IMP DLS</td><td>ESTADO</td><td>VENDEDOR</td></tr>	

<?php
include ('conexion.php');
if ($tius==6 or $tius==1 or $tius==10)
{
	
$q=mysql_query("SELECT idpedido, fecha, hora, cliente, importemn, importedls, estado, vendedor, prioridad from pedido WHERE estado='$est' and tipo='$tipo' and estadoc='' order by fecha DESC, hora DESC");
//echo "SELECT idpedido, fecha, hora, cliente, importemn, importedls, estado, vendedor from pedido WHERE estado='$est' and tipo='$tipo' and estadoc=''";
}
else if($ius=5)
{
	$q=mysql_query("SELECT idpedido, fecha, hora, cliente, importemn, importedls, estado, vendedor, prioridad from pedido WHERE estado='$est' and tipo='$tipo' and estadoc='' and estadoc='' and vendedor='$user' order by fecha DESC, hora DESC ");
}
//echo "SELECT idpedido, fecha, hora, cliente, estado, vendedor from pedido WHERE estado='$est' and tipo='$tipo' and vendedor='$user'";
while ($a=mysql_fetch_array($q)) {
	if ($a[8]=='IMPORTANTE')
	{
		$bc='i';
	}
	else
	{
		$bc='n';
	}
	?>
	<tr class='<?php echo $bc;?>' style="cursor: default" onclick="window.location='pedido.php?id=<?php echo $a[0];?>'">
	
	<td><?php echo $a[0];?></td><td><?php echo $a[1];?></td>
	<td><?php echo $a[2];?></td><td><?php echo $a[3];?></td>
	<td><?php echo "$ ".number_format($a[4],2);?></td><td><?php echo "$ ".number_format($a[5],2);?></td>
	<td><?php echo $a[6];?></td><td><?php echo $a[7];?></td></tr>
	<?php
}
?>
</table>
<?php
}
?>
</div>
<script src="query/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>		
</body>
</html>