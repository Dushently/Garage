<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author"
          content="Dushently Isenia">
    <title>gar-read-klant.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<body>
<header><h1 class="h1menu">Garage read eigenaren</h1>
    <h2 class="h2menu">Dit zijn alle gegevens van de database garage</h2></header>

<?php

//tabel uitlezen en netjes afdrukken -------------------------------
require_once "gar-connect.php";
$sql = $conn->prepare("
SELECT klant.klantid,klant.klantnaam,klant.klantadres,klant.klantpostcode,klant.klantplaats,auto.autokenteken, auto.automerk,auto.autotype,auto.autokmstand
FROM klant
INNER JOIN auto ON auto.klantid = klant.klantid ORDER BY klantid;
");

$sql->execute();
echo "<table>";
echo "<th>";
echo "<th>" . "klantid" . "</th>";
echo "<th>" . "klantnaam" . "</th>";
echo "<th>" . "klantadres" . "</th>";
echo "<th>" . "klantpostcode" . "</th>";
echo "<th>" . "klantplaats" . "</th>";
echo "<th>" . "autokenteken" . "</th>";
echo "<th>" . "automerk" . "</th>";
echo "<th>" . "autotype" . "</th>";
echo "<th>" . "autokmstand" . "</th>";
echo "</tr>";
foreach ($sql as $rij) {
    echo "<tr>";
    echo "<td>" . $rij["klantid"] . "</td>";
    echo "<td>" . $rij["klantnaam"] . "</td>";
    echo "<td>" . $rij["klantadres"] . "</td>";
    echo "<td>" . $rij["klantpostcode"] . "</td>";
    echo "<td>" . $rij["klantplaats"] . "</td>";
    echo "<td>" . $rij["autokenteken"] . "</td>";
    echo "<td>" . $rij["automerk"] . "</td>";
    echo "<td>" . $rij["autotype"] . "</td>";
    echo "<td>" . $rij["autokmstand"] . "</td>";
    echo "</tr>";


}
echo "</table>";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";
?>

</body>
</html>