<?php include "components/header.php"
?>

<!DOCTYPE html>
<html>
<head>
    <title>Détails et réservation du logement</title>
    <link rel = "stylesheet" href="css js/detail.css">
    <link rel = "stylesheet" href="css js/style.css">
</head>
<body>
    <div class='wrapper'>
        <h1>Détails et réservation du logement</h1>

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
            die("Veuillez vous connecter pour effectuer une réservation ou ajouter un avis.");
        }

        if (isset($_POST['reserver'])) {
            $dateDépart = $_POST['Date_depart'];
            $dateFin = $_POST['Date_arrivée'];
            $nombrePersonnes = $_POST['Nombre_personnes'];
            $utilisateurConnecte = $_SESSION['user']['id'];
            $logementId = $_GET['id'];

            // Vérification des disponibilités
            $dispoSql = "SELECT * FROM Hébergements WHERE ID = '$logementId' AND Date_depart <= '$dateDépart' AND Date_arrivée >= '$dateFin'";
            $dispoResult = $conn->query($dispoSql);

            if ($dispoResult->num_rows > 0) {
                $sql = "INSERT INTO Réservations (ID_utilisateur, Date_depart, Date_arrivée, Nombre_personnes, ID_hébergement)
                    VALUES ('$utilisateurConnecte', '$dateDépart', '$dateFin', '$nombrePersonnes', '$logementId')";

                if ($conn->query($sql) === TRUE) {
                    ?>
                    <p>Réservation effectuée avec succès.</p>
                    <?php
                } else {
                    ?>
                    <p>Erreur lors de la réservation : <?php echo $conn->error; ?></p>
                    <?php
                }
            } else {
                ?>
                <p>Le logement n'est pas disponible aux dates sélectionnées.</p>
                <?php
            }
        }

        if (isset($_POST['commenter'])) {
            $commentaire = $_POST['commentaire'];
            $note = $_POST['note'];
            $logementId = $_GET['id'];
            $utilisateurConnecte = $_SESSION['user']['id'];

            // Vérification de la réservation
            $reservationSql = "SELECT * FROM Réservations WHERE ID_utilisateur = '$utilisateurConnecte' AND ID_hébergement = '$logementId'";
            $reservationResult = $conn->query($reservationSql);

            if ($reservationResult->num_rows > 0) {
                $commentaireSql = "INSERT INTO Commentaires (ID_utilisateur, ID_hébergement, Contenu_commentaire, Note)
                    VALUES ('$utilisateurConnecte', '$logementId', '$commentaire', '$note')";

                if ($conn->query($commentaireSql) === TRUE) {
                    ?>
                    <p>Commentaire ajouté avec succès.</p>
                    <?php
                } else {
                    ?>
                    <p>Erreur lors de l'ajout du commentaire : <?php echo $conn->error; ?></p>
                    <?php
                }
            } else {
                ?>
                <p>Vous devez d'abord réserver ce logement pour laisser un commentaire.</p>
                <?php
            }
        }

        if (isset($_GET['id'])) {
            $logementId = $_GET['id'];

            $sql = "SELECT * FROM Hébergements WHERE ID = '$logementId'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>

        <section class='header'>

            <h2><?php echo $row["Titre"]; ?></h2>
            <a href="#"><span>Contacter l'hôte</span></a>

        </section>

        <section class='img'>

            <img class='big_img' src='./assets/<?php echo $row["image1"]; ?>' alt="">

            <div class='side_img'>

            <img class='small_img' src='./assets/<?php echo $row["image2"]; ?>' alt="">
            <img class='small_img' src='./assets/<?php echo $row["image3"]; ?>'>


        </section>

    <section class='middle_content'>
        <div>
            <p><?php echo $row["Description"]; ?> </p>
    
            <div class='details_logement'>
                
                        <h2>Arrondissement :</h2>
                        <span><?php echo $row["localisation"]; ?></span>
        
                        <h2>Prix :</h2>
                        <span><?php echo $row["prix"]; ?>€</span>
                
                        <h2>Places :</h2>
                        <span><?php echo $row["capacite"]; ?></span>
                    
                        <h2>Disponibilités :</h2>
                        <span>du <?php echo $row["Date_depart"]; ?> au <?php echo $row["Date_arrivée"]; ?> </span>

            </div>
        </div>    
   
            <?php

                // Vérification de la réservation
                $reservationSql = "SELECT * FROM Réservations WHERE ID_hébergement = '$logementId'";
                $reservationResult = $conn->query($reservationSql);

            if ($reservationResult->num_rows > 0) {
                ?>
                <p>Logement déjà réservé.</p>
                <?php
            } else {
                ?>
                <form method="POST" action="reservationsdone.php">
                    <div class="reservation">
                        <ul>
                            <input type="hidden" name="reserver" value="true">
                            <li>
                                <label for="Date_depart">Date d'arrivée :</label>
                                <input type="date" id="Date_depart" name="Date_depart" required>
                            </li>
                            <li>
                                <label for="Date_arrivée">Date de fin :</label>
                                <input type="date" id="Date_arrivée" name="Date_arrivée" required>                  
                            </li>
                            <li>
                                <label for="Nombre_personnes">Nombre de personnes :</label>
                                <input type="number" id="Nombre_personnes" name="Nombre_personnes" required>
                            </li>
                        </ul>
                        <button class='btn_reservation' type="submit">Réserver</button>
                    </div>
                </form>

    </section>
                
                <?php if (isset($_POST['supprimer'])) {
                $logementId = $_GET['id'];

                    $suppressionSql = "DELETE FROM Hébergements WHERE ID = '$logementId'";
                    if ($conn->query($suppressionSql) === TRUE) {
                        // Afficher un message de confirmation
                        echo "Le logement a été supprimé avec succès.";
                    } else {
                        echo "Erreur lors de la suppression du logement : " . $conn->error;
                    }
                }
                ?>

                <?php if ($_SESSION['user']['role'] === 'Admin'): ?>
                    <form method="POST" action="">
                        <input type="hidden" name="supprimer" value="true">
                        <button type="submit">Supprimer</button>
                    </form>
                <?php endif; ?>

                    <?php
                }

            // Formulaire de commentaire et de note
            ?>
            <div class='avis'>
                <h2>Ajouter un avis</h2>
                <form method="POST" action="">

                    <input type="hidden" name="commenter" value="true">
                    <div class='commentaire'>
                        <label for="commentaire">Commentaire :</label><br>
                        <textarea id="commentaire" name="commentaire" rows="4" cols="50" required></textarea><br>
                    </div>

                    <div class='note'>
                        <label for="note">Note :</label>
                        <select id="note" name="note" required>
                            <option value="1">1 étoile</option>
                            <option value="2">2 étoiles</option>
                            <option value="3">3 étoiles</option>
                            <option value="4">4 étoiles</option>
                            <option value="5">5 étoiles</option>
                        </select>
                    </div>

                    <button class='button' type="submit">Envoyer</button>
                    <img src="img/arrow-small-black.svg" alt="">

                </form>
            </div>
            <?php

                // Affichage des commentaires
                $commentairesSql = "SELECT c.Contenu_commentaire, c.Note, u.username FROM Commentaires c INNER JOIN users u ON c.ID_utilisateur = u.id WHERE c.ID_hébergement = '$logementId'";
                $commentairesResult = $conn->query($commentairesSql);

                if ($commentairesResult->num_rows > 0) {
                    ?>
                    <h3>Commentaires :</h3>
                    <?php
                    while ($commentaireRow = $commentairesResult->fetch_assoc()) {
                        ?>
                        <section class='avis'>
                        <article class='commentaire is-posted'>

                    <div>
                        <img class='img_avis' src="img/user_circle.svg" alt="">
                    </div>
                    <div class='comment'>
                        <h2><?php echo $commentaireRow['username']; ?></h2>
                        <p><?php echo $commentaireRow['Contenu_commentaire']; ?></p>
                        <p>Note : <?php echo $commentaireRow['Note']; ?></p>
                        <?php if ($_SESSION['user']['role'] === 'Modo'): ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="supprimer_commentaire" value="<?php echo $commentaireRow['ID']; ?>">
                                            <button type="submit">Supprimer</button>
                                        </form>
                         <?php endif; ?>
                    </div>

                </article> 
                    </section>
                        <?php
                    }
                } else {
                    ?>
                    <p>Aucun commentaire pour le moment.</p>
                    <?php
                }
            } else {
                echo "Logement introuvable.";
            }
        }
        if (isset($_POST['supprimer_commentaire'])) {
            $commentaireId = $_POST['supprimer_commentaire'];

            $suppressionCommentaireSql = "DELETE FROM Commentaires WHERE ID = '$commentaireId'";
            if ($conn->query($suppressionCommentaireSql) === TRUE) {
                // Afficher un message de confirmation
                echo "Le commentaire a été supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression du commentaire : " . $conn->error;
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

<?php include 'components/footer.php'
?>
















