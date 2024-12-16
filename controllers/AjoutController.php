<?php
class AjoutController
{
    private $models;

    public function __construct(VideoGameModels $models)
    {
        $this->models = new VideoGameModels();
    }

    public function render()
    {
        session_start();
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
        require 'views/ajoutView.php';
    }
}
