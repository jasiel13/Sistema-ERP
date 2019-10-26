<?php
$dbhost="localhost";
$dbname="comercializadora";
$dbuser="root";
$dbpass="Csn960821";
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if (isset($_POST) && count($_POST)>0)
{
	if ($db->connect_errno) 
	{
		die ("<span class='ko'>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</span>");
	}
	else
	{
		$query=$db->query("update facturacion set ".$_POST["campo"]."='".$_POST["valor"]."' where ID='".intval($_POST["id"])."' limit 1");
		if ($query) echo "<span class='ok'>Valores modificados correctamente.</span>";
		
		else echo "<span class='ko'>".$db->error."</span>";
	}
}

if (isset($_GET) && count($_GET)>0)
{
	if ($db->connect_errno) 
	{
		die ("<span class='ko'>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</span>");
	}
	else
	{
		$query=$db->query("select ID, factura, importemn, importe_dls, restomn, restodls, fechafactura from facturacion WHERE fechafactura='".$_GET["fecha"]."' AND estado!='CANCELADA' order by fechafactura desc"); 
		$datos=array();
		while ($usuarios=$query->fetch_array())
		{
			$datos[]=array(	"id"=>$usuarios["ID"],
							"factura"=>$usuarios["factura"],
							"importemn"=>$usuarios["importemn"],
							"importe_dls"=>$usuarios["importe_dls"],
							"restomn"=>$usuarios["restomn"],
							"restodls"=>$usuarios["restodls"],							
							"fechafactura"=>$usuarios["fechafactura"]						
			);
		}
		echo json_encode($datos);
	}
}
?>