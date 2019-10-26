<?php
include ('conexion.php');

//$query=mysql_query("UPDATE cobranza set fechacobro='2017-10-30' WHERE fechacobro='2017-10-31'");
//$query=mysql_query("UPDATE cobranza set fechacobro='2017-11-04' WHERE fechacobro='2017-11-06'");
//$query=mysql_query("UPDATE cobranza set fechacobro='2017-10-31' WHERE facped='CD26307'");
//$query=mysql_query("UPDATE cobranza set importemn='562.60' WHERE facped='CD25885'");
$query=mysql_query("UPDATE pedido set vendedor='NALLELI REYNA' WHERE idpedido='A42114' ");

//$query=mysql_query("INSERT INTO cobranza (facped,fechacobro,cliente, importemn, ) VALUES ('TERMOFUSION')");

//$query=mysql_query("UPDATE notacredito set fechanota='2017-11-15' WHERE nota='NC2642'");
//$query=mysql_query("UPDATE notacredito set fechanota='2017-10-02' WHERE fechanota='2017-10-28'");

//$query=mysql_query("UPDATE facturacion set pagada='' WHERE factura='CD26589' ");
//$query=mysql_query("UPDATE facturacion set fechanota='2017-11-15' WHERE factura='CD26745' ");

//$query=mysql_query("UPDATE facturacion set restomn='0.00', estado='CANCELADA' WHERE factura='CD26350'");

//$query=mysql_query("UPDATE cheque set fcobro='2017-11-13' WHERE nocheque='10306' ");
//$query=mysql_query("UPDATE cobranza set importemn='632.32' WHERE facped='CD26739'");

//////////////////////////////////////---INSERT---/////////////////////////////////////
//$query=mysql_query("DELETE FROM notacredito WHERE nota='NC2642'");
//$query=mysql_query("DELETE FROM cobranza WHERE facped='CD26288'");

//////////////////////////////////////---INSERT---/////////////////////////////////////  
//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,observaciones) VALUES ('15/12/2017','CD27028','DISEÑO Y CONSTRUCCIONES TECNOLOGICAS, S.A. DE C.V.','CONTADO','0','271.09','271.09','CHEQUE','MOSTRADOR')");
//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27038','SERVICIOS ECO AMBIENTALES, S.A. DE C.V.','CREDITO','30','4355.65','4355.65','TRANSFERENCIA','MOSTRADOR')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27039','SISTEMA INTERMUNICIPAL DE AGUAS Y SANEAMIENTO DE TOR-MAT COAH','CONTADO','0','58.09','58.09','EFECTIVO','MOSTRADOR')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27040','CONSTRUCCIONES Y URBANIZACIONES JUSAR, S.A. DE C.V.','CONTADO','0','13055.28','13055.28','TRANSFERENCIA','CLIENTE PASA')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27041','AGROMAYAL BOTANICA, S.A. DE C.V.','CONTADO','0','3238.81','3238.81','TRANSFERENCIA','ENVIO')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27042','CONSORCIO TECNOAMBIENTAL, S.A. DE C.V.','CREDITO','30','791.27','791.27','TRANSFERENCIA','ENVIO')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27043','CONSTRUCCIONES CIVILES DEL NORTE, S.A. DE C.V.','CONTADO','0','11613.97','11613.97','TRANSFERENCIA','MOSTRADOR')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27044','CARLOS ALBERTO CARDENAS ','CONTADO','0','1122.88','1122.88','EFECTIVO','MOSTRADOR')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27045','PUBLICO EN GENERAL','CONTADO','0','288.40','288.40','EFECTIVO','MOSTRADOR')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27046','GARFRUT, S.A. DE C.V.','CONTADO','0','1690.15','1690.15','TRANSFERENCIA','ANTICIPO')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27047','SISTEMAS CONSTRUCTIVOS NACIONALES S.A. DE C.V.','CONTADO','0','2090.41','2090.41','TRANSFERENCIA','CLIENTE PASA')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27048','SIDEAPA DEL MPIO GOMEZ PALACIO, DGO.','CREDITO','30','6122.56','6122.56','CHEQUE','ENVIO')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27049','PUBLICO EN GENERAL','CONTADO','0','239.92','239.92','EFECTIVO','MOSTRADOR')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27050','SERVICIOS ESTRUCTURALES INTEGRADOS, S.A. DE C.V.','CONTADO','0','0.00','0.00','CHEQUE','REFACTURACION')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27051','SERVICIOS ESTRUCTURALES INTEGRADOS, S.A. DE C.V.','CONTADO','0','0.00','0.00','CHEQUE','REFACTURACION')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27052','PUBLICO EN GENERAL','CONTADO','0','42.69','42.69','EFECTIVO','MOSTRADOR')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27053','SERVICIOS ESTRUCTURALES INTEGRADOS, S.A. DE C.V.','CONTADO','0','0.00','0.00','CHEQUE','REFACTURACION')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27054','CONSORCIO TECNOAMBIENTAL, S.A. DE C.V.','CREDITO','30','308.47','308.47','TRANSFERENCIA','MOSTRADOR')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27055','CONSORCIO TECNOAMBIENTAL, S.A. DE C.V.','CREDITO','30','266.94','266.94','TRANSFERENCIA','ENVIO')");

//$query=mysql_query("INSERT INTO facturacion (fechafactura,factura,cliente,tipopago,dias,importemn,restomn,formapago,obserfac) VALUES ('14/12/2017','CD27056','PUBLICO EN GENERAL','CONTADO','0','1894.56','1894.56','EFECTIVO','MOSTRADOR')");


//$query=mysql_query("DELETE FROM material WHERE material='SERVICIO'");
$query=mysql_query("INSERT INTO material (material) VALUES ('TUBO ADS') ");

if (!$query)
{
	?>
    	<script language="javascript">
		alert("Error al modificar!");
		</script>
	<?php
}
else
{
	?>
    	<script language="javascript">
		alert("Factura modificada con éxito!");
		</script>
	<?php
}
