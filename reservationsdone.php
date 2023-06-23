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