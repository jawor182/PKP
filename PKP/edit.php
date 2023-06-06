<?php

	require_once("config.php");
	
	$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	// Tutaj wchodzę, kiedy przychodzi odnośnik w stylu edit.php?mojId=34
	if (isset($_GET["mojId"])) {
		$id = $_GET["mojId"];
		if ($link) {
			echo "<form action='edit.php' method='post'>";
			$res = mysqli_query($link, "SELECT * FROM dane WHERE ID=$id");
			$row = mysqli_fetch_assoc($res);
			
			$pociag = $row["Pociag"];
			$Numer = $row["Numer_pociagu"];
			$nazwisko = $row["Nazwisko"];
			$Szac_czas = $row["Szac_czas"];
			$Odjazd = $row["odjazd"];
			$opoznienie = $row["opoznienie"];
			$Data = $row['Data_wpisu'];
			
			echo "<input type='hidden' name='ID' value='$id'>";
			echo "<input type='hidden' name='Data_wpisu' value='$Data'>";
			echo "Nazwa pociągu: <input type='text' name='Pociag' value='$pociag'><br>";
			echo "Nazwisko maszynisty: <input type='text' name='Nazwisko' value='$nazwisko'><br>";
			echo "Odjazd: <input type='date' name='odjazd' value='$Odjazd'><br>";
			echo "Opóźnienie: <input type='number' name='opoznienie' value='$opoznienie'><br>";
			echo "Szacowany czas: <input type='varchar' name='Szac_czas' value='$Szac_czas'><br>";
			echo "Numer <input type='number' name ='Numer_pociagu' value='$Numer'> ";
			
			echo "<input type='submit' value='Zapisz zmiany'>";
			echo "</form>";
		}
	}
	
	if (
	isset($_POST["Data_wpisu"]) &&
	isset($_POST["Nazwisko"]) &&
	isset($_POST["Numer_pociagu"]) &&
	isset($_POST["odjazd"]) &&
	isset($_POST["Szac_czas"]) &&
	isset($_POST["opoznienie"]) &&
	isset($_POST["Pociag"]) &&
	isset($_POST["ID"])
	
	) {
		$id = $_POST["ID"];
		$Data = mysqli_real_escape_string($link, $_POST['Data_wpisu']);
		$nazwisko = mysqli_real_escape_string($link, $_POST['Nazwisko']);
		$Numer = (int)$_POST['Numer_pociagu'];
		$Szac_czas =  $_POST['Szac_czas'];
		$Odjazd = mysqli_real_escape_string($link, $_POST['odjazd']);
		$opoznienie = mysqli_real_escape_string($link, $_POST['opoznienie']);
		$pociag = mysqli_real_escape_string($link, $_POST['Pociag']);
		
		mysqli_query($link, "UPDATE dane SET
                        Pociag='$pociag',
                        Nazwisko='$nazwisko',
                        Numer_pociagu=$Numer,
                        odjazd='$Odjazd',
                        opoznienie=$opoznienie,
                        Szac_czas='$Szac_czas',
                        Data_wpisu='$Data'
                     WHERE
                        ID=$id");
		
		echo "Edytowano";
		echo "<br><a href='wyswietl.php'>Powrót</a>";
	}
	
	
?>
