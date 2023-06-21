<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> UNCO  </title>
    <link rel = "stylesheet" href="css js/style_page_acceuil_1.CSS">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>
<body> 
    
<section class="fond"> 
    <header>
        <btn class="titre">UNCO</btn>
        <btn class="profile">Account</btn>
    </header>

    <form method="POST" action="logements.php">
        <ul class="searchbar">
            <label class="localisation" for="Localisation">Arrondissement</label>
            <input class="input1" type="texte" id="Nombre_personnes" name="Nombre_personnes" value="<?php echo isset($_POST['localisation']) ? $_POST['localisation'] : ''; ?>" required><br>

            <label class="dispo_A" for="Date_arrivée">Arrivé</label>
            <input class="input2" type="date" id="Date_arrivée" name="Date_arrivée" value="<?php echo isset($_POST['date_fin']) ? $_POST['date_fin'] : ''; ?>" required><br>

            <label class="dispo_D" for="Date_depart">Départ</label>
            <input class="input3" type="date" id="Date_depart" name="Date_depart" value="<?php echo isset($_POST['date_debut']) ? $_POST['date_debut'] : ''; ?>" required><br>

            <label class="places" for="Places">Places</label>
            <input class="input4" type="number" id="Nombre_personnes" name="Nombre_personnes" value="<?php echo isset($_POST['capacite']) ? $_POST['capacite'] : ''; ?>" required><br>

            <input class="input5" type="submit" value="recherche">
        </ul>
    </form>
</section>

<script>
    const bodyElement = document.body;
    const images = [
        "assets/image1.jpg",
        "assets/image2.jpg",
        "assets/image3.jpg",
        "assets/image4.jpg",
        "assets/image5.jpg",
        "assets/image6.jpg",
        "assets/image7.jpg"
    ];

    let currentIndex = 0;

    function changeBackgroundImage() {
        bodyElement.style.backgroundImage = `url('${images[currentIndex]}')`;
        bodyElement.style.backgroundSize = "cover";
        bodyElement.style.backgroundPosition = "center";
        currentIndex = (currentIndex + 1) % images.length;
    }

    function preloadImages() {
        for (let i = 0; i < images.length; i++) {
            const img = new Image();
            img.src = images[i];
        }
    }

    preloadImages();
    changeBackgroundImage();
    setInterval(changeBackgroundImage, 5000);
</script>



</body>

</html>