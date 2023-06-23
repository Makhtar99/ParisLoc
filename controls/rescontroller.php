<?php

require_once './models/reservationmod.php';

session_start();

if (!isset($_SESSION['user'])) {
    die("Veuillez vous connecter pour effectuer une réservation ou ajouter un avis.");
}

if (isset($_POST['reserver'])) {
    $dateDépart = $_POST['Date_depart'];
    $dateFin = $_POST['Date_arrivée'];
    $nombrePersonnes = $_POST['Nombre_personnes'];
    $utilisateurConnecte = $_SESSION['user']['id'];
    $logementId = $_GET['id'];

    if (checkAvailability($logementId, $dateDépart, $dateFin)) {
        if (makeReservation($logementId, $dateDépart, $dateFin, $nombrePersonnes, $utilisateurConnecte)) {
            $reservationSuccess = true;
        } else {
            $reservationError = "Erreur lors de la réservation.";
        }
    } else {
        $reservationError = "Le logement n'est pas disponible aux dates sélectionnées.";
    }
}

if (isset($_POST['commenter'])) {
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];
    $logementId = $_GET['id'];
    $utilisateurConnecte = $_SESSION['user']['id'];

    if (addComment($logementId, $utilisateurConnecte, $commentaire, $note)) {
        $commentSuccess = true;
    } else {
        $commentError = "Erreur lors de l'ajout du commentaire.";
    }
}

if (isset($_GET['id'])) {
    $logementId = $_GET['id'];
    $logement = getLogementById($logementId);

    if ($logement) {
        $commentaires = getCommentsByLogementId($logementId);
    } else {
        $logementError = "Logement introuvable.";
    }
}

require './vue/reservation.php';

?>


