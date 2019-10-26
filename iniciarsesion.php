    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include ('conexion.php');
	   $nombre = $_POST['usuario']; 
	   $pass = $_POST['clave'];
	   $login=mysql_query("SELECT usuario, clave, tipo FROM usuarios WHERE usuario='$nombre' AND clave='$pass'");
	   $linea=mysql_fetch_array($login);
	 
	    echo $linea[2];
	  if(mysql_num_rows($login)!=0)
	   {
		  if ( $linea[2]== "1")
		   {
session_start();
$_SESSION["autentificado"]="1";
$_SESSION["name"]=$_POST["usuario"];
$_SESSION["pass"]=$_POST["clave"];
	   //header("Location: plantilla.php");
		   }
		  
		 if ($linea[2]== "2")
		   {
			   session_start();
			    $_SESSION["autentificado"]="2";
				$_SESSION["name"]=$_POST["usuario"];
				$_SESSION["pass"]=$_POST["clave"];
				
		   }
		   if ($linea[2]== "3")
		   {
			   session_start();
			    $_SESSION["autentificado"]="3";
				$_SESSION["name"]=$_POST["usuario"];
				$_SESSION["pass"]=$_POST["clave"];
				
		   }
			if ($linea[2]== "4")
		   {
			   session_start();
			    $_SESSION["autentificado"]="4";
				$_SESSION["name"]=$_POST["usuario"];
				$_SESSION["pass"]=$_POST["clave"];
				
		   }
		   if ($linea[2]== "5")
		   {
			   session_start();
			    $_SESSION["autentificado"]="5";
				$_SESSION["name"]=$_POST["usuario"];
				$_SESSION["pass"]=$_POST["clave"];
				
		   }
		   if ($linea[2]== "6")
		   {
			   session_start();
			    $_SESSION["autentificado"]="6";
				$_SESSION["name"]=$_POST["usuario"];
				$_SESSION["pass"]=$_POST["clave"];
				
		   }
		   if ($linea[2]== "7")
		   {
			   session_start();
			    $_SESSION["autentificado"]="7";
				$_SESSION["name"]=$_POST["usuario"];
				$_SESSION["pass"]=$_POST["clave"];
				
		   }
		   if ($linea[2]== "8")
		   {
			   session_start();
			    $_SESSION["autentificado"]="9";
				$_SESSION["name"]=$_POST["usuario"];
				$_SESSION["pass"]=$_POST["clave"];
				
		   }
		   if ($linea[2]== "10")
		   {
			   session_start();
			    $_SESSION["autentificado"]="10";
				$_SESSION["name"]=$_POST["usuario"];
				$_SESSION["pass"]=$_POST["clave"];
				
		   }
		   else
			{ 
			echo '<center><font color="#0D285C" size="9"><strong><b>Acceso No Autorizado </b></center></strong></font><br><br>';
				//header("refresh: 2; url= login.php");
			}
			header("Location: plantilla.php");
	   }
	 else
	   {
		  echo '<center><font color="#0D285C" size="7"><strong><b>Usuario o Contraseña Incorrecto</b></center></strong></font><br><br>';
		  header("refresh: 2; url= login.php");
	   }
	     
?>
