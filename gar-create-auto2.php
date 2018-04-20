<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dushently Isenia">
    <title>gar-create-auto2.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage create auto 2</h1>
    <p>Een auto toevoegen aan de tabel
        auto in de database garage.</header>

<body>

</p>
<?php
//autogegevens uit het formulier halen ------------------------------------
$autokenteken    = $_POST["autokentekenvak"];
$automerk    = $_POST["automerkvak"];
$autotype  = $_POST["autotypevak"];
$autokmstand    = $_POST["autokmstandvak"];
$klantid        =    $_POST["klantidvak"];



// autogegevens invoeren in de tabel ---------------------------------------
require_once "gar-connect.php";
$sql = $conn->prepare("
                                insert into auto values
                                (
                                    :autokenteken, :automerk, :autotype, 
                                    :autokmstand, :klantid
                                )
                             ");

$sql->execute([
    "autokenteken"  => $autokenteken,
    "automerk"=> $automerk,
    "autotype"=> $autotype,
    "autokmstand"=> $autokmstand,
    "klantid"=> $klantid
]);

echo "De auto is toegevoegd <br />";
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";
?>
</body>
</html>