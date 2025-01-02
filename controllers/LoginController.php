<?php

require_once 'models/loginModels.php';

class LoginController {
    public function showLoginForm() {
        include 'views/loginView.php';
    }

    public function handleLogin() {
        session_start();  

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mdp'];
            $user = loginModels::findByEmail($email);

            if ($user && password_verify($password, $user['mdp'])) {
                $_SESSION['user'] = $user;
                header('Location: /homeView');
                exit;
            } else {
                header('Location: /?error=invalid_credentials'); 
                exit;
            }
        }
    }
}
