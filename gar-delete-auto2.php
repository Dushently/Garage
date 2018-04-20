<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dushently Isenia">
    <title>gar-delete-klant2.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage delete auto 2</h1><p>
        op klantid gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderd kunnnen worden
    </p>
</header>
<body>


<?php
//klantgegevens uit her formulier halen ------------------------------------
$autokenteken = $_POST["autokentekenvak"];

// update klantgegevens ---------------------------------------
require_once "gar-connect.php";
$autos = $conn->prepare("
                               SELECT autokenteken,
        automerk,
        autotype,
        autokmstand,
        klantid
FROM    auto
                                  WHERE autokenteken = :autokenteken
                                
                             ");

$autos->execute(["autokenteken" => $autokenteken]);
echo "<table>";
echo "<tr>";
echo "<th>" . "autokenteken" . "<th>";
echo "<th>" . "automerk" . "<th>";
echo "<th>" . "autotype" . "<th>";
echo "<th>" . "autokmstand" . "<th>";
echo "<th>" . "klantid" . "<th>";
echo "</tr>";
foreach ($autos as $auto) {
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"] . "<td>";
    echo "<td>" . $auto["automerk"] . "<td>";
    echo "<td>" . $auto["autotype"] . "<td>";
    echo "<td>" . $auto["autokmstand"] . "<td>";
    echo "<td>" . $auto["klantid"] . "<td>";
    echo "</tr>";
}
echo "</table><br />";

echo "<form action='gar-delete-auto3.php' method='post' id=\"form\">";
// klantid mag niet meer gewijzigd worden
echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
// Waarde 0 doorgeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto. <br />";
echo "    <input type=\"submit\" value=\"Voltooien\" class=\"formbtn\">";
echo "</form>";
?>
</body>
</html>