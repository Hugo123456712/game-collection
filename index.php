<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

include 'models/bddModels.php';
include 'models/bibliothequeModels.php';
include 'models/loginModels.php';
include 'models/signUpModels.php';
include 'models/updateGameModels.php';
include 'models/userModels.php';
include 'models/videoGameModels.php';

include 'controllers/AjoutController.php';
include 'controllers/AjoutFormulaireController.php';
require_once 'controllers/SignUpController.php';
require_once 'controllers/LoginController.php';

include("views/headerView.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/' :
    case '' :
        include 'views/signUpView.php';
        break;
    case '/bibliotheque' :
        // Inclure la vue de la bibliothèque ici
        break;  
    case '/signup':
        $signUpController = new SignUpController();
        $signUpController->handleSignUp();
        break;
    case '/home':
        require 'controllers/HomeController.php';
        break;
    case '/login':
        $loginController = new LoginController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginController->handleLogin();
        } else {
            $loginController->showLoginForm();
        }
        break;
    case '/ajout' :
        $ajoutController = new AjoutController(new VideoGameModels(), new BibliothequeModels());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ajoutController->addGameToBibliotheque();
        } else {
            $ajoutController->render();
        }
        break;
    case '/ajoutFormulaire' :
        $ajoutFormulaireController = new AjoutFormulaireController(new VideoGameModels());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ajoutFormulaireController->addVideoGame();
        } else {
            $ajoutFormulaireController->render();
        }
        break;
    case '/updateGame' :
        require 'controllers/updateGameController.php';
        break;
    case '/saveGameDetails' :
        require 'controllers/saveGameDetails.php';
        break;
    case '/deleteGame' :
        require 'controllers/deleteGame.php';
        break;
    case '/classement' :
        // Inclure la vue du classement ici
        break;
    case '/profil' :
        $profilController = new profilController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profilController->updateProfile($_POST['idUser'], $_POST['prenom'], $_POST['nom'], $_POST['pwd'], $_POST['email']);
        } else {
            $profilController->displayProfile($_SESSION['user']['idUser']);
        }
        break;
    case '/logout' :
        require 'controllers/LogoutController.php';
        break;
    default:
        // Inclure une vue par défaut ou une page d'erreur ici
        break;
}

include("views/footerView.php");

?>