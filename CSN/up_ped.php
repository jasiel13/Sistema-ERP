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
		$query=$db->query("update pedido set ".$_POST["campo"]."='".$_POST["valor"]."' where idpedido='".$_POST["id"]."' limit 1");
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
		$query=$db->query("select idpedido, fecha, cliente, solicito, importemn, importedls from pedido WHERE vendedor='".$_GET["us"]."' AND estadoc!='CANCELADA' AND estadoc!='ACEPTADA' order by fecha desc"); 
		$datos=array();
		while ($usuarios=$query->fetch_array())
		{
			$datos[]=array(	"id"=>$usuarios["idpedido"],
							"fecha"=>$usuarios["fecha"],
							"cliente"=>$usuarios["cliente"],
							"solicito"=>$usuarios["solicito"],
							"importemn"=>$usuarios["importemn"],
							"importedls"=>$usuarios["importedls"]
			);
		}
		echo json_encode($datos);
	}
}
?>