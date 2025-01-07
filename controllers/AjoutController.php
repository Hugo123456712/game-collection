<?php
class AjoutController
{
    private $bibliothequeModels;
    private $models;

    public function __construct(VideoGameModels $models, BibliothequeModels $bibliothequeModels)
    {
        $this->models = new VideoGameModels();
        $this->bibliothequeModels = $bibliothequeModels;
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
        require 'views/ajoutView.php';
    }

    public function addGameToBibliotheque()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idJV'])) {
            if (isset($_SESSION['user']['id'])) {
                $idJV = htmlspecialchars($_POST['idJV']);
                $idUser = $_SESSION['user']['id'];

                $result = $this->bibliothequeModels->addGameToBibliotheque($idUser, $idJV);

                if ($result) {
                    $message = "Jeu ajouté à votre bibliothèque avec succès!";
                } else {
                    $message = "Erreur lors de l'ajout du jeu à votre bibliothèque.";
                }

                $_SESSION['message'] = $message;
                header('Location: ajout');
                exit();
            } else {
                $_SESSION['message'] = "Utilisateur non connecté.";
                header('Location: login');
                exit();
            }
        }
    }
}