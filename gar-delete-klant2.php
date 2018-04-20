<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dushently Isenia">
    <title>gar-delete-klant2.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage delete klant 2</h1><p>
        op klantid gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderd kunnnen worden
    </p>
</header>
<body>

<?php
//klantgegevens uit her formulier halen ------------------------------------
$klantid = $_POST["klantidvak"];

// update klantgegevens ---------------------------------------
require_once "gar-connect.php";
$klanten = $conn->prepare("
                                SELECT  
                                    klantid,
                                    klantnaam, 
                                    klantadres, 
                                    klantpostcode,
                                     klantplaats 
                                 FROM klant
                                     WHERE klantid = :klantid
                                
                             ");

$klanten->execute(["klantid" => $klantid]);
echo "<table>";
echo "<tr>";
echo "<th>" . "klantid" . "<th>";
echo "<th>" . "klantnaam" . "<th>";
echo "<th>" . "thklantadres" . "<th>";
echo "<th>" . "klantpostcode" . "<th>";
echo "<th>" . "klantplaats" . "<th>";
echo "</tr>";
foreach ($klanten as $klant) {
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "<td>";
    echo "<td>" . $klant["klantnaam"] . "<td>";
    echo "<td>" . $klant["klantadres"] . "<td>";
    echo "<td>" . $klant["klantpostcode"] . "<td>";
    echo "<td>" . $klant["klantplaats"] . "<td>";
    echo "</tr>";
}
echo "</table><br />";

echo "<form action='gar-delete-klant3.php' method='post' id=\"form\">";
// klantid mag niet meer gewijzigd worden
echo "<input type='hidden' name='klantidvak' value=$klantid";
// Waarde 0 doorgeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze klant. <br />";
echo " <input type=\"submit\" value=\"Voltooien\" class=\"formbtn\">";
echo "</form>";
?>
</body>
</html>