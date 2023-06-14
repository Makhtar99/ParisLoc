<!DOCTYPE html>
<html>
<head>
    <title>Réservation d'hébergement</title>
</head>
<body>
    <h1>Réservation d'hébergement</h1>

    <form method="POST" action="reservation.php">
        <label for="date_arrivee">Date d'arrivée :</label>
        <input type="date" name="date_arrivee" id="date_arrivee" required><br><br>

        <label for="date_depart">Date de départ :</label>
        <input type="date" name="date_depart" id="date_depart" required><br><br>

        <label for="nombre_personnes">Nombre de personnes :</label>
        <input type="number" name="nombre_personnes" id="nombre_personnes" required><br><br>

        <input type="submit" value="Réserver">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $servername = "localhost:8000"; 
        $username = "root"; 
        $password = "root";
        $dbname = "Airbnb"; 
        $date_arrivee = $_POST["date_arrivee"];
        $date_depart = $_POST["date_depart"];
        $nombre_personnes = $_POST["nombre_personnes"];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }
        $sql = "INSERT INTO Réservations (Date_arrivée, Date_depart, Nombre_personnes)
                VALUES ('$date_arrivee', '$date_depart', '$nombre_personnes')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>La réservation a été ajoutée avec succès.</p>";
        } else {
            echo "<p>Une erreur s'est produite lors de l'ajout de la réservation : " . $conn->error . "</p>";
        }
        $conn->close();
    }
    ?>
</body>
</html>


