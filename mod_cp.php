<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<title>Facturacion</title>
	
	<style>
	.contenedor{margin:28px auto;width:960px;font-family:sans-serif;font-size:12px;
		}
	table {width:95%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2;}
	th {padding:5px;background:#555;color:#fff}
	td {padding:5px;border:solid #ddd;border-width:0 0 1px;}
		.editable span{display:block;}
		.editable span:hover {background:url(images/edit.png) 90% 50% no-repeat;cursor:pointer}
		
		td input{height:24px;width:200px;border:1px solid #ddd;padding:0 5px;margin:0;border-radius:6px;vertical-align:middle}
		a.enlace{display:inline-block;width:24px;height:24px;margin:0 0 0 5px;overflow:hidden;text-indent:-999em;vertical-align:middle}
			.guardar{background:url(images/save2.png) 0 0 no-repeat}
			.cancelar{background:url(images/cancel.png) 0 0 no-repeat}
	
	.mensaje{display:block;text-align:center;margin:0 0 20px 0}
		.ok{display:block;padding:10px;text-align:center;background:green;color:#fff}
		.ko{display:block;padding:10px;text-align:center;background:red;color:#fff}
		h1{color:white;text-align:center}
		h2{color:white}

		tr:nth-child(odd){
    background: #E6E6E6;
    color: black;
}
 
tr:nth-child(even){
    background: #FFFFFF;
    color: #000000;
}
	</style>
	
</head>
    <?php
		session_start();
		$nom=$_SESSION["name"];
		$tipo=$_SESSION["autentificado"];
		include ('conexion.php');
					mysql_query ('SET NAMES utf8');
			$consulta = mysql_query ("select * from usuarios where usuario = '$nom'");
			//$resultado = mysql_query($consulta) or die("Fallo al generar la consulta: ".mysql_error());
			$arr=mysql_fetch_array($consulta);
		?>

<body>
	<div class="contenedor">
		<h1>Cotizaciones/Pedidos</h1>
		<input type="hidden" name="us" id="us" value='<?php echo $arr[2]." ".$arr[3]; ?>'>
		<input type="button" value="REFRESCAR" class="btn btn-primary btn-lg btn-block" onclick = "location='mod_cp.php'"/>
		<div class="mensaje"></div>
		<table class="editinplace">
			<tr>
				<th>ID</th>
				<th>FECHA</th>
				<th>Cliente</th>
				<th>Solicito</th>
				<th>Importe MXN</th>
				<th>Importe DLS</th>
			</tr>
		</table>
	</div>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"> </script>

	<script>
	$(document).ready(function() 
	{
		/* OBTENEMOS TABLA */
		$.ajax({
			type: "GET",
			data: {us: $("#us").val() },
			//data: {'fecha': $("#fecha").val(), 'variable2': valor},
			url: "up_ped.php?tabla=1"

		})
		.done(function(json) {
			json = $.parseJSON(json)
			for(var i=0;i<json.length;i++)
			{
				$('.editinplace').append(
					"<tr><td class='id'>"+json[i].id+"</td><td class='editable' data-campo='fecha'><span>"+json[i].fecha+"</span></td><td class='editable' data-campo='cliente'><span>"+json[i].cliente+"</span></td><td class='editable' data-campo='solicito'><span>"+json[i].solicito+"</span></td><td class='editable' data-campo='importemn'><span>"+json[i].importemn+"</span></td><td class='editable' data-campo='importedls'><span>"+json[i].importedls+"</span></td></tr>");
			}
		});
		
		var td,campo,valor,id;
		$(document).on("click","td.editable span",function(e)
		{
			e.preventDefault();
			$("td:not(.id)").removeClass("editable");
			td=$(this).closest("td");
			campo=$(this).closest("td").data("campo");
			valor=$(this).text();
			id=$(this).closest("tr").find(".id").text();
			td.text("").html("<input type='text' name='"+campo+"' value='"+valor+"'><a class='enlace guardar' href='#'>Guardar</a><a class='enlace cancelar' href='#'>Cancelar</a>");
		});
		
		$(document).on("click",".cancelar",function(e)
		{
			e.preventDefault();
			td.html("<span>"+valor+"</span>");
			$("td:not(.id)").addClass("editable");
		});
		
		$(document).on("click",".guardar",function(e)
		{
			$(".mensaje").html("<img src='images/loading.gif'>");
			e.preventDefault();
			nuevovalor=$(this).closest("td").find("input").val();
			if(nuevovalor.trim()!="")
			{
				$.ajax({
					type: "POST",
					url: "up_ped.php",
					data: { campo: campo, valor: nuevovalor, id:id }
				})
				.done(function( msg ) {
					$(".mensaje").html(msg);
					td.html("<span>"+nuevovalor+"</span>");
					$("td:not(.id)").addClass("editable");
					setTimeout(function() {$('.ok,.ko').fadeOut('fast');}, 3000);
				});
			}
			else $(".mensaje").html("<p class='ko'>Debes ingresar un valor</p>");
		});
	});
	
	</script>
	
	
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-266167-20");
		pageTracker._setDomainName(".martiniglesias.eu");
		pageTracker._trackPageview();
	} catch(err) {}</script>
</body>
</html>