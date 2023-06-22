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

    $utilisateurConnecte = $_SESSION['user']['id'];

    if (isset($_POST['ajouter'])) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $reglesMaison = $_POST['regles_maison'];
        $dateDepart = $_POST['date_depart'];
        $dateArrivee = $_POST['date_arrivee'];
        $localisation = $_POST['localisation'];
        $capacite = $_POST['capacite'];
        $first_pic = $_FILES["first_picture"]["name"];
        $second_pic = $_FILES["second_picture"]["name"];
        $third_pic = $_FILES["third_picture"]["name"];


        move_uploaded_file($_FILES["first_picture"]["tmp_name"], "../assets" . $first_pic);
        move_uploaded_file($_FILES["second_picture"]["tmp_name"], "../assets" . $second_pic);
        move_uploaded_file($_FILES["third_picture"]["tmp_name"], "../assets" . $third_pic);
       

        $ajoutSql = "INSERT INTO Hébergements (Titre, Description, prix, Règles_de_la_maison, Date_depart, Date_arrivée, localisation, capacite, image3, image2, image1)
            VALUES ('$titre', '$description', '$prix', '$reglesMaison', '$dateDepart', '$dateArrivee', '$localisation', '$capacite','$third_pic', '$second_pic', '$first_pic')";

        if ($conn->query($ajoutSql) === TRUE) {
            echo "Logement ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du logement : " . $conn->error;
        }
    }
    ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>
        <label for="description">Description :</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

        <label for="commodites">prix :</label><br>
        <textarea id="commodites" name="prix" rows="4" cols="50" required></textarea><br>

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
        <label for="Photo du logement1">Photo du logement 1 (Cette image sera l'image dans l'annonce dans la page d'acceuille)</label>
            <input type="file" name="third_picture" required>
            <label for="Photo du logement2">Photo du logement 2</label>
            <input type="file" name="second_picture" required>
            <label for="Photo du logement3">Photo du logement 3</label>
            <input type="file" name="first_picture" required>
        
        

        <button type="submit" name="ajouter">Ajouter le logement</button>

   

        <button type="submit" name="ajouter">Ajouter le logement</button>
    </form>

    <?php
    $conn->close();
    ?>
</body>
</html>
