<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author"
          content="Dushently Isenia">
    <title>gar-read-klant.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">
</head>
<header><h1 class="h1menu">Garage read klant</h1>
    <h2 class="h2menu">Dit zijn alle gegevens van de database garage</h2></header>
<body>

<?php

//tabel uitlezen en netjes afdrukken -------------------------------
require_once "gar-connect.php";
$sql = $conn->prepare("
SELECT 
        klantnaam,
        klantadres,
        klantpostcode,
        klantplaats,
        klantid
FROM    klant
");

$sql->execute();
echo "<table>";
echo "<th>";
echo "<th>" . "klantnaam"."<th>";
echo "<th>" . "klantadres"."<th>";
echo "<th>" . "klantpostcode"."<th>";
echo "<th>" . "klantplaats"."<th>";
echo "<th>" . "klantid"."<th>";
echo "</tr>";
    foreach($sql as $rij)
    {
        echo "<tr>";
        echo "<td>" . $rij["klantnaam"]."<td>";
        echo "<td>" . $rij["klantadres"]."<td>";
        echo "<td>" . $rij["klantpostcode"]."<td>";
        echo "<td>" . $rij["klantplaats"]."<td>";
        echo "<td>" . $rij["klantid"]."<td>";

        echo "</tr>";

    }
    echo "</table>";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";
?>

</body>
</html>