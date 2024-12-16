<?php

require_once 'models/videoGameModels.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php'); 
    exit();
}

$idUser = $_SESSION['user']['id'];

$jeux = getVideoGamePerUser($idUser);

include 'views/homeView.php';