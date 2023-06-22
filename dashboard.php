<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit;
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Airbnb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupération de tous les utilisateurs
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Nom d'utilisateur : " . $row["username"] . "<br>";
        echo "Nom : " . $row["name"] . "<br>";
        echo "Nom de famille : " . $row["familyname"] . "<br>";
        echo "Email : " . $row["email"] . "<br>";

        // Récupération des réservations de l'utilisateur
        $userId = $row["id"];
        $reservationSql = "SELECT * FROM reservations WHERE user_id = $userId";
        $reservationResult = $conn->query($reservationSql);

        if ($reservationResult->num_rows > 0) {
            echo "Réservations : <br>";

            while ($reservationRow = $reservationResult->fetch_assoc()) {
                echo "ID de réservation : " . $reservationRow["id"] . "<br>";
                echo "Date de début : " . $reservationRow["date_debut"] . "<br>";
                echo "Date de fin : " . $reservationRow["date_fin"] . "<br>";
                // ... (Affichez les autres informations de la réservation)
                echo "<br>";
            }
        } else {
            echo "Aucune réservation pour cet utilisateur.<br>";
        }

        echo "<br>";
    }
} else {
    echo "Aucun utilisateur trouvé dans la base de données.";
}

$conn->close();
?>
