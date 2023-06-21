<?php
session_start(); // Démarre la session pour accéder aux données utilisateur

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: login.php");
    exit();
}

// Récupère l'ID de l'utilisateur connecté
$user_id = $_SESSION['user_id'];

// Vérifie si le formulaire de modification a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les nouvelles informations de l'utilisateur depuis le formulaire
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_name = $_POST['name'];
    $new_familyname = $_POST['familyname'];

    // Effectue les opérations de mise à jour dans la base de données
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Airbnb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Prépare la requête pour mettre à jour les informations de l'utilisateur
    $sql = "UPDATE utilisateurs SET username = '$new_username', email = '$new_email', password = '$new_password', Name = '$new_name', Familyname = '$new_familyname' WHERE id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
        // Les informations ont été mises à jour avec succès
        echo "Les informations ont été mises à jour avec succès.";
    } else {
        // Une erreur s'est produite lors de la mise à jour des informations
        echo "Erreur lors de la mise à jour des informations : " . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier les informations</title>
</head>
<body>
    <h1>Modifier les informations</h1>

    <form method="POST" action="">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>"><br><br>

        <label for="email">Adresse e-mail :</label>
        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password"><br><br>

        <label for="name">Prénom :</label>
        <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"><br><br>

        <label for="familyname">Nom de famille :</label>
        <input type="text" name="familyname" value="<?php echo $_SESSION['familyname']; ?>"><br><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>

