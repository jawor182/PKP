<html>
	<link rel="stylesheet" href="global.css">
<style>
	#tabela2{
		margin-top: 150px;
		background-color: lightcoral;
	}

	#formularz{
		text-align: center;
		margin-right: 5%;
	}
	body{
		text-align: center;
		
	}
	h3{
		margin-right: 5%;
	}
	#text{
		margin-right: 5%;
	}
</style>
<body>
	<?php
	$Data = date('Y-m-d');
	echo "<h3 class='Data'>Dzisiejsza data: <br>" . $Data . "</h3>";
	?>
	<br><div id="text">Formularz logowania w systemie:</div>
	<form id="formularz"action="login.php" method="post">
		podaj login: <input type="text" name="login" required><br>
		podaj haslo: <input type="password" name="pass" required><br>
		
		<input type="submit" value="Zaloguj sie">
		<a href='regist.php'>Nie masz konta? Zarejestruj sie</a><br>
		
	</form>
	<div>
	<?php
	require_once("config.php");
	
	if(
       
	   isset($_POST['nazwisko']) &&
	   isset($_POST['Data wpisu']) &&
	   isset($_POST["ID"]) &&
	   isset($_POST["Numer pociagu"]) &&
	   isset($_POST["Odjazd"]) && 
	   isset($_POST['Szac czas']) &&
	   isset($_POST['opoznienie']) &&
	   isset($_POST['pociag']))
	   
	   {

		$nazwisko = $_POST['Nazwisko'];
		$Data = $_POST['Data wpisu'];
		$ID = $_POST['ID'];
		$Numer = $_POST=['Numer pociagu]'];
		$Szac_czas = $_POST=['Szac czas'];
		$Odjazd = $_POST=['odjazd'];
		$opoznienie = $_POST=['opoznienie'];
		$pociag = $_POST=['Pociag'];
		


    }
	$link=mysqli_connect($db_host = 'localhost',"root" ,'', "PKP");
			
						
	if($link){
		$res=mysqli_query($link, "SELECT * from dane");
		echo "<table border='1' id='tabela1'>";
		echo "<tr><th>nazwisko</th><th>Numer</th><th>Szac czas</th><th>Odjazd</th><th>Pociag</th><th>opoznienie</th>";
		while ($row=mysqli_fetch_assoc($res)){
			
			$pociag=$row["Pociag"];
			$Numer=$row["Numer_pociagu"];
			$nazwisko=$row["Nazwisko"];
			$Szac_czas=$row["Szac_czas"];
			$Odjazd=$row["odjazd"];
			$opoznienie=$row["opoznienie"];
			$Data = $row['Data_wpisu'];
			echo "<tr>
					
					<td>$nazwisko</td>
					<td>$Numer</td>
					<td>$Szac_czas</td>
					<td>$Odjazd</td>
					<td>$pociag</td>
					<td>$opoznienie</td>
				</tr>";
			
			// SELECT * FROM dane WHERE opoznienie = (SELECT MAX(opoznienie) FROM dane)  AND Data_wpisu = '$Data_wpisu';;

		}
		echo "</table>";
		
		
	
		
	}

	if($link){
		
	$res_opoznienie=mysqli_query($link, "SELECT *
	FROM `dane`
	WHERE odjazd = '$Data'
	ORDER BY opoznienie DESC, Data_wpisu DESC
	LIMIT 1
	");
	echo "<table border='1' id='tabela2'>";
	echo "<tr><th>Nazwisko</th><th>Numer</th><th>Szac czas</th><th>Odjazd</th><th>Pociag</th><th>opoznienie</th>";
	while ($row=mysqli_fetch_assoc($res_opoznienie)){
		
		$pociag=$row["Pociag"];
		$Numer=$row["Numer_pociagu"];
		$nazwisko=$row["Nazwisko"];
		$Szac_czas=$row["Szac_czas"];
		$Odjazd=$row["odjazd"];
		$opoznienie=$row["opoznienie"];
		$Data = $row['Data_wpisu'];
		echo "<tr>
				
				<td>$nazwisko</td>
				<td>$Numer</td>
				<td>$Szac_czas</td>
				<td>$Odjazd</td>
				<td>$pociag</td>
				<td>$opoznienie</td>
			</tr>";
		
		// SELECT * FROM dane WHERE opoznienie = (SELECT MAX(opoznienie) FROM dane)  AND Data_wpisu = '$Data_wpisu';;

	}
	echo "</table>";
	}
	mysqli_close($link);
?>
	</div>
	
	
</body>
</html>