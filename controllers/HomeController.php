<?php

<?php
require_once 'models/videoGameModels.php';
require_once 'models/bibliothequeModels.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');

class HomeController
{
    private $models;

    public function __construct(VideoGameModels $models)
    {
        $this->models = $models;
    }

    public function render()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nomJV'])) {
                $nomJV = htmlspecialchars($_POST['nomJV']);
                $jeux = $this->models->searchGame($nomJV);
                if (empty($jeux)) {
                    header('Location: ajoutFormulaire');
                    exit();
                }
            }
        } else {
            $jeux = $this->models->getAllGames();
        }
        require 'views/homeView.php';
    }
}