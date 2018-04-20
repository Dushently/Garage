<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author"
          content="Dushently Isenia">
    <title>gar-search-klant2.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage zoek op klantid 2</h1>
    <p>Op klantid gegevens zoeken uit de tabel klanten van de database garage</p>

</header>
<body>

<?php
//klantid uit het formulier halen-------------------------======-------
$klantid = $_POST["klantidvak"];

//klantgegevens uit de tabel halen-------------------------======-------
require_once "gar-connect.php";


$sql = $conn->prepare("
SELECT autokenteken,
        automerk,
        autotype,
        autokmstand,
        klantid
FROM    auto
  WHERE klantid = :klantid
    ");
$sql->execute(["klantid" => $klantid]);

//klantgegevens laten zien-------------------------======-------

echo "<table>";
echo "<tr>";
echo "<th>" . "autokenteken" . "<td>";
echo "<th>" . "automerk" . "<td>";
echo "<th>" . "autotype" . "<td>";
echo "<th>" . "autokmstand" . "<td>";
echo "<th>" . "klantid" . "<td>";
echo "</tr>";

foreach ($sql as $rij) {
    echo "<tr>";
    echo "<td>" . $rij["autokenteken"] . "<td>";
    echo "<td>" . $rij["automerk"] . "<td>";
    echo "<td>" . $rij["autotype"] . "<td>";
    echo "<td>" . $rij["autokmstand"] . "<td>";
    echo "<td>" . $rij["klantid"] . "<td>";
    echo "</tr>";
}
echo "</table><br />";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";

?>
</body>
</html>