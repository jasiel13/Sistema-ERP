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

<body>
	<div class="contenedor">
		<h1>FACTURAS SIN CONTRA RECIBO</h1>
		   <input type="button" value="REFRESCAR" class="btn btn-primary btn-lg btn-block" onclick = "location='sincontra.php'"/>
		    <input type="button" value="REGRESAR" class="btn btn-primary btn-lg btn-block" onclick="location.href='fecha_cobranza_sincontra.php'"/>
		<div class="mensaje"></div>
		<table class="editinplace">
			<tr>
				<th>Cod.</th>
				<th>Estado</th>
				<th>Factura</th>
				<th>Cliente</th>
				<th>Importe MXN</th>
				<th>Importe DLS</th>
				<th>FechaFactura</th>
				<th>FechaContrarecibo</th>
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
			url: "upsincontra.php?tabla=1"

		})
		.done(function(json) {
			json = $.parseJSON(json)
			for(var i=0;i<json.length;i++)
			{
				$('.editinplace').append(
					"<tr><td class='id'>"+json[i].id+"</td><td data-campo='estado'><span>"+json[i].estado+"</span></td><td data-campo='factura'><span>"+json[i].factura+"</s pan></td><td data-campo='cliente'><span>"+json[i].cliente+"</span></td><td data-campo='importemn'><span>"+json[i].importemn+"</span></td><td data-campo='importe_dls'><span>"+json[i].importe_dls+"</span></td><td data-campo='fechafactura'><span>"+json[i].fechafactura+"</span></td><td class='editable' data-campo='fechacontrarecibo'><span>"+json[i].fechacontrarecibo+"</span></td></tr>");
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
					url: "upsincontra.php",
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