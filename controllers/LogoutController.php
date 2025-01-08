<?php

class LogoutController {
    public function handleRequest() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        
        session_destroy();

        header('Location: /login');
        exit;
    }
}

$controller = new LogoutController();
$controller->handleRequest();
