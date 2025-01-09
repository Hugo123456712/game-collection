<?php
require_once 'models/bibliothequeModels.php';
require_once 'models/userModels.php';

class DeleteAccountController {
    private $bibliothequeModels;
    private $userModels;

    public function __construct() {
        $this->bibliothequeModels = new BibliothequeModels();
        $this->userModels = new UserModels();
    }

    public function handleRequest() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['idUser'];

            $this->bibliothequeModels->deleteGamesByUser($idUser);

            $this->userModels->deleteUser($idUser);

            session_unset();
            session_destroy();

            header('Location: /login');
            exit();
        } else {
            echo "Erreur: utilisateur non connecté.";
        }
    }
}

$controller = new DeleteAccountController();
$controller->handleRequest();