<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author"
          content="Dushently Isenia">
    <title>gar-search-klant2.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage zoek op klantid 2</h1><p>Op klantid gegevens zoeken uit de tabel klanten van de database garage</p>

</header>
<body>

<?php
//klantid uit het formulier halen-------------------------======-------
$klantid = $_POST["klantidvak"];

//klantgegevens uit de tabel halen-------------------------======-------
require_once "gar-connect.php";


$sql = $conn->prepare(" SELECT klantid,
                                         klantnaam,
                                         klantadres,
                                         klantpostcode,
                                         klantplaats
                                  FROM   klant
                                  WHERE klantid = :klantid
    ");
$sql->execute(["klantid" => $klantid]);

//klantgegevens laten zien-------------------------======-------

echo "<table>";
echo "<tr>";
echo "<th>" . "klantid" . "<td>";
echo "<th>" . "klantnaam" . "<td>";
echo "<th>" . "klantadres" . "<td>";
echo "<th>" . "klantpostcode" . "<td>";
echo "<th>" . "klantplaats" . "<td>";
echo "</tr>";

foreach ($sql as $rij) {
    echo "<tr>";
    echo "<td>" . $rij["klantid"] . "<td>";
    echo "<td>" . $rij["klantnaam"] . "<td>";
    echo "<td>" . $rij["klantadres"] . "<td>";
    echo "<td>" . $rij["klantpostcode"] . "<td>";
    echo "<td>" . $rij["klantplaats"] . "<td>";
    echo "</tr>";

}
echo "</table><br />";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";

?>
</body>
</html>