<?php
session_start();
require_once 'models/loginModels.php';

class LoginController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user = loginModels::findByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('Location: /home');
                exit;
            } else {
                $error = "Email ou mot de passe incorrect.";
                include 'views/loginView.php';
            }
        } else {
            include 'views/loginView.php';
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login');
    }
}
