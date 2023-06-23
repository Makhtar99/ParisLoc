<!DOCTYPE html>
<html>
    <link rel = "stylesheet" href ="../css js/dashboard.css">
    <head>
        <title>Liste des réservations</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "Airbnb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($_SESSION['user']['role'] !== 'Admin') {
            die("Vous n'avez pas les autorisations nécessaires pour accéder à cette page.");
        }

        // récupérer les réservations avec les noms d'utilisateur, les titres des logements et les informations utilisateur
        $reservationSql = "SELECT Réservations.*, USERS.username, USERS.Name, USERS.Familyname, USERS.email, Hébergements.titre 
                        FROM Réservations 
                        INNER JOIN USERS ON Réservations.ID_utilisateur = USERS.ID
                        INNER JOIN Hébergements ON Réservations.ID_hébergement = Hébergements.ID";
        $reservationResult = $conn->query($reservationSql);

        if ($reservationResult->num_rows > 0) {
            while ($row = $reservationResult->fetch_assoc()) {
                ?>
                <div class="reservation">
                    <h2><a href='reservation.php?id=<?php echo $row["ID"]; ?>'><?php echo $row["titre"]; ?></a></h2>
                    <p><strong>Début:</strong> <?php echo $row["Date_depart"]; ?></p>
                    <p><strong>Fin:</strong> <?php echo $row["Date_arrivée"]; ?></p>
                    <p><strong>Nombre de personnes:</strong> <?php echo $row["Nombre_personnes"]; ?></p>
                    <p><strong>Nom de l'utilisateur:</strong> <?php echo $row["username"]; ?></p>
                    <p><strong>Nom:</strong> <?php echo $row["Name"]; ?></p>
                    <p><strong>Nom de famille:</strong> <?php echo $row["Familyname"]; ?></p>
                    <p><strong>Email:</strong> <?php echo $row["email"]; ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="reservationId" value="<?php echo $row["ID"]; ?>">
                        <input type="submit" name="deleteReservation" value="Supprimer la réservation">
                    </form>
                </div>
                <?php
            }
        } else {
            echo "<p class='no-reservation'>Aucune réservation trouvée dans la base de données.</p>";
        }

        // Traitement de la suppression de réservation
        if (isset($_POST['deleteReservation'])) {
            $reservationId = $_POST['reservationId'];
            $deleteSql = "DELETE FROM Réservations WHERE ID = '$reservationId'";

            if ($conn->query($deleteSql) === TRUE) {
                echo "Réservation supprimée avec succès.";
            } else {
                echo "Erreur lors de la suppression de la réservation : " . $conn->error;
            }
        }

        $conn->close();
        ?>


        <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "Airbnb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Échec de la connexion à la base de données : " . $conn->connect_error);
        }

        // Récupérer tous les utilisateurs de la base de données
        $sql = "SELECT id, username, role FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="userId" value="<?php echo $row["id"]; ?>">
                                <input type="submit" name="delete" value="Supprimer">
                                <input type="text" name="newRole" placeholder="Nouveau rôle">
                                <input type="submit" name="modifyRole" value="Modifier le rôle">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        } else {
            echo "<p>Aucun utilisateur trouvé dans la base de données.</p>";
        }


        // Traitement des actions (suppression de l'utilisateur, modification du rôle)
        if (isset($_POST['delete'])) {
            $userId = $_POST['user']['id'];
            $deleteSql = "DELETE FROM users WHERE id = '$userId'";

            if ($conn->query($deleteSql) === TRUE) {
                echo "Utilisateur supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
            }
        }

        if (isset($_POST['modifyRole'])) {
            $userId = $_POST['userId'];
            $newRole = $_POST['newRole']; // Nouveau rôle saisi

            $modifyRoleSql = "UPDATE users SET role = '$newRole' WHERE id = '$userId'";

            if ($conn->query($modifyRoleSql) === TRUE) {
                echo "Rôle de l'utilisateur modifié avec succès.";
            } else {
                echo "Erreur lors de la modification du rôle de l'utilisateur : " . $conn->error;
            }
        }

        $conn->close();
        ?>


    </body>
</html>

