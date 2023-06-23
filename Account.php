
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

<?php include 'components/Header-admin.php' ?>
    <div class="container">
        <h1>Mon Compte</h1>
        <div class="identify-parent">
            <div class="identify">
                <img src="https://www.bing.com/th?id=OIP.rWPZbrgM1ewg2li0EGlPMAHaHa&w=150&h=150&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=3.1&rm=2">
            </div>
            <div class="btn">
                <button><a href="Modif.php">Modifier mon profil</a></button>
                <button><a href="../welcome.php">Deconnexion</a></button>
            </div>
        </div>

        <div class="nav">
            <div class="nav-bar-parent">
                <ul class="nav-bar" id="nav-bar">
                    <li ><a  class="element" >Mes réservations</a></li>
                    <li ><a  class="element" >Mes réservations passées</a></li>
                    <li ><a  class="element" >Messagerie</a></li>
                </ul>
                <div class="bar"></div>
            </div>
            <div class="barre"></div>
        </div>

        <div id="div1" class="free">
        </div>

        <div id="div2" class="present ">
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
                    die("Veuillez vous connecter pour afficher vos réservations.");
                }

                $utilisateurConnecte = $_SESSION['user']['id'];

                $reservationsSql = "SELECT * FROM Réservations WHERE ID_utilisateur = '$utilisateurConnecte'";
                $reservationsResult = $conn->query($reservationsSql);

                if ($reservationsResult->num_rows > 0) {
                    while ($reservationRow = $reservationsResult->fetch_assoc()) {
                        $logementId = $reservationRow['ID_hébergement'];
                        $logementSql = "SELECT * FROM Hébergements WHERE ID = '$logementId'";
                        $logementResult = $conn->query($logementSql);

                        if ($logementResult->num_rows > 0) {
                            $logementRow = $logementResult->fetch_assoc();
                ?>
                            <h1>Logement : <?php echo $logementRow['Titre']; ?></h1>
                            <p>Date d'arrivée : <?php echo $reservationRow['Date_depart']; ?></p>
                            <p>Date de fin : <?php echo $reservationRow['Date_arrivée']; ?></p>
                            <p>Nombre de personnes : <?php echo $reservationRow['Nombre_personnes']; ?></p>
                            <form method="POST" action="">
                                <input type="hidden" name="reservationId" value="<?php echo $reservationRow['ID']; ?>">
                                <button type="submit" name="annulerReservation">Annuler la réservation</button>
                            </form>
                <?php
                        }
                    }
                } else {
                    echo "<p>Aucune réservation trouvée.</p>";
                }

                if (isset($_POST['annulerReservation'])) {
                    $reservationId = $_POST['reservationId'];
                    $annulationSql = "DELETE FROM Réservations WHERE ID = '$reservationId'";

                    if ($conn->query($annulationSql) === TRUE) {
                        echo "Réservation annulée avec succès.";
                    } else {
                        echo "Erreur lors de l'annulation de la réservation : " . $conn->error;
                    }
                }

                $conn->close();
            ?>


        </div>

            
        <div id="div3" class="past">
        </div>

           
        <div id="div4" class="message">
            <?php
            // Vérifie si l'utilisateur est connecté
            if (!isset($_SESSION['user'])) {
                // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
                header("Location: login.php");
                exit();
            }

            // Récupère l'ID de l'utilisateur connecté et son rôle
            $user_id = $_SESSION['user']['id'];
            $user_role = $_SESSION['user']['role'];

            // Vérifie si l'utilisateur a déjà fait une réservation
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "Airbnb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Erreur de connexion à la base de données : " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Réservations WHERE ID_utilisateur = '$user_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // L'utilisateur a fait une réservation, envoie un message automatique aux administrateurs
                if ($user_role != "Admin") {
                    $admin_sql = "SELECT * FROM users WHERE role = 'Admin'";
                    $admin_result = $conn->query($admin_sql);

                    if ($admin_result->num_rows > 0) {
                        while ($admin_row = $admin_result->fetch_assoc()) {
                            $admin_user_id = $admin_row['ID_utilisateur'];
                            $message = "L'utilisateur $user_id a effectué une réservation.";

                            // Envoie le message automatique à l'administrateur
                            $insert_sql = "INSERT INTO messages (sender, receiver, message) VALUES ('$user_id', '$admin_user_id', '$message')";
                            $conn->query($insert_sql);
                        }
                    }
                }
            }

            // Affiche le système de messagerie
            ?>

            <!-- Formulaire d'envoi de message -->
            <form method="post">
                <textarea name="message" placeholder="Votre message"></textarea>
                <br>
                <button type="submit">Envoyer</button>
            </form>

            <?php
            // Traitement de l'envoi du message
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['message']) && !empty($_POST['message'])) {
                    $message = $_POST['message'];

                    // Envoie le message à l'administrateur ou à une autre destination
                    // Insérez ici votre code pour envoyer le message (par exemple, l'insertion dans la base de données, l'envoi par e-mail, etc.)
                    // ...
                    echo "<p>Message envoyé : $message</p>";
                }
            }
            ?>

            <!-- Affichage des messages -->
            <h2>Messages</h2>
            <?php
            // Récupère les messages de l'utilisateur depuis la base de données
            $user_messages_sql = "SELECT * FROM messages WHERE sender = '$user_id'";
            $user_messages_result = $conn->query($user_messages_sql);

            if ($user_messages_result->num_rows > 0) {
                while ($user_message_row = $user_messages_result->fetch_assoc()) {
                    $user_message = $user_message_row['message'];
                    echo "<p>Message de l'utilisateur : $user_message</p>";
                }
            } else {
                echo "<p>Aucun message</p>";
            }

            // Si l'utilisateur est un administrateur, affiche les messages des autres utilisateurs
            if ($user_role == "Admin") {
                $other_users_messages_sql = "SELECT * FROM messages WHERE receiver = '$user_id'";
                $other_users_messages_result = $conn->query($other_users_messages_sql);

                if ($other_users_messages_result->num_rows > 0) {
                    while ($other_user_message_row = $other_users_messages_result->fetch_assoc()) {
                        $other_user_message = $other_user_message_row['message'];
                        echo "<p>Message d'un autre utilisateur : $other_user_message</p>";
                    }
                } else {
                    echo "<p>Aucun message des autres utilisateurs</p>";
                }
            }

            $conn->close();
            ?>
        </div>
    </div>

            <footer style="height: 200px; background:black; ">

            </footer>
    <?php include 'components/Footer.php' ?>
<!-- <script src="css js/Account.js">
        
    </script> -->
    
</body>
</html>