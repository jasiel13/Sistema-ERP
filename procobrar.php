<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include('conexion.php');
$num=$_POST['numero'];
$tipo=$_POST['tipo'];
$cliente=$_POST['cliente'];
$fpago=$_POST['forma'];
//$cobro=$_POST['cobro'];
//$fecha=date('Y-m-d');
$pagomn=0;
$pagodls=0;
$res=0;
$saldo=0;
$vr='';
session_start();
$usuario=$_SESSION['name'];
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hoy=date('Y-m-d');
$pago=0;
/////*****
$c=mysql_query("select saldo from clientes where cliente='$cliente'");
while ($s=mysql_fetch_array($c))
{
	$saldo=$s[0];
	//echo $saldo;
}

//for para nombre
$i=0;
  for ($i=0; $i<$num; $i++)
 {
	 $fac=$_POST['factura'.$i];
	// $factura='factura'.$i;
	 $ob=$_POST['obser'.$i];
if ($tipo=='FACTURA')
	 {
//echo $fac."  ".$ob;
 $q=mysql_query("select importemn, importe_dls, tipopago, pagada, restomn, restodls from facturacion where factura='$fac'");
 $c=mysql_num_rows($q);
 if($c!=0)
 {
	 while ($arr=mysql_fetch_array($q))
	 {
		 $importemn=$arr[0];
		 $importedls=$arr[1];
		 $tp=$arr[2];
		 $pagada=$arr[3];
		 $restomn=$arr[4];
		 $restodls=$arr[5];
	 }
 
	 if ($tp=='CONTADO')
	 {
		 ?>
     <script language="javascript">
	 alert ("La factura <?php echo $fac;?>  ES A CONTADO");
     </script>
     <?php
	 }
	 else if ($pagada=='on')
	 {
		 ?>
     <script language="javascript">
	 alert ("La factura <?php echo $fac;?> SE ENCUENTRA PAGADA");
     </script>
     <?php
	 }
	 else
	 {	 
	/*PAGOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO*/ 	
	 if ($ob=='PAGO')
	 {
		 $sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac','$restomn','$restodls','$fpago','$ob', '$usuario')") or die (mysql_error());
	 if ($sql)
		if($importemn!='')
		{$res=$saldo-$importemn;
		//echo $res."=".$saldo."-".$importemn;
		}
		else if($importedls!='')
		{$res=$saldo-$importedls;
		//echo $res."=".$saldo."-".$importedls;
		}
		$us=mysql_query("update clientes set saldo='$res' where cliente='$cliente'");
		if($us){
		 $up=mysql_query("update facturacion set pagada='on' where factura='$fac'");
		 if ($up)
		 {//die (mysql_error());?>
			<script language="javascript">
			alert("PAGO REGISTRADO CON EXITO"<?php echo $res?>);
			</script>
				<?php
				
		 }
	 else
		{?>
			<script language="javascript">
			alert("OCURRI&Oacute; UN ERROR!!");
			</script>
		 <?php
		}

	 }
	 else
	 {
		 ?>
			<script language="javascript">
			alert("OCURRI&Oacute; UN ERROR (update saldo)!!");
			</script>
		 <?php
	 }
	 }
/*ANTICIPOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO*/
	 else if ($ob=='ANTICIPO')
	 {
		 $resto=0;
		 if($_POST['mon']=='MN')
		 {
			 //$pagomn=$importemn-$_POST['fpago'];
			 			 $sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac',".$_POST['fpago'].",'$pagodls','$fpago','$ob', '$usuario')") or die (mysql_error());
			 if($sql)
			 {$res=$saldo-$_POST['fpago'];
			 $total=$restomn-$_POST['fpago'];//resto 
$vr='restomn';
?>
             <script language="javascript">
			 alert ("El resto de la factura es: <?php echo $total;?>");
             </script>
             <?php

			 }
		 }
		  else if($_POST['mon']=='DLS')
		 {
			 
			 $sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac','$pagomn',".$_POST['fpago'].",'$fpago','$ob', '$usuario')") or die (mysql_error());
		 if($sql)
			 {$res=$saldo-$_POST['fpago'];
 			 $total=$restodls-$_POST['fpago'];//resto 
			 $vr='restodls';
			 ?>
             <script language="javascript">
			 alert ("El resto de la factura es: <?php echo $total;?>");
             </script>
             <?php
}
		 }
				$r=mysql_query("update facturacion set $vr='$total' where factura='$fac'");
				if ($r){
				$us=mysql_query("update clientes set saldo='$res' where cliente='$cliente'");}
	 }


	 /*ABONOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO*/
	 else if ($ob=='ABONO')
	 {
		 $resto=0;
		 if($_POST['mon']=='MN')
		 {
			 //$pagomn=$importemn-$_POST['fpago'];
			 			 $sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac',".$_POST['fpago'].",'$pagodls','$fpago','$ob', '$usuario')") or die (mysql_error());
			 if($sql)
			 {$res=$saldo-$_POST['fpago'];
			 $total=$restomn-$_POST['fpago'];//resto 
$vr='restomn';
?>
             <script language="javascript">
			 alert ("El resto de la factura es: <?php echo $total;?>");
             </script>
             <?php

			 }
		 }
		  else if($_POST['mon']=='DLS')
		 {
			 
			 $sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac','$pagomn',".$_POST['fpago'].",'$fpago','$ob', '$usuario')") or die (mysql_error());
		 if($sql)
			 {$res=$saldo-$_POST['fpago'];
 			 $total=$restodls-$_POST['fpago'];//resto 
			 $vr='restodls';
			 ?>
             <script language="javascript">
			 alert ("El resto de la factura es: <?php echo $total;?>");
             </script>
             <?php
}
		 }
				$r=mysql_query("update facturacion set $vr='$total' where factura='$fac'");
				if ($r){
				$us=mysql_query("update clientes set saldo='$res' where cliente='$cliente'");}
	 }


	 
/*AJUSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/
else if ($ob=='AJUSTE')
	 {
		 $resto=0;
		 if($_POST['mon']=='MN')
		 {
			 //$pagomn=$importemn-$_POST['fpago'];
  $sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac',".$_POST['fpago'].",'$pagodls','$fpago','$ob', '$usuario')") or die (mysql_error());
			 if($sql)
			 {$res=$saldo-$_POST['fpago'];
			 $total=$restomn-$_POST['fpago'];//resto 
             $vr='restomn';
             ?>
             <script language="javascript">
			 alert ("El resto de la factura es: <?php echo $total;?>");
             </script>
             <?php

			 }
		 }
		  else if($_POST['mon']=='DLS')
		 {
			 
			 $sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac','$pagomn',".$_POST['fpago'].",'$fpago','$ob', '$usuario')") or die (mysql_error());
		 if($sql)
			 {$res=$saldo-$_POST['fpago'];
 			 $total=$restodls-$_POST['fpago'];//resto 
			 $vr='restodls';
			 ?>
             <script language="javascript">
			 alert ("El resto de la factura es: <?php echo $total;?>");
             </script>
             <?php
               }
		      }
				$r=mysql_query("update facturacion set $vr='$total' where factura='$fac'");
				if ($r){
				$us=mysql_query("update clientes set saldo='$res' where cliente='$cliente'");}

               if($us){
		        $up=mysql_query("update facturacion set pagada='on' where factura='$fac'");
		         if ($up)
		       {//die (mysql_error());?>
			   <script language="javascript">
			  alert("AJUSTE REGISTRADO CON EXITO"<?php echo $res?>);
			  </script>
				<?php				
		        }
	         else
	      	{?>
			<script language="javascript">
			alert("OCURRI&Oacute; UN ERROR!!");
			</script>
		 <?php
		      }
	       }
	       else
           {
            ?>
			<script language="javascript">
			alert("OCURRI&Oacute; UN ERROR (update saldo)!!");
			</script>
		    <?php
	        }
	       }

	 }
 }//IF VARIABLE $c***
}//if factura
 if ($tipo=='PEDIDO')
	 {
		 if($_POST['mon']=='MN')
		 {
		 $importemn=$_POST['fpago'];
		 $importedls=0.00;
		 }
		 else if($_POST['mon']=='DLS')
		 {
		 $importedls=$POST['fpago'];
		 $importemn=0.00;
		 }
$sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac','$importemn','$importedls','$fpago','$ob', '$usuario')") or die (mysql_error());
 if ($sql)
		 {//die (mysql_error());?>
			<script language="javascript">
			alert("PAGO DE PEDIDO REGISTRADO CON EXITO");
			</script>
				<?php
		 }
	 else
		{?>
			<script language="javascript">
			alert("OCURRI&Oacute; UN ERROR (pedido)!!");
			</script>
		 <?php
		}
	 }
	}/// FOR
	////////////////////////////////////********************************//////////////////
if ($tipo=='PSA')
{
			 if($_POST['mon']=='MN')
		 {
			 $sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac',".$_POST['fpago'].",'$pagodls','$fpago','$ob', '$usuario')") or die (mysql_error());
			 $res=$saldo-$_POST['fpago'];
			// echo $res."=".$saldo."-".$_POST['fpago'];
			 if($sql)
			 {
				$us=mysql_query("update clientes set saldo='$res' where cliente='$cliente'");
			 }
			 	 }
		  else if($_POST['mon']=='DLS')
		 {
		$sql=mysql_query("insert into cobranza (fechacobro, cliente, facped, importemn, importedls, formapago, observaciones, usuario) values ('$hoy','$cliente','$fac','$pagomn',".$_POST['fpago'].",'$fpago','$ob', '$usuario')") or die (mysql_error());
		  $res=$saldo-$_POST['fpago'];
			// echo $res."=".$saldo."-".$_POST['fpago'];
			 if($sql)
			 {
	$us=mysql_query("update clientes set saldo='$res' where cliente='$cliente'");
			 }
	 }
	
}//PSA
	
?>
</body>
</html>
