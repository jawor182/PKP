<?php
session_start();
if (isset($_SESSION["zalogowany"])){
	echo "jestes zalogowany jako: ".$_SESSION["login"];
	echo "<br> <a href='logout.php'>Wyloguj sie</a>";
	
}else{
	echo "Musisz sie zalogowac: <a href='PanelGlowny.php'>Zaloguj sie</a>";
}
?>