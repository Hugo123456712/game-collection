<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

include 'models/bibliothequeModels.php';
include 'models/userModels.php';
include 'models/videoGameModels.php';
include 'models/bddModels.php';

include 'controllers/AjoutController.php';
include 'controllers/AjoutFormulaireController.php';

/* Structure de base d'une page*/
include("views/headerView.php");

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/' :
    case '' :
        include 'views/loginView.php';
        break;
    case '/bibliotheque' :
        #loadView('bibliotheque');
        break;
    
    case '/home':
         if (!isset($_SESSION['user'])) {
                header('Location: /');
                exit;
            }
    include 'views/homeView.php'; 
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