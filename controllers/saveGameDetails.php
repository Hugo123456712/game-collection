<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser']; 
    } else {
        echo "Erreur: utilisateur non connecté.";
        exit();
    }
    
    $idJV = $_POST['idJV'];
    $timeSpent = $_POST['timeSpent'];

    $controller = new updateGameController();
    $result = $controller->addGameToBibliotheque($idUser, $idJV, $timeSpent);

    if ($result) {
        header("Location: /home");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement des détails du jeu.";
    }
}
?>
