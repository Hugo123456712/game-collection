<?php
require_once 'models/bibliothequeModels.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idUser'], $_POST['idJV'])) {
        $idUser = $_POST['idUser'];
        $idJV = $_POST['idJV'];

        $bibliothequeModels = new BibliothequeModels();
        $result = $bibliothequeModels->deleteGameFromBibliotheque($idUser, $idJV);

        if ($result) {
            header('Location: /home');
            exit();
        } else {
            echo "Erreur lors de la suppression du jeu.";
        }
    } else {
        echo "Données manquantes.";
    }
} else {
    echo "Méthode non supportée.";
}
?>