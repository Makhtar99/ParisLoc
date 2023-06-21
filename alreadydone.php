<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Airbnb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    session_start();

    if (!isset($_SESSION['user'])) {
        die("Veuillez vous connecter pour afficher vos réservations.");
    }

    $utilisateurConnecte = $_SESSION['user']['id'];

    $reservationsSql = "SELECT * FROM Réservations WHERE ID_utilisateur = '$utilisateurConnecte'";
    $reservationsResult = $conn->query($reservationsSql);

    if ($reservationsResult->num_rows > 0) {
        while ($reservationRow = $reservationsResult->fetch_assoc()) {
            $logementId = $reservationRow['ID_hébergement'];
            $logementSql = "SELECT * FROM Hébergements WHERE ID = '$logementId'";
            $logementResult = $conn->query($logementSql);

            if ($logementResult->num_rows > 0) {
                $logementRow = $logementResult->fetch_assoc();
                ?>
                <?php
            }
        }
    } else {
        echo "<p>Aucune réservation trouvée.</p>";
    }

    $conn->close();
?>
