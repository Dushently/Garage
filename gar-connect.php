<?php
// gar-connect.php
// maakt een connectie met de database 'garage'
// Dushently Isenia


$servername = "localhost";
$dbname = "garage";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname",
        $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connectie gelukt <br/>;

} catch (PDOException $e) {
    echo "Connectie mislukt:" . $e->getMessage();
}

?>