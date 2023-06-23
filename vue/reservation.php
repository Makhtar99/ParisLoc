<!DOCTYPE html>
<html>
<head>
    <title>Détails du logement</title>
</head>
<body>
    <?php if (isset($logementMessage)) : ?>
        <p><?php echo $logementMessage; ?></p>
    <?php else : ?>
        <div class='wrapper'>
    <section class='header'>

        <h2><?php echo $logementTitle; ?></h2>
        <a href="#"><span>Contacter l'hôte</span></a>

    </section>

    <section class='img'>

        <img class='big_img' src="https://www.architecte-maisons.fr/wp-content/uploads/2019/02/agencement-pieces.jpg" alt="">

        <div class='side_img'>

        <img class='small_img' src="https://www.architecte-maisons.fr/wp-content/uploads/2019/02/agencement-pieces.jpg" alt="">
        <img class='small_img' src="https://www.architecte-maisons.fr/wp-content/uploads/2019/02/agencement-pieces.jpg" alt="">

        </div>

    </section>

    <section class='middle_content'>

        <p><?php echo $logementDescription; ?></p>

        <div class='details_logement'>
            <ul>
                <li>
                    <h2>Arrondissement :</h2>
                    <span><?php echo $logementLocalisation; ?></span>
                </li>
        
                <li>
                    <h2>Prix :</h2>
                    <span><?php echo $logementCommodites; ?></span>
                </li>
                <li>
                    <h2>Places :</h2>
                    <span><?php echo $logementCapacite; ?></span>
                </li>
                <li>
                    <h2>Disponibilités</h2>
                    <span>du <?php echo $logementDateDepart; ?> au <?php echo $logementDateArrivee; ?></span>
                </li>
            </ul>

            <a href="#" class='reservation'><span>Réserver</span></a>
        </div>
    </section>


</div>

        <?php if (isset($logementReservationMessage)) : ?>
            <p><?php echo $logementReservationMessage; ?></p>
        <?php elseif (isset($logementReservationForm)) : ?>
            <form method="POST" action="">
                <input type="hidden" name="reserver" value="true">
                <label for="Date_depart">Date d'arrivée :</label>
                <input type="date" id="Date_depart" name="Date_depart" required><br>
                <label for="Date_arrivée">Date de fin :</label>
                <input type="date" id="Date_arrivée" name="Date_arrivée" required><br>
                <label for="Nombre_personnes">Nombre de personnes :</label>
                <input type="number" id="Nombre_personnes" name="Nombre_personnes" required><br>
                <button type="submit">Réserver</button>
            </form>
        <?php endif; ?>

        <h3>Ajouter un avis :</h3>
        <?php if (isset($commentaireMessage)) : ?>
            <p><?php echo $commentaireMessage; ?></p>
        <?php else : ?>
            <h2 class='title'>Avis</h2>
            <form class='comment_avis' method="POST" action="">
                <input class='input_avis' type="hidden" name="commenter" value="true">
                <label for="commentaire">Commentaire :</label><br>
                <textarea id="commentaire" name="commentaire" rows="4" cols="50" required></textarea><br>
                <label for="note">Note :</label>
                <select id="note" name="note" required>
                    <option value="1">1 étoile</option>
                    <option value="2">2 étoiles</option>
                    <option value="3">3 étoiles</option>
                    <option value="4">4 étoiles</option>
                    <option value="5">5 étoiles</option>
                </select><br>
                <button class='button' type="submit">Envoyer</button>
            </form>
        <?php endif; ?>

        <?php if (isset($logementCommentairesMessage)) : ?>
            <p><?php echo $logementCommentairesMessage; ?></p>
        <?php else : ?>
            <h3>Commentaires :</h3>
            <?php while ($commentaireRow = $logementCommentaires->fetch_assoc()) : ?>
                
            <section class='avis'>

            <article class='commentaire is-posted'>

                <div>
                    <img class='img_avis' src="img/user_circle.svg" alt="">
                </div>
                <div class='comment'>
                    <h2><?php echo $commentaireRow['username']; ?></h2>
                    <p><?php echo $commentaireRow['Contenu_commentaire']; ?></p>
                    <p> <?php echo $commentaireRow['Note']; ?></p>
                </div>

            </article>
    
    </section>
            <?php endwhile; ?>
        <?php endif; ?>

    <?php endif; ?>
</body>
</html>
