<?php

class AjoutFormulaireController
{
    private VideoGameModels $videoGameModels;

    public function __construct(VideoGameModels $videoGameModels)
    {
        $this->videoGameModels = $videoGameModels;
    }

    public function render()
    {
        require 'views/ajoutFormulaireView.php';
    }

    public function addVideoGame()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            if (isset($_POST['nomJV']) && isset($_POST['editeur']) && isset($_POST['dateSortie']) && isset($_POST['Platformes']) && isset($_POST['description']) && isset($_POST['couverture'])) {
                $nomJV = htmlspecialchars($_POST['nomJV']);
                $editeur = htmlspecialchars($_POST['editeur']);
                $dateSortie = htmlspecialchars($_POST['dateSortie']);
                $Platformes = htmlspecialchars($_POST['Platformes']);
                $description = htmlspecialchars($_POST['description']);
                $couverture = htmlspecialchars($_POST['couverture']);

                error_log("nomJV: $nomJV");
                error_log("editeur: $editeur");
                error_log("dateSortie: $dateSortie");
                error_log("Platformes: $Platformes");
                error_log("description: $description");
                error_log("couverture: $couverture");

                $result = $this->videoGameModels->addVideoGame($nomJV, $editeur, $dateSortie, $Platformes, $description, $couverture);

                if ($result) {
                    $message = "Jeu ajouté avec succès!";
                } else {
                    $errors[] = "Erreur lors de l'ajout du jeu.";
                }
            } else {
                $errors[] = "Tous les champs sont requis.";
            }

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    error_log($error);
                }
            }

            header('Location: ajout');
            exit();
        }
    }
}
