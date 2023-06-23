<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName = "Airbnb";


try {
    $conn = new PDO("mysql:host=$hostName;dbname=$dbName", $dbUser, $dbPassword,);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
}

?>
