<?php
	
	//$my_data=mysql_real_escape_string($q);
	$mysqli=mysqli_connect('localhost','root','Csn960821','comercializadora') or die("Database Error");
	$sql="SELECT id, material FROM material";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['material']."\n";
		}
	}
?>