<?php
// require_once "../models/videoGameModels.php";
// require_once "../models/bibliothequeModels.php";

class updateGameController {
    private VideoGameModels $videoGameModels;
    private BibliothequeModels $bibliothequeModels;

    public function __construct() {
        $this->videoGameModels = new VideoGameModels();
        $this->bibliothequeModels = new BibliothequeModels();
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idJV = $_POST['idJV'];
            $jeu = $this->videoGameModels->getGameById($idJV);
            session_start();
            $_SESSION['jeu'] = $jeu;
            require "../views/updateGameView.php";
        }
    }

    public function addGameToBibliotheque($idUser, $idJV, $timeSpent) {
        return $this->bibliothequeModels->addGameToBibliotheque($idUser, $idJV, $timeSpent);
    }
}

$controller = new updateGameController();
$controller->handleRequest();
?>