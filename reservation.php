<!DOCTYPE html>
<html>
<head>
    <title>Réservation de logement</title>
</head>
<body>
    <h1>Réservation de logement</h1>
    
    <form method="POST" action="reservation.php">
        <label for="Date_depart">Date d'arrivée :</label>
        <input type="date" id="Date_depart" name="Date_depart" required><br>
        
        <label for="Date_arrivée">Date de fin :</label>
        <input type="date" id="Date_arrivée" name="Date_arrivée" required><br>
        
        
        <label for="Nombre_personnes">Nombre de personnes :</label>
        <input type="number" id="Nombre_personnes" name="Nombre_personnes" required><br>
        
        <input type="submit" value="Réserver">
    </form>

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Airbnb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Vérifier si l'utilisateur est connecté
session_start();

if (!isset($_SESSION['user'])) {
    die("Veuillez vous connecter pour effectuer une réservation.");
}

// Traitement du formulaire de réservation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $dateDépart = $_POST['Date_depart'];
    $dateFin = $_POST['Date_arrivée'];
    $nombrePersonnes = $_POST['Nombre_personnes'];
    $utilisateurConnecte = $_SESSION['user'];

    // Insérer la réservation dans la base de données
    $sql = "INSERT INTO Réservations ( Date_depart, Date_arrivée, Nombre_personnes)
            VALUES ( '$dateDépart', '$dateFin', '$nombrePersonnes')";
            if ($conn->query($sql) === TRUE) {
                echo "Réservation effectuée avec succès.";
            } else {
                echo "Erreur lors de la réservation : " . $conn->error;
            }
            
}


$conn->close();
?>


</body>
</html>


