<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PKP</title>
</head>
<body>
    
  <?php
    if (
		
		isset($_POST["Data wpisu"]) &&
		isset($_POST["Numer"]) &&
		isset($_POST["Nazwisko"]) &&
		isset($_POST["Data Odjazdu"])&&
		isset($_POST["Szacunkowy Czas Odjazdu"]) &&
		isset($_POST["Opóźnienie"]) &&
		isset($_POST["Nazwa"]) 
		
	){
		
		
		$DataWpisu=$_POST["Data wpisu"];
		$Numer=$_POST["Numer"];
		$Nazwisko=$_POST["Nazwisko"] ;
		$DataOdj=$_POST["Data Odjazdu"];
		$SzacCzasOdj=$_POST["Szacunkowy Czas Odjazdu"];
		$Opoznienie = $_POST["Opóźnienie"] ;
		$Nazwa = $_POST["Nazwa"];
		

		//łączenie do bazy danych
		$dbhost="localhost";
		$dbname="pkp";
		$dbuser="root";
		$dbpass="";
		$conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn){
			mysqli_query($conn, "INSERT INTO dane VALUES('',$DataWpisu,$Numer, $DataOdj, $Nazwisko,$SzacCzasOdj, $Opoznienie, $Nazwa");
			echo "Dane zostaly wstawione";
		}else{
			echo "Blad laczenia do bazy";
        }
		}
        ?>
        <h1 class="tytul">PKP</h1>
        <form action="dodaj.php" method="post">
		Podaj Date wpisu: <input type="date" name="Data wpisu"><br>
		Podaj Numer: <input type="number" name="Numer"><br>
		Podaj Nazwisko: <input type="text" name="Nazwisko"><br>
		Podaj Date Odjazdu: <input type="datetime" name="Data Odjazdu"> <br>
		Podaj Szacunkowy czas odjazdu: <input type="datetime" name="Szacunkowy Czas Odjazdu"><br>
		Podaj Opóźnienie: <input type="number" name="Opoznienie"><br>
		Podaj Nazwe: <input type="text" name="Nazwa"><br>
		<input type="submit" value="Wyslij do bazy">
	</form>

</body>
</html>