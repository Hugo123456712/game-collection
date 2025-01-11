<?php

require_once 'models/videoGameModels.php';
require_once 'models/bibliothequeModels.php';

class HomeController
{
    private $videoGameModels;
    private $bibliothequeModels;

    public function __construct(VideoGameModels $videoGameModels, BibliothequeModels $bibliothequeModels)
    {
        $this->videoGameModels = $videoGameModels;
        $this->bibliothequeModels = $bibliothequeModels;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }

    public function render()
    {
        $idUser = $_SESSION['user']['idUser'];
        $jeux = $this->bibliothequeModels->getVideoGamePerUser($idUser);

        // Inclure la vue
        require 'views/homeView.php';
    }
}
