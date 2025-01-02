<?php
// LoginController.php

require_once 'models/loginModels.php';

class LoginController {
    public function showLoginForm() {
        include 'views/loginView.php';
    }

    public function handleLogin() {
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
    }
}
