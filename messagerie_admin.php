<?php include "header.php"
?>

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

<?php include "footer.php"
?>

<style>

    .all_msg{

        margin:150px 0;
        height: 800px;
        flex: none;
        display: flex;
        flex-direction: row;
    
    }

    .sidebar{
    width: 300px;
    background: white;
    overflow: hidden;
    border-radius: 30px;
}

.sidebar li {
    padding: 15px;
    font-size: 20px;

}

.sidebar ul li a {
    font-family: 'Poppins';
    color: black;
    list-style: none;
    text-decoration: none;

}

    .all_msg{
        width: 75%;
    }

    .all_msg header {
    padding:20px 0;
    background:#222221;
    }

    .all_msg header h2{
        margin-left: 20px;
        font-family: 'Poppins';
        font-size: 25px;
        color: white;
    }

    .body {
        display: flex;
        flex-direction: column;
        overflow: auto;
        height: 100%;
        background: #F5F5F5;
        padding: 20px;
    }

    .message {
        display: flex;
        padding: 20px;
    }

    .message p {
        font-size: 20px;
        color: black;
        font-weight:bold;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }

    .message.is-sender {
        justify-content: flex-end;
    }

    .message.is-sender p {
        padding: 20px;
        background: #222221;
        border-radius: 15px;
        color: white ;
        font-family: 'Poppins';
    }

    .message.is-receiver {
        justify-content: flex-start;
    }

    .message.is-receiver p {
        padding: 20px;
        background: white;
        border-radius: 15px;
        font-family: 'Poppins';
    }

    .content {
        border-radius: 30px;
        overflow: hidden;
    }

    .content form {
        flex: none;
        display: flex;
        align-items: center;
        height: 70px;
        padding: 12px 40px;
        background: #222221;
    }

    .content input {
        height: 100%;
        width: 100%;
        padding: 20px;
        border-radius: 30px;
        outline: none;
        border: 0;
        font-size: 20px;
    }

    .content form button {
        flex: none;
        border: 0;
        color: #54656f;
        margin-left: 12px;
        width: 46px;
        height: 46px;
        background-color: transparent;
        cursor: pointer;
    }

    .content button svg {
        width: 20px;
    }

    .content .submit {
        background: none;

        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;

        margin-right: 2%;
    }

</style>

<script>

    var $sub = document.querySelector('form .submit');
    var $input = document.querySelector('form input');
    var $body = document.querySelector('.body');
    var $msg = document.querySelector('.body .message.is-sender	');
    var $p = document.querySelector('.message p');

   

    $sub.addEventListener('click', function (event) {
        event.preventDefault();
        var newMessage = document.createElement('article');
        var p = document.createElement('p');
        p.textContent = $input.value;
        newMessage.appendChild(p);
        newMessage.classList.add('message');
        newMessage.classList.add('is-sender');
        $body.appendChild(newMessage);
     
	    $input.value = '';
    });

</script>