<?php
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "Airbnb"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$sql = "SELECT * FROM Hébergements";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>ID : " . $row["Titre"] . "</h2>";
        echo "<p>Nom : " . $row["Description"] . "</p>";
        echo "<p>Type : " . $row["Commodités"] . "</p>";
        echo "<p>Adresse : " . $row["localisation"] . "</p>";
        echo "</div>";
        echo "<br>";
    }
} else {
    echo "Aucun hébergement trouvé dans la base de données.";
}

$conn->close();
?>
