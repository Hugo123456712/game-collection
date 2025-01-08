<?php
require_once "controllers/updateGameController.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser']; 
    } else {
        echo "Erreur: utilisateur non connecté.";
        exit();
    }
    
    $idJV = $_POST['gameId'];

    $controller = new updateGameController();
    $result = $controller->deleteGameFromBibliotheque($idUser, $idJV);

    if ($result) {
        header("Location: /home");
        exit();
    } else {
        echo "Erreur lors de la suppression du jeu.";
    }
}
?>
