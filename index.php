<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

include 'models/bddModels.php';
include 'models/bibliothequeModels.php';
include 'models/loginModels.php';
include 'models/signUpModels.php';
include 'models/userModels.php';
include 'models/videoGameModels.php';

include 'controllers/AjoutController.php';
include 'controllers/AjoutFormulaireController.php';
require_once 'controllers/signUpController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/profilController.php';
require_once 'controllers/updateGameController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ClassementController.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$request = $_SERVER['REQUEST_URI'];

// gestion de la méthode post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($request) {
        case '/signup':
            $signUpController = new SignUpController();
            $signUpController->handleSignUp();
            break;
        case '/login':
            $loginController = new LoginController();
            $loginController->handleLogin();
            break;
        case '/ajout':
            $ajoutController = new AjoutController(new VideoGameModels(), new BibliothequeModels());
            $ajoutController->addGameToBibliotheque();
            break;
        case '/ajoutFormulaire':
            $ajoutFormulaireController = new AjoutFormulaireController(new VideoGameModels());
            $ajoutFormulaireController->addVideoGame();
            break;
        case '/profil':
            $profilController = new ProfilController();
            $profilController->updateProfile($_POST['idUser'], $_POST['prenom'], $_POST['nom'], $_POST['pwd'], $_POST['email']);
            break;
    }
}

include("views/headerView.php");

switch ($request) {
    case '/':
    case '':
        include 'views/signUpView.php';
        break;
    case '/bibliotheque':
        break;
    case '/signup':
        include 'views/signUpView.php';
        break;
    case '/home':
        $homeController = new HomeController(new VideoGameModels(), new BibliothequeModels());
        $homeController->render();
        break;
    case '/login':
        $loginController = new LoginController();
        $loginController->showLoginForm();
        break;
    case '/ajout':
        $ajoutController = new AjoutController(new VideoGameModels(), new BibliothequeModels());
        $ajoutController->render();
        break;
    case '/ajoutFormulaire':
        $ajoutFormulaireController = new AjoutFormulaireController(new VideoGameModels());
        $ajoutFormulaireController->render();
        break;
    case '/updateGame':
        $updateGameController = new updateGameController();
        $updateGameController->handleRequest();
        break;
    case '/saveGameDetails':
        require 'controllers/saveGameDetails.php';
        break;
    case '/deleteGame':
        require 'controllers/deleteGame.php';
        break;
    case '/classement':
        $classementController = new ClassementController();
        $classementController->render();
        break;
    case '/profil':
        $profilController = new ProfilController();
        $profilController->displayProfile($_SESSION['user']['idUser']);
        break;
    case '/deleteAccount':
        require 'controllers/DeleteCompteController.php';
        break;
    case '/logout':
        require 'controllers/LogoutController.php';
        break;
    default:
        break;
}

include("views/footerView.php");
