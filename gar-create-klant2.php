<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dushently Isenia">
    <link rel="stylesheet" href="menu.css" type="text/css">

    <title>gar-create-klant.php2</title>
</head>
<header><h1 class="h1menu">garage create klant 2</h1>
    <p>Een klant toevoegen aan de tabel
        klant in de database garage.</header>

<body>

</p>
<?php
//klantgegevens uit her formulier halen ------------------------------------
$klantid        =   NULL; //komt niet uit het formulier (autoincrement)
$klantnaam      = $_POST["klantnaamvak"];
$klantadres     = $_POST["klantadresvak"];
$klantpostcode  = $_POST["klantpostcodevak"];
$klantplaats    = $_POST["klantplaatsvak"];


// klantegevens invoeren in de tabel ---------------------------------------
require_once "gar-connect.php";
$sql = $conn->prepare("
                                insert into klant values
                                (
                                    :klantid, :klantnaam, :klantadres, 
                                    :klantpostcode, :klantplaats
                                )
                             ");

$sql->execute([
                "klantid"  => $klantid,
                "klantnaam"=> $klantnaam,
                "klantadres"=> $klantadres,
                "klantpostcode"=> $klantpostcode,
                "klantplaats"=> $klantplaats
]);

echo "De klant is toegevoegd <br />";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";
?>
</body>
</html>