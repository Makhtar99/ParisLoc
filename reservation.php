<!DOCTYPE html>
<html>
<head>
    <title>Détails et réservation du logement</title>
</head>
<body>
    <h1>Détails et réservation du logement</h1>

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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_SESSION['user'])) {
            die("Veuillez vous connecter pour effectuer une réservation.");
        }

        $dateDépart = $_POST['Date_depart'];
        $dateFin = $_POST['Date_arrivée'];
        $nombrePersonnes = $_POST['Nombre_personnes'];
        $utilisateurConnecte = $_SESSION['user']['id'];
        $logementId = $_GET['id'];

        // Vérification des disponibilités
        $dispoSql = "SELECT * FROM Hébergements WHERE ID = '$logementId' AND Date_depart <= '$dateDépart' AND Date_arrivée >= '$dateFin'";
        $dispoResult = $conn->query($dispoSql);

        if ($dispoResult->num_rows > 0) {
            $sql = "INSERT INTO Réservations (ID_utilisateur, Date_depart, Date_arrivée, Nombre_personnes, ID_hébergement)
                VALUES ('$utilisateurConnecte', '$dateDépart', '$dateFin', '$nombrePersonnes', '$logementId')";

            if ($conn->query($sql) === TRUE) {
                echo "Réservation effectuée avec succès.";
            } else {
                echo "Erreur lors de la réservation : " . $conn->error;
            }
        } else {
            echo "Le logement n'est pas disponible aux dates sélectionnées.";
        }
    }

    if (isset($_GET['id'])) {
        $logementId = $_GET['id'];

        $sql = "SELECT * FROM Hébergements WHERE ID = '$logementId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h2>Nom : " . $row["Titre"] . "</h2>";
            echo "<img src='" . $row["Image"] . "' alt='Image du logement'><br>";  
            echo "<p>Description : " . $row["Description"] . "</p>";
            echo "<p>Commodités : " . $row["Commodités"] . "</p>";
            echo "<p>Règles de la maison : " . $row["Règles_de_la_maison"] . "</p>";
            echo "<p>Début : " . $row["Date_depart"] . "</p>";
            echo "<p>Fin : " . $row["Date_arrivée"] . "</p>";
            echo "<p>Arrondissement : " . $row["localisation"] . "</p>";
            echo "<p>Places : " . $row["capacite"] . "</p>";

            echo "<form method='POST' action='?id=" . $row["ID"] . "'>";
            echo "<label for='Date_depart'>Date d'arrivée :</label>";
            echo "<input type='date' id='Date_depart' name='Date_depart' required><br>";
            echo "<label for='Date_arrivée'>Date de fin :</label>";
            echo "<input type='date' id='Date_arrivée' name='Date_arrivée' required><br>";
            echo "<label for='Nombre_personnes'>Nombre de personnes :</label>";
            echo "<input type='number' id='Nombre_personnes' name='Nombre_personnes' required><br>";
            echo "<input type='submit' value='Réserver'>";
            echo "</form>";
        } else {
            echo "Logement introuvable.";
        }
    } else {
        echo "Aucun logement sélectionné.";
    }

    $conn->close();
    ?>
</body>
</html>







