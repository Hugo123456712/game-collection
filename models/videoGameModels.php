<?php

class VideoGameModels
{
    private function create_bdd()
    {
        $host = 'localhost';
        $dbname = 'td_game-collection';
        $user = 'root';
        $password = '';
        $pdo = new PDO('mysql:host=' . $host . '; dbname=' . $dbname, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
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

    function addVideoGame($nomJV, $editeur, $dateSortie, $couverture)
    {
        $bdd = $this->create_bdd();
        $nomJV = htmlspecialchars($nomJV);
        $editeur = htmlspecialchars($editeur);
        $dateSortie = htmlspecialchars($dateSortie);
        $couverture = htmlspecialchars($couverture);

        $sql = 'INSERT INTO jeu_video (nomJV, editeur, dateSortie, couverture) 
    VALUES (:nomJV, :editeur, :dateSortie, :couverture)';
        $result = $bdd->prepare($sql);
        $resultat = $result->execute();
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
}
