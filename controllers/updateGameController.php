<?php

class updateGameController {
    private VideoGameModels $videoGameModels;
    private BibliothequeModels $bibliothequeModels;

    public function __construct() {
        $this->videoGameModels = new VideoGameModels();
        $this->bibliothequeModels = new BibliothequeModels();
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idJV'])) {
                $idJV = $_POST['idJV'];
                $jeu = $this->videoGameModels->getGameById($idJV);
                $_SESSION['jeu'] = $jeu;
                require 'views/updateGameView.php';
            } else {
                echo "Erreur: idJV non défini.";
                exit();
            }
        }
    }

    public function addGameToBibliotheque($idUser, $idJV, $timeSpent) {
        return $this->bibliothequeModels->addGameToBibliotheque($idUser, $idJV, $timeSpent);
    }
}
?>