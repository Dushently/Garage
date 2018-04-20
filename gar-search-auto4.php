<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-zoek-auto2.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">Garage zoek op klantid 2</h1><p>Op klantid gegevens zoeken uit de tabel auto van de database garage.</p>

</header>
<body>
<?php
// klantid uit het formulier halen
$autotype = $_POST["autotype"];
// klantgegevens uit de tabel halen
require_once "gar-connect.php";

$sql = $conn->prepare("SELECT auto.*, klant.* FROM auto INNER JOIN klant ON auto.klantid = klant.klantid WHERE autotype LIKE :autotype");
$sql->execute(["autotype" => '%' . $autotype . '%']);

// klantgegevens laten zien
echo "<table>";
echo "<tr>";
echo "<th>" . "autokenteken" . "</td>";
echo "<th>" . "automerk" . "</td>";
echo "<th>" . "autotype" . "</td>";
echo "<th>" . "autokmstand" . "</td>";
echo "<th>" ."klantnaam" . "</td>";
echo "<th>" . "klantadres" . "</td>";
echo "<th>" . "klantpostcode" . "</td>";
echo "<th>" . "klantplaats" . "</td>";
echo "</tr>";
foreach ($sql as $result) {
    echo "<tr>";
    echo "<td>" . $result["autokenteken"] . "</td>";
    echo "<td>" . $result["automerk"] . "</td>";
    echo "<td>" . $result["autotype"] . "</td>";
    echo "<td>" . $result["autokmstand"] . "</td>";
    echo "<td>" . $result["klantnaam"] . "</td>";
    echo "<td>" . $result["klantadres"] . "</td>";
    echo "<td>" . $result["klantpostcode"] . "</td>";
    echo "<td>" . $result["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table><br />";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu</a>";

?>
</body>
</html>