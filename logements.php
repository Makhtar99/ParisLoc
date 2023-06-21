<!DOCTYPE html>
<html>
<head>
    <title>Liste des logements</title>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Airbnb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    $localisation = isset($_POST['localisation']) ? $_POST['localisation'] : "";
    $capacite = isset($_POST['capacite']) ? $_POST['capacite'] : "";
    $dateDebut = isset($_POST['date_debut']) ? $_POST['date_debut'] : "";
    $dateFin = isset($_POST['date_fin']) ? $_POST['date_fin'] : "";

    if (empty($localisation) && empty($capacite) && empty($dateDebut) && empty($dateFin)) {
        $sql = "SELECT * FROM Hébergements LIMIT 7";
    } else {
        $sql = "SELECT * FROM Hébergements WHERE localisation LIKE '%$localisation%' AND capacite >= '$capacite' AND Date_depart >= '$dateDebut' AND Date_arrivée <= '$dateFin'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2><a href='reservation.php?id=" . $row["ID"] . "'>" . $row["Titre"] . "</a></h2>";
            echo "<p>Début : " . $row["Date_depart"] . "</p>";
            echo "<p>Fin : " . $row["Date_arrivée"] . "</p>";
            echo "<p>Arrondissement : " . $row["localisation"] . "</p>";
            echo "<p>Places : " . $row["capacite"] . "</p>";
            echo "</div>";
            echo "<br>";
        }
    } else {
        $approxSql = "SELECT * FROM Hébergements ORDER BY RAND() LIMIT 7";
        $approxResult = $conn->query($approxSql);

        if ($approxResult->num_rows > 0) {
            while ($row = $approxResult->fetch_assoc()) {
                echo "<div>";
                echo "<h2><a href='reservation.php?id=" . $row["ID"] . "'>" . $row["Titre"] . "</a></h2>";
                echo "<p>Début : " . $row["Date_depart"] . "</p>";
                echo "<p>Fin : " . $row["Date_arrivée"] . "</p>";
                echo "<p>Arrondissement : " . $row["localisation"] . "</p>";
                echo "<p>Places : " . $row["capacite"] . "</p>";
                echo "</div>";
                echo "<br>";
            }
        } else {
            echo "Aucun hébergement trouvé dans la base de données.";
        }
    }

    $conn->close();
?>
</body>
</html>
