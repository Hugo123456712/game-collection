<?php

class loginModels {
    public static function findByEmail($email) {
        $pdo = new PDO('mysql:host=localhost;dbname=td_game-collection', 'root', '');
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
