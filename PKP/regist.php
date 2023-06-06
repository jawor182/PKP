<html>
    <link rel="stylesheet" href="global.css">

    <body>
    <form action="regist.php" method='post'>
    Podaj login:<input type="login" required name="Imie"><br>
    Podaj hasło <input type="password" name="haslo" required><br>
    <input type="submit" name="Wyślij">
</form>

<?php
require('config.php');

if (isset($_POST['Imie']) && isset($_POST['haslo'])) {
    $imie = $_POST['Imie'];
    $haslo = $_POST['haslo'];

    if ($regist_link) {
        $query = "INSERT INTO `uzytkownik` (`ID`, `Imie`, `haslo`) 
        VALUES ('', '$imie', '$haslo')";

        if (mysqli_query($regist_link, $query)) {
            echo "Zarejestrowano";
            echo "<br><a href='PanelGlowny.php'>Powrot</a>";
        } else {
            echo "Błąd podczas rejestracji: " . mysqli_error($regist_link);
            echo "Query: " . $query;
        }
    }
}
?>

</body>
</html>