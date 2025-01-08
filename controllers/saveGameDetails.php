<?php
require_once "models/bibliothequeModels.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idUser'])) {
        $idUser = $_POST['idUser']; 
    } else {
        error_log("Erreur: utilisateur non connecté.");
        echo "Erreur: utilisateur non connecté.";
        exit();
    }
    
    $idJV = $_POST['idJV'];
    $timeSpent = $_POST['timeSpent'];

    error_log("Received form data: idUser = $idUser, idJV = $idJV, timeSpent = $timeSpent"); // Debugging information

    $bibliothequeModel = new BibliothequeModels();
    $result = $bibliothequeModel->addGameToBibliotheque($idUser, $idJV, $timeSpent);

    if ($result) {
        error_log("Détails du jeu enregistrés avec succès.");
        header("Location: /home");
        exit();
    } else {
        error_log("Erreur lors de l'enregistrement des détails du jeu.");
        echo "Erreur lors de l'enregistrement des détails du jeu.";
    }
}
?>
