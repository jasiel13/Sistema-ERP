<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Comdelnorte</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Slide Down Box Menu with jQuery and CSS3" />
        <meta name="keywords" content="jquery, css3, sliding, box, menu, cube, navigation, portfolio, thumbnails"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
                <link rel="stylesheet" href="css/iframe.css" type="text/css"/>
        <style>
			body{
				background:#333 url(bg.jpg) repeat top left;
				font-family:Arial;
				color: white;
			}
			span.reference{
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:12px;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				text-shadow:1px 1px 1px #000;
				margin-right:30px;
			}
			span.reference a:hover{
				color:#ddd;
			}
			ul.sdt_menu{
				margin-top:11px;
				border-style: solid; border-width: 2px; 
			}
			h1.title{
				text-indent:-9000px;
				background:transparent url(title.jpg) no-repeat top left;
				width:781px;
				height:144px;
				margin-left: 227px;
				margin-bottom: 10px;
			}
		</style>
		<h1 class="title">CSN</h1>
    </head>

    <body>
    <?php
		session_start();
		$nom=$_SESSION["name"];
		$tipo=$_SESSION["autentificado"];
		include ('conexion.php');
		?>


		<form name="plantilla" method="post" >
			
			<?php
			mysql_query ('SET NAMES utf8');
			$consulta = mysql_query ("select * from usuarios where usuario = '$nom'");
			//$resultado = mysql_query($consulta) or die("Fallo al generar la consulta: ".mysql_error());
			$arr=mysql_fetch_array($consulta);
			?>

		<div class="content">
			
			<table  align="center" width="50%" border="0">
  				<tr>
    				<td height="34" align="center"><div align="center"><strong><font color="#ffffff"><font size="+1"> Sesi&oacute;n iniciada por:   <?php echo $arr[2]; ?> <?php echo $arr[3]; ?> <?php ?> </font></strong></div></td>
  				</tr>
			</table>

				<?php
					if ($tipo==1) 
						{
				?>
							<div class='ad'><a href="admin.php">Administrador</a></div>
				<?php
						}
				?>

			<ul id="sdt_menu" class="sdt_menu">
				<li>
					<a href="#">
						<img src="images/php.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">INFORMATICA</span>
							<span class="sdt_descr">Sistemas</span>
						</span>
					</a>
							<div class="sdt_box">
							<a href="solicitudes.php" target="frame">Solicitud</a>
							<a href="consultaUR.php" target="frame">Mis solicitudes</a>
							<a href="reportesoli.php" target="frame">Consultar</a>
							<a href="vistamto.php" target="frame">Mantenimiento</a>
							<a href="mto.php" target="frame">Mto. Equipo</a>
							<a href="repsoli.php" target="frame">Ind. Solicitud</a>
							<a href="indmto.php" target="frame">Ind. Mto</a>
							<a href="equipos.php" target="frame">Equipos</a>
							<a href="reg_claves.php" target="frame">REGISTRO DE CLAVES</a>

					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/facturacion.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">FACTURACION</span>
							<span class="sdt_descr">Notás de credito/Remision</span>
						</span>
					</a>
					<div class="sdt_box">
							<a href="registro.php" target="frame">FACTURA CSN</a>
							<a href="facsea.php" target="frame">FACTURA SEA</a>
							<a href="faccta.php" target="frame">FACTURA CTA</a>
							<a href="remision.php" target="frame">REMISION CSN</a>
							<a href="notas.php" target="frame">NOTA DE CREDITO CSN</a>
							<a href="ncsea.php" target="frame">NOTA DE CREDITO SEA</a>				
							<?php
					          if ($tipo==1){
					          	?>
							<a href="buscarfac.php" target="frame">MODIFICAR FACTURA</a>
							<a href="buscarnota.php" target="frame">MODIFICAR NOTA DE CREDITO</a>
							<a href="buscarremision.php" target="frame">MODIFICAR REMISION</a>
				            <?php
						         }
				               ?>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/cobranza.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">COBRANZA</span>
							<span class="sdt_descr">Cheques/Cartera</span>
						</span>
					</a>
						<div class="sdt_box">
							<a href="popup.php" target="frame">COBRANZA CSN</a>
							<a href="cobsea.php" target="frame">COBRANZA SEA</a>
							<a href="cobcta.php" target="frame">COBRANZA CTA</a>
							<a href="segcobranza.php" target="frame">SEG. COBRANZA</a>
							<a href="cartera.php" target="frame">RECUPERACION CARTERA</a>
							<a href="cheques.php" target="frame">CHEQUES POSFECHADOS</a>
							<a href="altacliente.php" target="frame">REGISTRO CLIENTE</a>
							<a href="bscliente.php" target="frame">MODIFICAR CLIENTE</a>
							<a href="facturacion.php" target="frame">FACTURACION</a>			
					    </div>
				</li>
				<li>
					<a href="#">
						<img src="images/admin-fact.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">ADMON-FACT</span>
							<span class="sdt_descr">Corte</span>
						</span>
					</a>
										<div class="sdt_box">
							<a href="buscheque.php" target="frame">CHEQUES COBRADOS</a>
							<a href="adminfac.php" target="frame">CAN/REFACT CSN</a>
							<a href="canseaf.php" target="frame">CAN/REFACT SEA</a>
							<a href="remfacturada.php" target="frame">REMISION FACT</a>
							<a href="relchequesfech.php" target="frame">RELACION CHEQUES</a>
							<a href="buscarcorte.php" target="frame">CORTE CSN</a>
							<a href="buscarcortesea.php" target="frame">CORTE SEA</a>
							<a href="buscarcortecta.php" target="frame">CORTE CTA</a>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/almacen.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">ALMACEN</span>
							<span class="sdt_descr">Factura/Entrega</span>
						</span>
					</a>
										<div class="sdt_box">
							<a href="confac.php" target="frame">FACTURAS</a>
							<a href="ent.php" target="frame">E. DOMICILIO</a>
							<a href="fechatiementrega.php" target="frame">INDICADOR DE ENTREGA</a>
							<a href="fechatiementregare.php" target="frame">INDICADOR DE ENTREGA REM</a>					
							<a href="fechaimprimir.php" target="frame">IMPRIMIR</a>
							<a href="facrec.php" target="frame">CONSULTAR</a>						
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/indicadores.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">INDICADORES</span>
							<span class="sdt_descr">Grafica/resumen</span>
						</span>
					</a>
					<div class="sdt_box">
						<a href="almacenindi.php" target="frame">FACTURACION</a>
						<a href="facturacion-ind.php" target="frame">FACTURACION-CONTRARECIBO</a>
						<a href="buscobranza.php" target="frame">COBRANZA</a>
						<a href="compindi.php" target="frame">REVISION DE PEDIDOS Y COTIZACIONES</a>						
						<a href="buscfac.php" target="frame">CONSECUTIVO</a>
						<a href="busc_sinex.php" target="frame">SIN EXISTENCIAS</a>
						<a href="fgrafica.php" target="frame">IND. COTIZACION</a>
						<!-- <a href="bsc.php" target="frame">BSC (en construccion)</a> -->
						<a href="busc-regclaves.php" target="frame">CLAVES</a>
					</div>
				</li>
								<li>
					<a href="#">
						<img src="images/compras.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">COMPRAS</span>
							<span class="sdt_descr">Segumientos</span>
						</span>
					</a>
					<div class="sdt_box">
						<a href="junta.php" target="frame">JUNTA</a>
						<a href="fgrafica.php" target="frame">IND. COTIZACION</a>
						<a href="indped.php" target="frame">IND. MATERIAL</a>
						<a href="ver_claves.php" target="frame">CLAVES PENDIENTES</a>
					</div>
				</li>
								<li>
					<a href="#">
						<img src="images/ventas.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">VENTAS</span>
							<span class="sdt_descr">Cot/Pedido</span>
						</span>
					</a>
					<div class="sdt_box">
						<a href="pedido.php" target="frame">PEDIDO/COTIZACION</a>
						<a href="coti.php" target="frame">COTIZACIONES</a>
						<a href="junta.php" target="frame">JUNTA</a>
						<a href="frepoven.php" target="frame">IND. VENTAS</a>
						<a href="precios.php" target="frame">PRECIOS</a>
						<a href="estadisticas.php" target="frame">ESTADISTICAS DE PRECIOS</a>
						<a href="altacliente.php" target="frame">REGISTRO CLIENTE</a>
						<a href="conentregaV.php" target="frame">CONSULTA E. DOM</a>
						<a href="sinex.php" target="frame">SIN EXISTENCIAS</a>
						<a href="mod_cp.php" target="frame">ACTUALIZAR MONTOS EN CERO</a>							
					</div>
				</li>
								<li>
					<a href="#">
						<img src="images/comparativa.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">COMPARATIVAS</span>
							<span class="sdt_descr">Microsip/CSN</span>
						</span>
					</a>
					<div class="sdt_box">
						<a href="compara/menu.php" target="frame">CXC/CONTA</a>
						<a href="compara/menucxp.php" target="frame">CXP/CONTA</a>
						<a href="comparasea/menucxc.php" target="frame">SEA CXC/CONTA</a>
						<a href="comparasea/menucxp.php" target="frame">SEA CXP/CONTA</a>
						<a href="comparacta/menu.php" target="frame">CTA CXC/CONTA</a>
						<a href="comparacta/menucxp.php" target="frame">CTA CXP/CONTA</a>
					</div>
				</li>
			</ul>
		</div>

    		<div class="object">
    			<iframe name="frame" width="1080" height="800" style="background-image: url('images/3331.jpg')">
    			</iframe>
  			</div> 

</form>


        <!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
				/**
				* for each menu element, on mouseenter, 
				* we enlarge the image, and show both sdt_active span and 
				* sdt_wrap span. If the element has a sub menu (sdt_box),
				* then we slide it - if the element is the last one in the menu
				* we slide it to the left, otherwise to the right
				*/
                $('#sdt_menu > li').bind('mouseenter',function(){
					var $elem = $(this);
					$elem.find('img')
						 .stop(true)
						 .animate({
							'width':'120px',
							'height':'120px',
							'left':'0px'
						 },400,'easeOutBack')
						 .andSelf()
						 .find('.sdt_wrap')
					     .stop(true)
						 .animate({'top':'120px'},500,'easeOutBack')
						 .andSelf()
						 .find('.sdt_active')
					     .stop(true)
						 .animate({'height':'170px'},300,function(){
						var $sub_menu = $elem.find('.sdt_box');
						if($sub_menu.length){
							var left = '120px';
							if($elem.parent().children().length == $elem.index()+1)
								left = '-165px';
							$sub_menu.show().animate({'left':left},200);
						}	
					});
				}).bind('mouseleave',function(){
					var $elem = $(this);
					var $sub_menu = $elem.find('.sdt_box');
					if($sub_menu.length)
						$sub_menu.hide().css('left','0px');
					
					$elem.find('.sdt_active')
						 .stop(true)
						 .animate({'height':'0px'},300)
						 .andSelf().find('img')
						 .stop(true)
						 .animate({
							'width':'0px',
							'height':'0px',
							'left':'85px'},400)
						 .andSelf()
						 .find('.sdt_wrap')
						 .stop(true)
						 .animate({'top':'25px'},500);
				});
            });
        </script>
    </body>
</html>