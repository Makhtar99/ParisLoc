        <footer>
            <div class="wrapper">
                <div class="footer_blocks">
                    <div class="blocks">
                            <h1>À propos de UNCO</h1>
                            <p>Fort d’une experience de plus de 50 ans, soutenue par une équipe de 8 conseillers passionnés par Paris, son architecture, ses quartiers, 
                            Unco vous accompage dans votre recherche de biens immobiliers.</p>
                            <br>
                            <p>Un objectif comun : Vous faire passer un excellent séjour.</p>
                            <div class="img">
                                <img src="assets/brontis 2.png">
                                <img src="assets/hetic logo.jpg">
                                <img src="assets/ville de paris.jpg">
                            </div>
                    </div>

                    <div class="blocks">
                            <h1>Navigation</h1>
                            <a href='#'>
                                <ul>
                                    <li>Accueil</li>
                                    <li>Mon profil</li>
                                    <li>Nous contacter</li>
                                </ul>
                            </a>
                    </div>
                        
                    <div class="blocks">
                            <h1>Nous rejoindre</h1>
                            <p>Venez nous rencontrer ! 
                            Nous recherchons en permanance des chasseurs immobiliers résidentiel. </p>
                            <br>
                            <p>Contactez nous sur rh@unco.fr pour en savoir plus. </p>
                    </div>
                </div>
            </div>
        </footer>
        
    </body>
</html>

<style>


    footer{
        background: #222221;
        padding: 100px 0;
    }

    .footer_blocks {
        display: flex;
        justify-content: space-between;
    }

    .blocks {
        color: white;
    }
    .blocks .img {
        display: flex;
        justify-content: space-between;
        height: 50px;
        margin: 75px 0;
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

    .blocks ul li {
        font-family: "Poppins";
        font-size: 20px;
        margin: 10px 0;
        text-decoration: underline 0.15em rgba(255, 255, 255, 0);
        transition: 300ms;
    }

    .blocks ul li:hover {
        text-decoration-color: rgba(255, 255, 255, 1);
    }
</style>

