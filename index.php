<?php
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


/* Structure de base d'une page*/
include("views/headerView.php");

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/' :
    case '' :
        include 'views/signUpView.php';
        break;
    case '/bibliotheque' :
        #loadView('bibliotheque');
        break;  
        case '/signup':
            $signUpController = new SignUpController();
            $signUpController->handleSignUp();
            break;
        case '/home':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = loginModels::findByEmail($email);
        
                if ($user && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location: /homeView');
                    exit;
                } else {
                    header('Location: /?error=invalid_credentials');
                    exit;
                }
            }
            break;
       
    case '/ajout' :
        $ajoutController = new AjoutController(new VideoGameModels(), new BibliothequeModels());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ajoutController->addGameToBibliotheque();
        }else {
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
        #loadView('classements');
        break;
    case '/profil' :
        #loadView('profil');
        break;
    default:
        #loadView('404');
        break;
}

include("views/footerView.php");
?>