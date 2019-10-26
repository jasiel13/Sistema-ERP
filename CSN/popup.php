<head>

<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
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
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
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

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 75%;
    margin-left: auto;
    margin-right: auto;
    font-family: helvetica,arial,sans-serif;
}
</style>

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
<script language="JavaScript" type="text/javascript">

function valida(document)
{
  
  if (document.tpago.value == "#" )
    {
       
        alert("Indique el tipo de cobranza.");
        document.tpago.focus();
    return false;
  }
  else if (document.cliente.value == "" )
    {
       
        alert("Indique el nombre del cliente.");
        document.cliente.focus();
    return false;
  }
}
  </script>
</head>

<body>
<div>
<center>
  
<strong><h2>DETALLES DE COBRANZA</h2></strong>
</center>
<form name="f1" id="remision" method="post" action="cobrar.php" onsubmit="return valida(this);" >
Cobranza sobre:
<select name="tpago" onChange="cambia_forma()"> 
<option value="#" selected>Seleccione... 
<option value="PSA">P. SALDO ANT
<option value="FACTURA">FACTURA
</select>
No. Facturas
<input type="text" name=num id="num" disabled="disabled" /> 
Cliente
<input name="cliente" type="text" id="cliente" size="20" />
    <input type="submit" value="Enviar">
</form>
<script language="javascript">
var formapago=new Array("-","EFECTIVO","CHEQUE", "TARJETA","TRASPSALDO");

function cambia_forma(){ 
   	//tomo el valor del select del pais elegido 
   	var fp 
   	fp = document.f1.tpago[document.f1.tpago.selectedIndex].value 
   	//miro a ver si el pais está definido 
   	if (fp == 'FACTURA') { 
      	  document.f1.num.disabled = false;
      	 
   	}else{ 
      	 //si no había provincia seleccionada, elimino las provincias del select 
      	       	  document.f1.num.disabled = true;

		    	} 
   	//marco como seleccionada la opción primera de provincia 
}
</script>
</form>
</div>
<body>