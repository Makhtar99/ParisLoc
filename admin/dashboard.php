<!DOCTYPE html>
<html>
<head>
    <title>Liste des réservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 5px;
        }

        .reservation {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .reservation a {
            text-decoration: none;
            color: #333;
        }

        .reservation p {
            margin: 5px 0;
        }

        .no-reservation {
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Airbnb";

$conn = new mysqli($servername, $username, $password, $dbname);

// récupérer les réservations avec les noms d'utilisateur, les titres des logements et les informations utilisateur
$reservationSql = "SELECT Réservations.*, USERS.username, USERS.Name, USERS.Familyname, USERS.email, Hébergements.titre 
                  FROM Réservations 
                  INNER JOIN USERS ON Réservations.ID_utilisateur = USERS.ID
                  INNER JOIN Hébergements ON Réservations.ID_hébergement = Hébergements.ID";
$reservationResult = $conn->query($reservationSql);

if ($reservationResult->num_rows > 0) {
    while ($row = $reservationResult->fetch_assoc()) {
        ?>
        <div class="reservation">
            <h2><a href='reservation.php?id=<?php echo $row["ID"]; ?>'><?php echo $row["titre"]; ?></a></h2>
            <p><strong>Début:</strong> <?php echo $row["Date_depart"]; ?></p>
            <p><strong>Fin:</strong> <?php echo $row["Date_arrivée"]; ?></p>
            <p><strong>Nombre de personnes:</strong> <?php echo $row["Nombre_personnes"]; ?></p>
            <p><strong>Nom de l'utilisateur:</strong> <?php echo $row["username"]; ?></p>
            <p><strong>Nom:</strong> <?php echo $row["Name"]; ?></p>
            <p><strong>Nom de famille:</strong> <?php echo $row["Familyname"]; ?></p>
            <p><strong>Email:</strong> <?php echo $row["email"]; ?></p>
        </div>
        <?php
    }
} else {
    echo "<p class='no-reservation'>Aucune réservation trouvée dans la base de données.</p>";
}

$conn->close();
?>
</body>
</html>

