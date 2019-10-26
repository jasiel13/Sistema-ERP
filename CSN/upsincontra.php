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
		$query=$db->query("select * from facturacion WHERE tipopago='CREDITO' AND estado!='CANCELADA' AND pagada!='on' AND fechacontrarecibo='0000-00-00' order by ID desc"); 
		$datos=array();
		while ($usuarios=$query->fetch_array())
		{
			$datos[]=array(	"id"=>$usuarios["ID"],
							"estado"=>$usuarios["estado"],
							"factura"=>$usuarios["factura"],
							"cliente"=>$usuarios["cliente"],
							"importemn"=>$usuarios["importemn"],
							"importe_dls"=>$usuarios["importe_dls"],
							"fechafactura"=>$usuarios["fechafactura"],
							"fechacontrarecibo"=>$usuarios["fechacontrarecibo"]
			);
		}
		echo json_encode($datos);
	}
}
?>