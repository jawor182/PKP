<?php
///prawa dostepu 644
	$db_host="localhost";
	$db_user="admin" ;
	$db_pass="admin";
	$db_name="PKP";
	
	$db_regist_user = 'root';
	$db_regist_pass = '';
	
	$link = mysqli_connect($db_host,$db_user,$db_pass, $db_name);
	$regist_link = mysqli_connect($db_host,$db_regist_user,$db_regist_pass,$db_name);

	
	
	
?>