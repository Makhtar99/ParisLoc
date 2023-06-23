<?php
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "Airbnb";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Échec de la connexion à la base de données : " . $this->conn->connect_error);
        }
    }

    public function getLogement($logementId)
    {
        $sql = "SELECT * FROM Hébergements WHERE ID = '$logementId'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getReservations($logementId)
    {
        $sql = "SELECT * FROM Réservations WHERE ID_hébergement = '$logementId'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getCommentaires($logementId)
    {
        $sql = "SELECT c.Contenu_commentaire, c.Note, u.username FROM Commentaires c INNER JOIN users u ON c.ID_utilisateur = u.id WHERE c.ID_hébergement = '$logementId'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function checkDisponibilites($logementId, $dateDépart, $dateFin)
    {
        $dispoSql = "SELECT * FROM Hébergements WHERE ID = '$logementId' AND Date_depart <= '$dateDépart' AND Date_arrivée >= '$dateFin'";
        $dispoResult = $this->conn->query($dispoSql);

        return $dispoResult->num_rows > 0;
    }

    public function makeReservation($utilisateurConnecte, $dateDépart, $dateFin, $nombrePersonnes, $logementId)
    {
        $sql = "INSERT INTO Réservations (ID_utilisateur, Date_depart, Date_arrivée, Nombre_personnes, ID_hébergement)
                VALUES ('$utilisateurConnecte', '$dateDépart', '$dateFin', '$nombrePersonnes', '$logementId')";

        return $this->conn->query($sql);
    }

    public function addCommentaire($utilisateurConnecte, $logementId, $commentaire, $note)
    {
        $commentaireSql = "INSERT INTO Commentaires (ID_utilisateur, ID_hébergement, Contenu_commentaire, Note)
                VALUES ('$utilisateurConnecte', '$logementId', '$commentaire', '$note')";

        return $this->conn->query($commentaireSql);
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>


