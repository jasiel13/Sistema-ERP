
<link rel="stylesheet" href="../css/bootstrap.min.css">
<?php
//session_start();

include "conexionBD.php";
if(isset($_POST['usu']))
{
	//Validar que realmente existan datos
	if(empty($_POST['usu']) || empty($_POST['pass']))
	{
		echo 'No dejes campos en blanco';
	} 
	else
	{
		//EN ESTA SECCION ES DONDE SE ADMINISTRARA LOS ROLES DE CADA USUARIO
		//#HACIENDO PRUEBAS CON LOS DATOS DE ENTRADA
		//Primero definimos la consulta, recomendable probar en el workbench 
		$login=$connection->prepare("select usuario, contrasenia, nombre, fkRolUsuario from usuarios where usuario=:username and contrasenia=:password");
		//Segun definimos los parametros de entrada, bindParam es un metodo del PDO
		$login->bindParam(':username',$_POST['usu']);
		$login->bindParam(':password',$_POST['pass']);
		//Tercero ejecutamos la consulta, execute es un metodo del PDO
		$login->execute();
		$rol=$login->fetch();//Obtiene el rol del usuario
		if($login->rowCount()>0)
		{
			if($rol['fkRolUsuario']==1)//el 1 indica como rol de gerente
			{	
				session_start();
				$_SESSION['usu']=$rol['usuario'];								
				// echo"<script language='javascript'>alert('En unos segundos se iniciara sección');</script>"; 
				echo "<p class='text-center'>Se Inicara sesion En unos segudos</p>";
				//Abrir el archivo pagina como gerente
				header('refresh:3;url=adm-index.php');

				 
   			} 

			
			if($rol['fkRolUsuario']==2)//el 2 indica como rol de empleado
			{
				session_start();
				$_SESSION['usu']=$rol['usuario'];									//Abrir el archivo como empleado
				// echo"<script language='javascript'>alert('En unos segundos se iniciara sección'); window.location.href=\".php\"</script>"; 
				echo "<p class='text-center'>Se Inicara sesion En unos segudos</p>";
				header('refresh:3;url=usu-index.php');


				
			}

						if($rol['fkRolUsuario']==3)//el 3 indica como rol de empleado
			{
				session_start();
				$_SESSION['usu']=$rol['usuario'];									//Abrir el archivo como empleado
				// echo"<script language='javascript'>alert('En unos segundos se iniciara sección'); window.location.href=\".php\"</script>"; 
				echo "<p class='text-center'>Se Inicara sesion En unos segudos</p>";
				header('refresh:3;url=index.php');


				
			}
		}
		
		else
			echo 'Datos incorrectos';
			
		}


	}

?>