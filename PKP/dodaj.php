<?php

require_once("config.php");



if (isset($_POST["Data_wpisu"]) &&
isset($_POST["Nazwisko"]) &&
isset($_POST["Numer_pociagu"]) &&
isset($_POST["odjazd"]) &&
isset($_POST["Szac_czas"]) &&
isset($_POST["opoznienie"]) &&
isset($_POST["Pociag"])
) {
    $Data = mysqli_real_escape_string($link, $_POST['Data_wpisu']) ;
    $nazwisko = mysqli_real_escape_string($link, $_POST['Nazwisko']);
    $Numer = mysqli_real_escape_string($link, $_POST['Numer_pociagu']);
    $Szac_czas = mysqli_real_escape_string($link, $_POST['Szac_czas']);
    $Odjazd = mysqli_real_escape_string($link, $_POST['odjazd']);
    $opoznienie = mysqli_real_escape_string($link, $_POST['opoznienie']);
    $pociag =mysqli_real_escape_string($link,$_POST['Pociag']);

    

    if ($link) {
        $query = "INSERT INTO dane (`ID`, `Nazwisko`, `Pociag`, `Data_wpisu`, `Numer_pociagu`, `odjazd`, `Szac_czas`, `opoznienie`) 
        VALUES ('', '$nazwisko', '$pociag', '$Data', $Numer, '$Odjazd', '$Szac_czas', $opoznienie)";

        if (mysqli_query($link, $query)) {
            echo "Dane zostały wstawione<br>";
        } else {
            echo "Błąd podczas dodawania danych: " . mysqli_error($link);
            echo "Query: " . $query;
        }
    } else {
        echo "Błąd połączenia z bazą danych";
    }
}
$Data = date('Y-m-d');
echo "Dzisiejsza data: <br>" . $Data;
?>

<div>
    <form action="dodaj.php" method="POST">
   <!-- Podaj Date wpisu: -->  <input type="text" hidden name="Data wpisu" value ="<?php echo $Data; ?>" >
    Podaj Numer: <input type="number" name="Numer pociagu" required min="0"><br>
    Podaj Nazwisko: <input type="text" name="Nazwisko" required><br>
    Podaj Date Odjazdu: <input type="date" name="odjazd" required><br>
    Podaj Szacunkowy czas odjazdu: <input type="varchar" name="Szac czas" required><br>
    Podaj Opóźnienie: <input type="number" name="opoznienie" value=0 required min='0'><br>
    Podaj Nazwe: <input type="text" name="Pociag" required><br>  
        <input type="submit" name="Wyslij" value="Wyslij">
    </form>
</div>
<?php
echo "<br> <a href='wyswietl.php'>Powrot</a> ";


?>
