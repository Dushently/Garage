<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author"
          content="Dushently Isenia">
    <title>gar-update-auto2.php</title>
    <link rel="stylesheet" href="menu.css" type="text/css">

</head>
<header><h1 class="h1menu">garage update auto2</h1>
    <p>Op klantid gegevens zoeken uit de tabel auto van de database garage</p></header>
<body>


<?php
//klantid uit het formulier halen-------------------------======-------
$autokenteken = $_POST["autokentekenvak"];

//klantgegevens uit de tabel halen-------------------------======-------
require_once "gar-connect.php";


$autos = $conn->prepare(" SELECT autokenteken,
        automerk,
        autotype,
        autokmstand,
        klantid
FROM    auto
                                  WHERE autokenteken = :autokenteken
    ");
$autos->execute(["autokenteken" => $autokenteken]);
//klantgegevens in een nieuw formulier laten zien -------------------------======-------
echo "<form action='gar-update-auto3.php' method='post' id=\"form\">";
foreach ($autos as $auto) {

    echo "autokenteken: <input type='text' ";
    echo "name ='autokentekenvak'";
    echo "value = '" . $auto["autokenteken"] . "'";
    echo "'> <br/> ";

    echo "automerk: <input type='text' ";
    echo "name ='automerkvak'";
    echo "value = '" . $auto["automerk"] . "'";
    echo "'> <br/> ";

    echo "autotype: <input type='text' ";
    echo "name ='autotypevak'";
    echo "value = '" . $auto["autotype"] . "'";
    echo "'> <br/> ";

    echo "autokmstand: <input type='text' ";
    echo "name ='autokmstandvak'";
    echo "value = '" . $auto["autokmstand"] . "'";
    echo "'> <br/> ";

    echo "klantid:" . $auto["klantid"];
    echo "<input type='hidden' name='klantidvak' ";
    echo "value='" . $auto["klantid"] . "'> <br/> ";

}
echo "    <input type=\"submit\" value=\"Voltooien\" class=\"formbtn\">
";
echo "</form>";

// er moet eigenlijk nog gecontroleeerd worden op een bestaaand klantid


?>
</body>
</html>