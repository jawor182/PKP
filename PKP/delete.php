<?php
	require_once("config.php");
	
	
	$link=mysqli_connect($db_host,
						$db_user,
						$db_pass,
						$db_name);
						
	if (isset($_GET["mojId"])){
		$id=$_GET["mojId"];
		if($link){
			$res=mysqli_query($link, "DELETE FROM `dane` WHERE `dane`.`id` = $id");
			echo "Skasowano";
			echo "<br> <a href='wyswietl.php'>Powrót</a>";
		}
	}
?>