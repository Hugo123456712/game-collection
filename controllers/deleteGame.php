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

    $bibliothequeModels = new BibliothequeModels();
    $result = $bibliothequeModels->deleteGameFromBibliotheque($idUser, $idJV);

    if ($result) {
        header("Location: /home");
        exit();
    } else {
        echo "Erreur lors de la suppression du jeu.";
    }
}
?>
