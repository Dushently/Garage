<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dushently Isenia">
    <title>gar-delete-klant3.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage delete auto 3</h1><p>
        op klantid gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderd kunnnen worden
    </p>
</header>

<body>

<?php
//klantgegevens uit her formulier halen ------------------------------------
$autokenteken= $_POST["autokentekenvak"];
$verwijderen= $_POST["verwijdervak"];

//klantgegevns verwijderen
if ($verwijderen)
{
    require_once "gar-connect.php";
    $sql = $conn->prepare("DELETE  FROM auto WHERE autokenteken = :autokenteken");

    $sql->execute(["autokenteken" =>$autokenteken]);
    echo "De gegevens zijn verwijderd. <br />";
}
else
    {
        echo "De gegevens zijn niet verwijderd. <br />";

}
echo "<a href='gar-menu.php' id='terug'> terug naar het menu </a>";

?>
</body>
</html>
