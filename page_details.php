<?php include"header.php"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Page Détails</title>
    <link rel = "stylesheet" href="page_details.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<div class='wrapper'>
    <section class='header'>

        <h2>Nom du logement</h2>
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

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
           Odio morbi quis commodo odio aenean sed adipiscing diam donec. 
           Luctus accumsan tortor posuere ac ut. Dui id ornare arcu odio ut sem nulla pharetra diam. 
           Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. 
           Sed blandit libero volutpat sed cras ornare arcu dui. 
           Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. 
           Sed blandit libero volutpat sed cras ornare arcu dui. 
        </p>

        <div class='details_logement'>
            <ul>
                <li>
                    <h2>Adresse :</h2>
                    <span>Paris, Ile-de-France</span>
                </li>
        
                <li>
                    <h2>Prix :</h2>
                    <span>3000 €</span>
                </li>
                <li>
                    <h2>Places :</h2>
                    <span>3</span>
                </li>
                <li>
                    <h2>Disponibilités</h2>
                    <span>du 25/06 au 30/06</span>
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

<?php include"footer.php"
?>


