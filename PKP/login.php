<?php
session_start();
require_once("config.php");
if (isset($_POST["login"]) && 
	isset($_POST["pass"]))

{
	$login= $_POST['login'];
	$pass=$_POST['pass'];
	
	$link=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	$res=mysqli_query($link, "SELECT * FROM uzytkownik WHERE imie='$login' 
	AND haslo='$pass'");
		
		
	//sprawdzam czy zalogowano
	if (mysqli_num_rows($res)>0){
		$_SESSION["zalogowany"]=1;
		$_SESSION["login"]=$login;
		echo "Zostałeś zalogowany jako: ".$_SESSION["login"];
		
		echo "<br> <a href='logout.php'>Wyloguj sie</a>";
		if($login == "admin"){
			echo "<br> <a href='wyswietl.php'>Wyświetl dane i zedytuj</a> ";
		}
		else{
			echo "<br> <a href='wyswietlBezEdycji.php'>Wyświetl dane</a> ";
		}
	}
	else{
		echo "Nie udało ci sie zalogować<br>";
		echo "<a href='PanelGlowny.php'>Zaloguj sie ponownie</a>";
	}
}

?>