<?php

include "vendor/autoload.php";

include("views/headerView.php");

// Analyser l'URL pour déterminer la vue à charger
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/' :
    case '' :
        include('views/homeView.php');
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