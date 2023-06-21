<?php include "components/header.php"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Page Détails</title>
    <link rel = "stylesheet" href="css js/detail.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<div class='wrapper'>
    <section class='header'>

        <h2><?php echo $row["Titre"]; ?></h2>
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

        <p><?php echo $row["Description"]; ?> </p>

        <div class='details_logement'>
            <ul>
                <li>
                    <h2>Arrondissement :</h2>
                    <span><?php echo $row["localisation"]; ?></span>
                </li>
        
                <li>
                    <h2>Prix :</h2>
                    <span><?php echo $row["Commodités"]; ?></span>
                </li>
                <li>
                    <h2>Places :</h2>
                    <span><?php echo $row["capacite"]; ?></span>
                </li>
                <li>
                    <h2>Disponibilités</h2>
                    <span>du <?php echo $row["Date_depart"]; ?> au <?php echo $row["Date_arrivée"]; ?> </span>
                </li>
            </ul>

            <a href="#" class='reservation'><span>Réserver</span></a>
        </div>
    </section>

    <section class='avis'>

        <h2 class='title'>Avis</h2>

            <article class='commentaire is-posted'>

                <div>
                    <img class='img_avis' src="img/user_circle.svg" alt="">
                </div>
                <div class='comment'>
                    <h2>Pseudo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>

            </article>
 
            <article class='commentaire is-posted'>

                <div>
                    <img class='img_avis' src="img/user_circle.svg" alt="">
                </div>
                <div class='comment'>
                    <h2>Pseudo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>

            </article>

            <article class='commentaire is-posted'>

                <div>
                    <img class='img_avis' src="img/user_circle.svg" alt="">
                </div>
                <div class='comment'>
                    <h2>Pseudo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>

            </article>  
            
            <form class='comment_avis'>

                    <input class='input_avis' type="text" placeholder='écrire un message...'/>

                    <button type='button' class='button'>

                        <img src="img/arrow-small-black.svg" alt="">

                    </button>
            </form>
    
    </section>


</div>

<?php include "components/footer.php" ?>

