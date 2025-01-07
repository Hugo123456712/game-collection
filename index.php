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

require 'controllers/AjoutController.php';
require 'controllers/AjoutFormulaireController.php';
require 'controllers/HomeController.php';
require 'controllers/LoginController.php';
// include 'controllers/saveGameDetails.php';
require 'controllers/signUpController.php';
require 'controllers/updateGameController.php';

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
        break;  
    case '/signup':
        $signUpController = new SignUpController();
        $signUpController->handleSignUp();
        break;
    case '/home':
        if (isset($_SESSION['user'])) {
            error_log("User session: " . print_r($_SESSION['user'], true)); 
            include 'views/homeView.php';  
        } else {
            header("Location: /login");  
            exit();
        }
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
    case '/classement' :
        break;
    case '/profil' :
        break;
    default:
        break;
}

include("views/footerView.php");



?>