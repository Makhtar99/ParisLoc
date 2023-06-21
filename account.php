
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="components/logo2.png">
    <link rel="stylesheet" href="css js/Account.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Account</title>
</head>

<body>

    <?php include 'components/header.php'; ?> 

    <div class="container">
        <h1>Mon Compte</h1>
        <div class="identify-parent">
            <div class="identify">
                <img src="https://www.bing.com/th?id=OIP.rWPZbrgM1ewg2li0EGlPMAHaHa&w=150&h=150&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=3.1&rm=2">
                <p>Nom Prenom</p>
            </div>
            <button><a href="Modification.php">Modifier mon profil</a></button>
        </div>

        <div class="nav">
            <div class="nav-bar-parent">
                <ul class="nav-bar" id="nav-bar">
                    <li ><a  class="element">Mes réservations</a></li>
                    <li ><a  class="element">Mes réservations passées</a></li>
                    <li ><a  class="element">Mes réservations futures</a></li>
                    <li ><a  class="element">Messagerie</a></li>
                </ul>
                <div class="bar"></div>
            </div>
            <div class="barre"></div>
        </div>

        <div id="div1" class="free"></div>

        <div id="div2" class="present ">
        <?php require 'alreadydone.php'; ?> 
            <div class="reservation">
                <h3>Réservation ID : <?php echo $reservationRow['ID']; ?></h3>
                <h1>Logement : <?php echo $logementRow['Titre']; ?></h1>
                <p>Date d'arrivée : <?php echo $reservationRow['Date_depart']; ?></p>
                <p>Date de fin : <?php echo $reservationRow['Date_arrivée']; ?></p>
                <p>Nombre de personnes : <?php echo $reservationRow['Nombre_personnes']; ?></p>
            </div>

        </div>

        
        <div id="div3" class="past">
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        
        <div id="div4" class="future">
             <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="reservation">
                <img src="https://th.bing.com/th/id/R.d9ed1088b119bd43a9ad2e92c545bb7d?rik=IEKvPvWjIuWXWg&pid=ImgRaw&r=0" >
                <div>
                    <h1>Loren ipson</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        
        <div id="div5" class="message">
        </div>
        
    </div>

    <?php include 'components/footer.php' ?>

    <script src="css js/Account.js"></script>
    
</body>
</html>