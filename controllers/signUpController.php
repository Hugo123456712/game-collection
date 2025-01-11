<?php
class SignUpController {
    private $userModel;

    public function __construct() {
        $this->userModel = new signUpModels();
    }

    public function handleSignUp() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['SignUp'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['mdp']);
            $password2 = htmlspecialchars($_POST['mdp2']);

            if ($password === $password2) {
                if ($this->userModel->checkUserExists($email)) {
                    $error = "L'utilisateur existe déjà.";
                    require 'views/SignUpView.php';
                    exit();
                }
                $this->userModel->createUser($nom, $prenom, $email, $password);
                header("Location: /login");
                exit();
            } else {
                $error = "Les mots de passe ne correspondent pas.";
                require 'views/signUpView.php';
                exit();
            }
        }
    }
}
?>