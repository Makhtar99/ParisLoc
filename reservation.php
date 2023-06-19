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

    if (!isset($_SESSION['user'])) {
        die("Veuillez vous connecter pour effectuer une réservation ou ajouter un avis.");
    }

    if (isset($_POST['reserver'])) {
        $dateDépart = $_POST['Date_depart'];
        $dateFin = $_POST['Date_arrivée'];
        $nombrePersonnes = $_POST['Nombre_personnes'];
        $utilisateurConnecte = $_SESSION['user'];
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

    if (isset($_POST['commenter'])) {
        $commentaire = $_POST['commentaire'];
        $note = $_POST['note'];
        $logementId = $_GET['id'];
        $utilisateurConnecte = $_SESSION['user']['username'];

        $commentaireSql = "INSERT INTO Commentaires (ID_utilisateur, ID_hébergement, Contenu_commentaire, Note)
            VALUES ('$utilisateurConnecte', '$logementId', '$commentaire', '$note')";

        if ($conn->query($commentaireSql) === TRUE) {
            echo "Commentaire ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du commentaire : " . $conn->error;
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

            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='reserver' value='true'>";
            echo "<label for='Date_depart'>Date d'arrivée :</label>";
            echo "<input type='date' id='Date_depart' name='Date_depart' required><br>";
            echo "<label for='Date_arrivée'>Date de fin :</label>";
            echo "<input type='date' id='Date_arrivée' name='Date_arrivée' required><br>";
            echo "<label for='Nombre_personnes'>Nombre de personnes :</label>";
            echo "<input type='number' id='Nombre_personnes' name='Nombre_personnes' required><br>";
            echo "<button type='submit'>Réserver</button>";
            echo "</form>";

            // Formulaire de commentaire et de note
            echo "<h3>Ajouter un avis :</h3>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='commenter' value='true'>";
            echo "<label for='commentaire'>Commentaire :</label><br>";
            echo "<textarea id='commentaire' name='commentaire' rows='4' cols='50' required></textarea><br>";
            echo "<label for='note'>Note :</label>";
            echo "<select id='note' name='note' required>";
            echo "<option value='1'>1 étoile</option>";
            echo "<option value='2'>2 étoiles</option>";
            echo "<option value='3'>3 étoiles</option>";
            echo "<option value='4'>4 étoiles</option>";
            echo "<option value='5'>5 étoiles</option>";
            echo "</select><br>";
            echo "<button type='submit'>Envoyer</button>";
            echo "</form>";

            // Affichage des commentaires
            $commentairesSql = "SELECT * FROM Commentaires WHERE ID_hébergement = '$logementId'";
            $commentairesResult = $conn->query($commentairesSql);

            if ($commentairesResult->num_rows > 0) {
                echo "<h3>Commentaires :</h3>";
                while ($commentaireRow = $commentairesResult->fetch_assoc()) {
                    echo "<p>Auteur : " . $commentaireRow['ID_utilisateur'] . "</p>";
                    echo "<p>Commentaire : " . $commentaireRow['Contenu_commentaire'] . "</p>";
                    echo "<p>Note : " . $commentaireRow['Note'] . " étoile(s)</p>";
                    echo "<hr>";
                }
            } else {
                echo "<p>Aucun commentaire pour le moment.</p>";
            }
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













