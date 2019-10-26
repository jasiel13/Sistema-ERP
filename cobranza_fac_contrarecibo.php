<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cobranza(Facturas Sin Contrarecibo)</title>
<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">

<style type="text/css">
	table{width:81%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2; position:absolute;right:35px;font-size:12px;}
	th {background: #94BDAB;color:#fff;border: solid black; border-width:2px;font-size:14px;}
	td {padding:1px;border:solid black;border-width:1px;}

tr:nth-child(odd)
{
   background:#F8F9F9;
   color: black;
}
 
tr:nth-child(even)
{
  background:#F8F9F9;
  color: #000000;
}

thead,tbody,tr{
    display:table;
    table-layout:fixed;
}
thead {    
    position:fixed;
    top:0;
}

.boton_1{
    text-decoration: none;
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 12px;
    font-style: italic;
    color:#000000;
    background-color:#BAE5DD;
    border-radius: 15px;
    border: 3px double #006505;
  }
  .boton_1:hover{
    opacity: 0.6;
    text-decoration: none;
  }
  #boton_1 {
        position:fixed;
        left:0%;
        top:0;       
    }
</style>
</head>

<body>
  <div align="center">
    <br>    
    <table>
      <thead>
         <tr>
          <th width="50">Cod.</th>
          <th width="100">Estado</th>
          <th width="100">Factura</th>
          <th width="180">Cliente</th>
          <th width="100">Importe MXN</th>
          <th width="100">Importe DLS</th>
          <th width="100">FechaFactura</th>
          <th width="100">FechaContrarecibo</th>
      </tr>
    </thead>

<?php
include('conexion.php');
$fecha1=$_POST['finicio'];
$fecha2=$_POST['ffin'];
$query=mysql_query("SELECT id,estado,factura, cliente, importemn, importe_dls,fechafactura, fechacontrarecibo FROM facturacion WHERE tipopago='CREDITO' AND estado!='CANCELADA' AND pagada!='on' AND fechacontrarecibo='0000-00-00' AND fechafactura >= '$fecha1' AND fechafactura <= '$fecha2' order by id desc");
$cont=mysql_num_rows($query);
if ($cont>0)
{
  while ($array=mysql_fetch_array($query))
  {      
 echo'<tbody>
 <tr>
 <td width="50">'.$array[0].'</td>
 <td width="100">'.$array[1].'</td>
 <td width="100">'.$array[2].'</td>
 <td width="180">'.$array[3].'</td>
 <td width="100">'.$array[4].'</td>
 <td width="100">'.$array[5].'</td>
 <td width="100">'.$array[6].'</td>
 <td width="130">'.$array[7].'</td>
 </tr>
 </tbody>';
  }
}
else
{
  echo'<tr><td>No hay registros</td></tr>';
}
echo '</table>';
?> 
<button onclick="location.href='sincontra.php'" class="boton_1" id="boton_1">Modificar Sin Contrarecibo</button>
</div>
</body>
</html>