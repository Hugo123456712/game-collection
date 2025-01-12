<?php
class FirstProfilPageController {
    public function render() {

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $user = $_SESSION['user'];
        include 'views/FirstProfilViews.php';
    }
}