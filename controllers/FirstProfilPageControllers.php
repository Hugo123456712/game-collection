<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deleteAccount'])) {
        require_once '/models/FirstProfilsPageModels.php';
        deleteUserAndLibrary($user['idUser']);
        session_destroy();
        header('Location: /login');
        exit();
    } elseif (isset($_POST['logout'])) {
        session_destroy();
        header('Location: /login');
        exit();
    }
}

require_once '/views/FirstProfilPageViews.php';