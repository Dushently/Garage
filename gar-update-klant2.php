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
    <p>Op klantid gegevens zoeken uit de tabel klanten van de database garage</p></header>
<body>


<?php
//klantid uit het formulier halen-------------------------======-------
$klantid = $_POST["klantidvak"];

//klantgegevens uit de tabel halen-------------------------======-------
require_once "gar-connect.php";


$klanten= $conn->prepare(" SELECT klantid,
                                         klantnaam,
                                         klantadres,
                                         klantpostcode,
                                         klantplaats
                                  FROM   klant
                                  WHERE klantid = :klantid
    ");
$klanten->execute(["klantid" => $klantid]);
//klantgegevens in een nieuw formulier laten zien -------------------------======-------
echo "<form action='gar-update-klant3.php' method='post' id=\"form\">";
foreach ($klanten as $klant) {
    //klantid mag niet gewijzigd worden
    echo "klantid:" . $klant["klantid"];
    echo "<input type='hidden' name='klantidvak' ";
    echo "value='" . $klant["klantid"] . "'> <br/> ";

    echo "klantnaam: <input type='text' ";
    echo "name ='klantnaamvak'";
    echo "value = '" . $klant["klantnaam"] . "'";
    echo "'> <br/> ";

    echo "klantadres: <input type='text' ";
    echo "name ='klantadresvak'";
    echo "value = '" . $klant["klantadres"] . "'";
    echo "'> <br/> ";

    echo "klantpostcode: <input type='text' ";
    echo "name ='klantpostcodevak'";
    echo "value = '" . $klant["klantpostcode"] . "'";
    echo "'> <br/> ";

    echo "klantplaats: <input type='text' ";
    echo "name ='klantplaatsvak'";
    echo "value = '" . $klant["klantplaats"] . "'";
    echo "'> <br/> ";
}
echo "    <input type=\"submit\" value=\"Voltooien\" class=\"formbtn\">
";
echo "</form>";

// er moet eigenlijk nog gecontroleeerd worden op een bestaaand klantid


?>
</body>
</html>