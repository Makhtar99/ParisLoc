<?php
session_start();

try {
    $conn = new PDO("mysql:host=localhost;port=8889;dbname=airbnb", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
}

//if (!isset($_SESSION['user'])) {
 //   die("Veuillez vous connecter pour ajouter un logement.");
//}

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

    try {
        $ajoutSql = "INSERT INTO Hébergements (Titre, Image, Description, Commodités, Règles_de_la_maison, Date_depart, Date_arrivée, localisation, capacite, ID_utilisateur)
            VALUES (:titre, :image, :description, :commodites, :reglesMaison, :dateDepart, :dateArrivee, :localisation, :capacite, :utilisateurConnecte)";

        $stmt = $conn->prepare($ajoutSql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':commodites', $commodites);
        $stmt->bindParam(':reglesMaison', $reglesMaison);
        $stmt->bindParam(':dateDepart', $dateDepart);
        $stmt->bindParam(':dateArrivee', $dateArrivee);
        $stmt->bindParam(':localisation', $localisation);
        $stmt->bindParam(':capacite', $capacite);
        $stmt->bindParam(':utilisateurConnecte', $utilisateurConnecte);

        if ($stmt->execute()) {
            echo "Logement ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du logement.";
        }
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout du logement : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unco</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="./css js/newl.css" /> 
</head>
<body>
    <header>
        <div class="wrapper">
            <h1>
                <a href="">
                    <img
                    class="logo"
                    src="/Logo.png"
                    alt="logo">
                </a>
            </h1>

            <div id="mySidenav" class="sidenav">
                <a id="closeBtn" href="#" class="close">×</a>
                <ul class = "profil"> <a href = "#">
                    Mon profil</a>
                </ul>
            </div>

                <a href="#" id="openBtn">
                <span class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                </a>
        </div>
    
    </header>

    <header>
    <div class="wrapper">
        <div class="logo">
            <!-- Logo content here -->
        </div>
        <div class="search_bar">
            <!-- Search bar content here -->
        </div>
    </div>
</header>

<div class="title-container">
    <h1>Ajouter un logement</h1>
</div>


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

    <script>
	    var sidenav = document.getElementById("mySidenav");
		var openBtn = document.getElementById("openBtn");
		var closeBtn = document.getElementById("closeBtn");

		openBtn.onclick = openNav;
		closeBtn.onclick = closeNav;

		/* Set the width of the side navigation to 250px */
		function openNav() {
		  sidenav.classList.add("active");
		}

		/* Set the width of the side navigation to 0 */
		function closeNav() {
		  sidenav.classList.remove("active");
		}
	</script>       
</body>
</html>

<?php
$conn = null;
?>
