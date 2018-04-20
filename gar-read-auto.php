<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author"
          content="Dushently Isenia">
    <title>gar-read-auto.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">Garage read auto</h1>
    <h2 class="h2menu">Dit zijn alle gegevens van de database garage</h2></header>
<body>

<?php

//tabel uitlezen en netjes afdrukken -------------------------------
require_once "gar-connect.php";
$sql = $conn->prepare("
SELECT autokenteken,
        automerk,
        autotype,
        autokmstand,
        klantid
FROM    auto
");

$sql->execute();
echo "<table>";
echo "<tr>";
echo "<th>" . "autokenteken"."<th>";
echo "<th>" . "automerk"."<th>";
echo "<th>" . "autotype"."<th>";
echo "<th>" ."autokmstand"."<th>";
echo "<th>" . "klantid"."<th>";
echo "</tr>";
foreach($sql as $rij)
{

    echo "<tr>";
    echo "<td>" . $rij["autokenteken"]."<td>";
    echo "<td>" . $rij["automerk"]."<td>";
    echo "<td>" . $rij["autotype"]."<td>";
    echo "<td>" . $rij["autokmstand"]."<td>";
    echo "<td>" . $rij["klantid"]."<td>";
    echo "</tr>";

}
echo "</table>";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";
?>

</body>
</html>