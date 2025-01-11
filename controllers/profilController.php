<?php
require_once 'models/profilModels.php';

class ProfilController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProfilModels();
    }

    public function displayProfile($idUser)
    {
        if (isset($_SESSION['user'])) {
            $user = $this->model->getInformation($idUser);
            if ($user) {
                require 'views/profilView.php';
            } else {
                echo "Erreur : Les informations de l'utilisateur n'ont pas pu être récupérées.";
            }
        } else {
            $_SESSION['message'] = "Utilisateur non connecté.";
            header('Location: login');
            exit();
        }
    }

    public function updateProfile($idUser, $prenom, $nom, $mdp, $email)
    {
        $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

        $result = $this->model->updateInformation($idUser, $prenom, $nom, $mdp, $email);
        if ($result) {
            header('Location: /home');
        } else {
            header('Location: /profil');
        }
    }
}
