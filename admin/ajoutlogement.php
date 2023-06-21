<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un logement</title>
</head>
<body>
    <h1>Ajouter un logement</h1>

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
        die("Veuillez vous connecter pour ajouter un logement.");
    }

    $utilisateurConnecte = $_SESSION['user'];

    if (isset($_POST['ajouter'])) {
        $titre = $_POST['titre'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $commodites = $_POST['commodites'];
        $reglesMaison = $_POST['regles_maison'];
        $dateDepart = $_POST['date_depart'];
        $dateArrivee = $_POST['date_arrivee'];
        $localisation = $_POST['localisation'];
        $capacite = $_POST['capacite'];

        $ajoutSql = "INSERT INTO Hébergements (Titre, Image, Description, Commodités, Règles_de_la_maison, Date_depart, Date_arrivée, localisation, capacite, ID_utilisateur)
            VALUES ('$titre', '$image', '$description', '$commodites', '$reglesMaison', '$dateDepart', '$dateArrivee', '$localisation', '$capacite', '$utilisateurConnecte')";

        if ($conn->query($ajoutSql) === TRUE) {
            echo "Logement ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du logement : " . $conn->error;
        }
    }
    ?>

    <form method="POST" action="">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>

        <label for="image">URL de l'image :</label>
        <input type="text" id="image" name="image" required><br>

        <label for="description">Description :</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

        <label for="commodites">Commodités :</label><br>
        <textarea id="commodites" name="commodites" rows="4" cols="50" required></textarea><br>

        <label for="regles_maison">Règles de la maison :</label><br>
        <textarea id="regles_maison" name="regles_maison" rows="4" cols="50" required></textarea><br>

        <label for="date_depart">Date de départ :</label>
        <input type="date" id="date_depart" name="date_depart" required><br>

        <label for="date_arrivee">Date d'arrivée :</label>
        <input type="date" id="date_arrivee" name="date_arrivee" required><br>

        <label for="localisation">Arrondissement :</label>
        <input type="text" id="localisation" name="localisation" required><br>

        <label for="capacite">Capacité :</label>
        <input type="number" id="capacite" name="capacite" required><br>

        <button type="submit" name="ajouter">Ajouter le logement</button>
    </form>

    <?php
    $conn->close();
    ?>
</body>
</html>
