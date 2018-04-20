<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dushently Isenia">
    <title>gar-update-klant3.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage update klant 3</h1>
    <p>klant gegevens wijzigen in de tabel klant van de database garage</p>
</header>
<body>

<?php
$autokenteken    = $_POST["autokentekenvak"];
$automerk    = $_POST["automerkvak"];
$autotype  = $_POST["autotypevak"];
$autokmstand    = $_POST["autokmstandvak"];
$klantid        =    $_POST["klantidvak"];



// update klantgegevens ---------------------------------------
require_once "gar-connect.php";
$sql = $conn->prepare("
                                UPDATE auto SET
                                
                                    autokenteken = :autokenteken, 
                                    automerk = :automerk, 
                                    autotype = :autotype,
                                     autokmstand  = :autokmstand
                                     WHERE autokenteken = :autokenteken
                                
                             ");

$sql->execute([
    "autokenteken"  => $autokenteken,
    "automerk"=> $automerk,
    "autotype"=> $autotype,
    "autokmstand"=> $autokmstand,
    "klantid"=> $klantid
]);

echo "De klant is gewijzigd <br />";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";
?>
</body>
</html>