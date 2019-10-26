<?php
	/*$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);*/
	$mysqlia=mysqli_connect('localhost','root','Csn960821','comercializadora') or die("Database Error");
	$sqla="SELECT Codigo FROM articulos";
	$resulta = mysqli_query($mysqlia,$sqla) or die(mysqli_error());
	
	if($resulta)
	{
		while($rows=mysqli_fetch_array($resulta))
		{
			echo $rows['Codigo']."\n";
		}
	}
?>