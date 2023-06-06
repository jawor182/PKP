
<html>
<head>
<style>
table{
    
    margin-left: 37%;
    background-color: lightgray;
}
#a{
    margin-left: 1%;
    margin-top: 150px;
}
#tabela2{
    margin-top: 150px;
    background-color: lightcoral;
}

#formularz{
    text-align: center;
}
body{
    text-align: center;
}

</style>
</head>
<body>
<?php
	require_once("config.php");
	
	$link=mysqli_connect("localhost",
						$db_user,
						$db_pass,
						"PKP");
						
						$Data = date('Y-m-d');
						echo "<h3 class='Data'>Dzisiejsza data: <br>" . $Data . "</h3>";					
	if($link){
		$res=mysqli_query($link, "SELECT *  from dane ");
		echo "<table border='1'>";
		echo "<tr><th>Data wpisu</th><th>nazwisko</th><th>Numer</th><th>Szac czas</th><th>Odjazd</th><th>Pociag</th><th>opoznienie</th><th>Opcje</th>";
		while ($row=mysqli_fetch_assoc($res)){
			$id=$row["ID"];
			
			$pociag=$row["Pociag"];
			$Numer=$row["Numer_pociagu"];
			$nazwisko=$row["Nazwisko"];
			$Szac_czas=$row["Szac_czas"];
			$Odjazd=$row["odjazd"];
			$opoznienie=$row["opoznienie"];
			$Data = $row['Data_wpisu'];
			echo "<tr>
					<td>$Data</td>
					<td>$nazwisko</td>
					<td>$Numer</td>
					<td>$Szac_czas</td>
					<td>$Odjazd</td>
					<td>$pociag</td>
					<td>$opoznienie</td>
				
					<td>
						<a href='delete.php?mojId=$id'>Kasuj</a>
						<a href='edit.php?mojId=$id'>Edytuj</a>
					</td>
				</tr>";
			
			
		}
		if($link){
		
			$res_opoznienie = mysqli_query($link, "SELECT *
			FROM `dane`
			WHERE odjazd = '$Data'
			ORDER BY opoznienie DESC, Data_wpisu DESC
			LIMIT 1
			");

			echo "<table border='1' id='tabela2'>";
			echo "<tr><th>Data wpisu</th><th>nazwisko</th><th>Numer</th><th>Szac czas</th><th>Odjazd</th><th>Pociag</th><th>opoznienie</th><th>Opcje</th>";
			while ($row=mysqli_fetch_assoc($res_opoznienie)){
				
				$pociag=$row["Pociag"];
				$Numer=$row["Numer_pociagu"];
				$nazwisko=$row["Nazwisko"];
				$Szac_czas=$row["Szac_czas"];
				$Odjazd=$row["odjazd"];
				$opoznienie=$row["opoznienie"];
				$Data = $row['Data_wpisu'];
				echo "<tr>
						<td>$Data</td>
						<td>$nazwisko</td>
						<td>$Numer</td>
						<td>$Szac_czas</td>
						<td>$Odjazd</td>
						<td>$pociag</td>
						<td>$opoznienie</td>
						<td>
						<a href='delete.php?mojId=$id'>Kasuj</a>
						<a href='edit.php?mojId=$id'>Edytuj</a>
					</td>
					</tr>";
				
				// SELECT * FROM dane WHERE opoznienie = (SELECT MAX(opoznienie) FROM dane)  AND Data_wpisu = '$Data_wpisu';;
		
			}
			echo "</table>";
			}
			
		echo "</table>";
		echo "<br> <a id='a' href='dodaj.php'>Dodaj dane</a>";
		echo "<br> <a id='a'href='logout.php'>Wyloguj sie</a>";
	
		mysqli_close($link);
	}


?>
</body>
</html>