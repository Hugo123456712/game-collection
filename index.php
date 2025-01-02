<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

include 'models/bibliothequeModels.php';
include 'models/userModels.php';
include 'models/videoGameModels.php';
include 'models/bddModels.php';
include 'models/loginModels.php';

include 'controllers/AjoutController.php';
include 'controllers/AjoutFormulaireController.php';
require_once 'controllers/SignUpController.php';
require_once 'controllers/LoginController.php';

include("views/headerView.php");

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
            error_log("User session: " . print_r($_SESSION['user'], true)); // Ajoutez cette ligne pour déboguer
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
    case '/classement' :
        break;
    case '/profil' :
        break;
    default:
        break;
}

include("views/footerView.php");
?>