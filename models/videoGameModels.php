<?php 
require_once "bddModels.php";

class videoGameModels
{
    private function create_bdd()
    {
        $pdo = create_bdd();
        return $pdo;
    }

    function getAllGames()
    {
        $bdd = $this->create_bdd();
        $sql = 'SELECT * FROM jeu_video';
        $result = $bdd->query($sql);
        $jeux = $result->fetchAll();
        return $jeux;
    }

    function searchGame($nomJV)
    {
        $bdd = $this->create_bdd();
        $sql = 'SELECT * FROM jeu_video WHERE nomJV LIKE :nomJV';
        $stmt = $bdd->prepare($sql);
        $stmt->execute(['nomJV' => '%' . $nomJV . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function addVideoGame($nomJV, $editeur, $dateSortie, $Platformes, $description, $couverture)
    {
        $bdd = $this->create_bdd();
        $nomJV = htmlspecialchars($nomJV);
        $editeur = htmlspecialchars($editeur);
        $dateSortie = htmlspecialchars($dateSortie);
        $Platformes = htmlspecialchars($Platformes);
        $description = htmlspecialchars($description);
        $couverture = htmlspecialchars($couverture);

        $sql = 'INSERT INTO jeu_video (nomJV, descJV, plateformeJV, editeur, dateSortie, couverture) 
                VALUES (:nomJV, :description, :Platformes, :editeur, :dateSortie, :couverture)';
        $stmt = $bdd->prepare($sql);
        $result = $stmt->execute([
            'nomJV' => $nomJV,
            'description' => $description,
            'Platformes' => $Platformes,
            'editeur' => $editeur,
            'dateSortie' => $dateSortie,
            'couverture' => $couverture
        ]);

        if ($result) {
            error_log("Jeu ajouté avec succès.");
        } else {
            error_log("Erreur lors de l'ajout du jeu.");
        }

        return $result;
    }

    function deleteVideoGame($idJV)
    {
        $bdd = $this->create_bdd();
        $idJV = htmlspecialchars($idJV);
        $sql = 'DELETE FROM bibliotheque WHERE idJV = :idJV';
        $result = $bdd->prepare($sql);
        $resultat = $result->execute();
        $anotherSQL = 'DELETE FROM jeu_video WHERE idJV = :idJV';
        $anotherResult = $bdd->prepare($anotherSQL);
        $anotherResultat = $anotherResult->execute();
    }

    function getUserGames($idUser)
    {
        $bdd = $this->create_bdd();
        $sql = 'SELECT j.*, b.nbHeure FROM jeu_video j 
                JOIN bibliotheque b ON j.idJV = b.idJV 
                WHERE b.idUser = :idUser';
        $stmt = $bdd->prepare($sql);
        $stmt->execute(['idUser' => htmlspecialchars($idUser)]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function saveGameDetails($idUser, $idJV, $timeSpent)
    {
        $bdd = $this->create_bdd();
        $sql = 'INSERT INTO bibliotheque (idUser, idJV, nbHeure) VALUES (:idUser, :idJV, :timeSpent)';
        $stmt = $bdd->prepare($sql);
        $result = $stmt->execute([
            'idUser' => htmlspecialchars($idUser),
            'idJV' => htmlspecialchars($idJV),
            'timeSpent' => htmlspecialchars($timeSpent)
        ]);

        if ($result) {
            error_log("Détails du jeu enregistrés avec succès.");
        } else {
            error_log("Erreur lors de l'enregistrement des détails du jeu.");
        }

        return $result;
    }

    function getGameById($idJV)
    {
        $bdd = $this->create_bdd();
        $sql = 'SELECT * FROM jeu_video WHERE idJV = :idJV';
        $stmt = $bdd->prepare($sql);
        $stmt->execute(['idJV' => htmlspecialchars($idJV)]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getVideoGamePerUser($idUser) {
        $bdd = $this->create_bdd();
        $sql = 'SELECT vg.*, b.nbHeure FROM jeu_video vg
                JOIN bibliotheque b ON vg.idJV = b.idJV
                WHERE b.idUser = :idUser';
        $stmt = $bdd->prepare($sql);
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteGameFromBibliotheque($idUser, $idJV) {
        $bdd = $this->create_bdd();
        $sql = "DELETE FROM bibliotheque WHERE idUser = :idUser AND idJV = :idJV";
        $stmt = $bdd->prepare($sql);
        return $stmt->execute(['idUser' => $idUser, 'idJV' => $idJV]);
    }
}
