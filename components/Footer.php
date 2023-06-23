    
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <footer>
            <div class="footer_blocks">
                <div class="blocks first">
                        <h1>À propos de UNCO</h1>
                        <p>Fort d’une experience de plus de 50 ans, soutenue par une équipe de 8 conseillers passionnés par Paris, son architecture, ses quartiers, 
                        Unco vous accompage dans votre recherche de biens immobiliers.</p>
                        <br>
                        <p>Un objectif comun : Vous faire passer un excellent séjour.</p>
                        <div class="img">
                            <img style="width: 70px;" src="../IMG/brontis_2.png">
                            <img style="width: 100px;" src="../IMG/hetic_logo.jpg">
                            <img style="width: 100px;" src="../IMG/ville_de_paris.jpg">
                        </div>
                </div>

                <div class="blocks second">
                    <h1>Navigation</h1>
                    <ul>
                        <li><a href="../welcome.php">Accueil</a></li>
                        <li><a href="../account.php">Mon profil</a></li>
                        <li><a href="#">Nous contacter</a></li>
                    </ul>
                </div>
                    
                <div class="blocks third">
                        <h1>Nous rejoindre</h1>
                        <p>Venez nous rencontrer ! 
                        Nous recherchons en permanance des chasseurs immobiliers résidentiel. </p>
                        <br>
                        <p>Contactez nous sur rh@unco.fr pour en savoir plus. </p>
                </div>
            </div>
        </footer>
        
    </body>
</html>

<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

footer{
    background: #222221;
}

.footer_blocks {
    display: flex;
    justify-content: space-between;
    width: 100%
}
.first{
    width:27% ;
    margin-left: 30px;
}
.second{
    width: 17%;
}
.third{
    width: 25%;
    margin-right: 30px;
}
.blocks {
    color: white;
}
.blocks .img {
    display: flex;
    height: 50px;
    margin: 60px 0px;
}
.img img{
    margin: 15px;
    height: 60px;
    object-fit: cover;
}
.blocks h1{
    font-weight: bold;
    font-family: "Playfair display";
    font-size: 30px;
    margin-bottom: 50px;
}

.blocks p{
    margin: 15px 0;
    font-family: "Poppins";
    width: 300px;
    font-size: 20px;

}
.blocks a{
    text-decoration: none;
    color: white;
}
.blocks ul {
    list-style: none;
}
.blocks ul li {
    font-family: "Poppins";
    font-size: 20px;
    margin: 10px 0;
    text-decoration: underline 0.15em rgba(255, 255, 255, 0);
    transition: 300ms;
}
ul li a {
    text-decoration: none;
}

.blocks ul li:hover {
    text-decoration-color: rgba(255, 255, 255, 1);
}
</style>

