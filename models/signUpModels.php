<?php
require_once 'bddModels.php';

class signUpModels
{
    public function createUser($nom, $prenom, $email, $password)
    {
        $pdo = create_bdd();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $hashedPassword]);
    }

    public function checkUserExists($email)
    {
        $pdo = create_bdd();
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
