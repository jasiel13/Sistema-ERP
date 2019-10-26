<head>
<link rel="stylesheet" href="css/form.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
<script>
$(document).ready(function(){
 $("#cliente").autocomplete("autocomplete.php", {
		selectFirst: true
	});
});
</script>
</head>

<body>
<div>
<center>
<h2>DETALLE DE CLIENTES</h2>
</center>
<form name="f1" id="remision" method="post" action="admcliente.php" >
Tipo de búsqueda
<select name=tb onChange="cambia_forma()"> 
<option value="0" selected>Seleccione... 
<option value="CLIENTE">CLIENTE
<option value="TODOS">TODOS
</select>
Cliente
<input type="text" name="cliente" id="cliente" disabled="disabled" /> 
<input type="submit" value="Enviar" name="enviar"  >

</form>
<script language="javascript">

function cambia_forma(){ 
   	//tomo el valor del select del pais elegido 
   	var tp 
   	tp = document.f1.tb[document.f1.tb.selectedIndex].value 
   	//miro a ver si el pais está definido 
   	if (tp == 'CLIENTE') { 
      	  document.f1.cliente.disabled = false;
      	 
   	}else{ 
      	 //si no había provincia seleccionada, elimino las provincias del select 
      	       	  document.f1.cliente.disabled = true;

		    	} 
   	//marco como seleccionada la opción primera de provincia 
}
</script>
</form>
</div>
<body>