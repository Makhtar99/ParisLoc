<?php include "components/header.php"
?>


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
        $sql = "SELECT * FROM Hébergements LIMIT 15";
    } else {
        $sql = "SELECT * FROM Hébergements WHERE localisation LIKE '%$localisation%' AND capacite >= '$capacite' AND Date_depart >= '$dateDebut' AND Date_arrivée <= '$dateFin'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class='wrapper'>
                <section class='list_img'>
                    <ul>
                        <li>
                            <a href='reservation.php?id=<?php echo $row["ID"]; ?>'>
                                
                                <img class='img_logement' src='./assets/<?php echo $row["image1"]; ?>' alt="image logement">
                                <h2><?php echo $row["Titre"]; ?></h2>
                            </a>
                        </li>
                    </ul>
                    <div class='details_list'>
                        <p><span>Début :</span><?php echo $row["Date_depart"]; ?></p>
                        <p><span>Fin : </span><?php echo $row["Date_arrivée"]; ?></p>
                        <p><span>Arrondissement : </span><?php echo $row["localisation"]; ?></p>
                        <p><span>Places : </span><?php echo $row["capacite"]; ?></p>
                    </div>
                </section>
            </div>
            <?php
        }
    } else {
        $approxSql = "SELECT * FROM Hébergements ORDER BY RAND() LIMIT 7";
        $approxResult = $conn->query($approxSql);

        if ($approxResult->num_rows > 0) {
            while ($row = $approxResult->fetch_assoc()) {
                ?>
                <div class='wrapper'>
                    <section class='list_img'>
                        <ul>
                            <li>
                                <a href='reservation.php?id=<?php echo $row["ID"]; ?>'></a>

                               
                                <img src='https://images.pexels.com/photos/6292341/pexels-photo-6292341.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'><br>
                                <h2><?php echo $row["Titre"]; ?></h2>
                                <p><span>Début :</span><?php echo $row["Date_depart"]; ?></p>
                                <p><span>Fin : </span><?php echo $row["Date_arrivée"]; ?></p>
                                <p><span>Arrondissement : </span><?php echo $row["localisation"]; ?></p>
                                <p><span>Places : </span><?php echo $row["capacite"]; ?></p>
                            </li>
                            
                        </ul>
                    </section>
                </div>
                <br>
                <?php
            }
        } else {
            echo "Aucun hébergement trouvé dans la base de données.";
        }
    }

    $conn->close();
?>
</body>
<link rel = "stylesheet" href ="css js/style.css">
</html>

<?php include 'components/footer.php'
?>