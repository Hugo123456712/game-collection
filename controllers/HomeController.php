<?php
require_once 'models/videoGameModels.php';
require_once 'models/bibliothequeModels.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$idUser = $_SESSION['user']['idUser'];
$videoGameModel = new VideoGameModels();
$jeux = $videoGameModel->getVideoGamePerUser($idUser);

include 'views/homeView.php';
?>