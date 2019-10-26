<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es"> <!--<![endif]-->
<head>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
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

/*codigo para el nuevo formulario*/
input[type=text], select {
    width: 100%;
    padding: 10px 18px;
    margin: 4px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

h2
{
  display: inline-block;
color: white; text-shadow: black 0.1em 0.1em 0.2em

}
input[type=date]{
    width: 100%;
    padding: 10px 18px;
    margin: 4px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 40%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div.color{
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 40%;
    margin-left: auto;
    margin-right: auto;
    font-family: helvetica,arial,sans-serif;
}
/*codigo para el nuevo formulario*/
</style>
	
</head>
<?php
$fecha=$_POST['fechac'];
?>
<body>
	<div class="contenedor">
		<h1>FACTURACION del dia <?php echo $fecha;?></h1>
		<h2>Modificar factura...</h2>
		<input type="hidden" name="fecha" id="fecha" value="<?php echo $fecha;?>" >
		<div class="mensaje"></div>
		<table class="editinplace">
			<tr>
				<th>ID</th>
				<th>Factura</th>
				<th>Importe MXN</th>
				<th>Importe DLS</th>
				<th>Resto MXN</th>
				<th>Resto DLS</th>				
				<th>FechaFactura</th>
			
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
			data: {fecha: $("#fecha").val() },
			//data: {'fecha': $("#fecha").val(), 'variable2': valor},
			url: "upfac.php?tabla=1"

		})
		.done(function(json) {
			json = $.parseJSON(json)
			for(var i=0;i<json.length;i++)
			{
				$('.editinplace').append(
					"<tr><td class='id'>"+json[i].id+"</td><td><span>"+json[i].factura+"</span></td><td class='editable' data-campo='importemn'><span>"+json[i].importemn+"</span></td><td class='editable' data-campo='importe_dls'><span>"+json[i].importe_dls+"</span></td><td class='editable' data-campo='restomn'><span>"+json[i].restomn+"</span></td><td class='editable' data-campo='restodls'><span>"+json[i].restodls+"</span></td><td class='editable' data-campo='fechafactura'><span>"+json[i].fechafactura+"</span></td></tr>");
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
					url: "upfac.php",
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

<form name="observaciones" id="observaciones" method="post" action="modf_actualizar.php">
<div class="color">
<br>
<label>ID</label>
<input name="id" type="text" required>

Factura
<input name="factura" type="text" required>

<label>Observaciones</label>    
 <select name="observ" onkeypress="return pulsar(event)">
  <option value=''>Seleccione</option>
  <option VALUE='CLIENTE PASA'>CLIENTE PASA</option>
  <OPTION VALUE='ENVIO'>ENVIO</OPTION>
  <OPTION VALUE='MOSTRADOR'>MOSTRADOR</OPTION>
  <OPTION VALUE='PROGRAMACION DE PAGO'> PROGRAMACION DE PAGO</OPTION>
  <option value='REFACTURACION'>REFACTURACION</option>
  <option value='REMISION FACTURADA'>REMISION FACTURADA</option>
  <option value='MATERIAL ENTREGADO DIRECTO PROVEEDOR'>MATERIAL ENTREGADO DIRECTO PROVEEDOR</option>
  <option value='SERVICIO'>SERVICIO</option>
  <option value='CLIENTE AVISA'>CLIENTE AVISA</option>
  <option value='FACTURA EN PUNTO/NO SE ENTREGA'>FACTURA EN PUNTO/NO SE ENTREGA</option>
  <option value='ANTICIPO'>ANTICIPO</option>
</select>

<label>Forma de pago</label>
<select name="formadepago" onkeypress="return pulsar(event)">
 <option value=''>Seleccione</option>
 <option VALUE='EFECTIVO'>EFECTIVO</option>
 <option VALUE='CHEQUE'>CHEQUE</option>
 <option VALUE='TRASALDO'>TRASALDO</option>
 <option VALUE='TARJETA'>TARJETA</option>
 <option VALUE='TRANSFERENCIA'>TRANSFERENCIA</option>
 <option VALUE='NO IDENTIFICADO'>NO IDENTIFICADO</option>
 <option VALUE='APLICACION DE ANTICIPO'>APLICACION DE ANTICIPO</option>
 <option VALUE='TRASPASO DE FACTURA/ANTICIPO'>TRASPASO DE FACTURA/ANTICIPO</option>
 <option VALUE='TRASPASO DE SALDO/FACTURA CON PUNTO'>TRASPASO DE SALDO/FACTURA CON PUNTO</option>
 <option VALUE='NOTAS DE CREDITO'>NOTAS DE CREDITO</option>	
</select>

<label>Estado</label>
<select name='estado' onkeypress="return pulsar(event)">
  <option value=''>Seleccione</option>
  <option VALUE='CANCELADA'>CANCELADA</option>
  <option VALUE='REFACTURADA'>REFACTURADA</option>
</select>

<label>Tipo de Pago</label>
<select name='tipo' onkeypress="return pulsar(event)">
  <option value=''>Seleccione</option>
  <option VALUE='CONTADO'>CONTADO</option>
  <option VALUE='CREDITO'>CREDITO</option>
</select>
<center>
<input name="enviar" type="submit" title="Enviar">
</center>
</div>
</form>

</body>
</html>