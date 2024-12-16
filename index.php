<?php

include "vendor/autoload.php";

include 'models/bibliothequeModels.php';
include 'models/userModels.php';
include 'models/videoGameModels.php';
include 'models/bddModels.php';

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
        #loadView('ajout');
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