<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dushently Isenia">
    <title>gar-update-klant3.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage update klant 3</h1>
    <p>klant gegevens wijzigen in de tabel klant van de database garage</p>
</header>
<body>

<?php
//klantgegevens uit her formulier halen ------------------------------------
$klantid        =   NULL; //komt niet uit het formulier (autoincrement)
$klantid        = $_POST["klantidvak"];
$klantnaam      = $_POST["klantnaamvak"];
$klantadres     = $_POST["klantadresvak"];
$klantpostcode  = $_POST["klantpostcodevak"];
$klantplaats    = $_POST["klantplaatsvak"];


// update klantgegevens ---------------------------------------
require_once "gar-connect.php";
$sql = $conn->prepare("
                                UPDATE klant SET
                                
                                    klantnaam = :klantnaam, 
                                    klantadres = :klantadres, 
                                    klantpostcode = :klantpostcode,
                                     klantplaats  = :klantplaats
                                     WHERE klantid = :klantid
                                
                             ");

$sql->execute([
    "klantid"  => $klantid,
    "klantnaam"=> $klantnaam,
    "klantadres"=> $klantadres,
    "klantpostcode"=> $klantpostcode,
    "klantplaats"=> $klantplaats
]);

echo "De klant is gewijzigd <br />";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";
?>
</body>
</html>