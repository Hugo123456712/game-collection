<?php

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
        include 'views/homeView.php';
        break;
    case '/bibliotheque' :
        #loadView('bibliotheque');
        break;
    case '/ajout' :
        $ajoutController = new AjoutController(new VideoGameModels());
        $ajoutController->render();
        break;
    case '/ajoutFormulaire' :
        $ajoutFormulaireController = new AjoutFormulaireController(new VideoGameModels());
        $ajoutFormulaireController->render();
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