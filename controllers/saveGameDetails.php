<?php
require_once "models/bibliothequeModels.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $idUser = $_SESSION['user']['idUser'];
    } else {
        echo "Erreur: utilisateur non connecté.";
        exit();
    }

    $idJV = $_POST['idJV'];
    $timeSpent = $_POST['timeSpent'];

    $bibliothequeModels = new BibliothequeModels();
    $existingGame = $bibliothequeModels->getGameFromBibliotheque($idUser, $idJV);

    if ($existingGame) {
        echo "Le jeu est déjà dans votre bibliothèque.";
    } else {
        $result = $bibliothequeModels->addGameToBibliotheque($idUser, $idJV, $timeSpent);

        if ($result) {
            header("Location: /home");
            exit();
        } else {
            echo "Erreur lors de l'enregistrement des détails du jeu.";
        }
    }
}
