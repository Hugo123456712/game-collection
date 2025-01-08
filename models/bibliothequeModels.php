<?php

require_once 'bddModels.php';

class BibliothequeModels
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

    function getVideoGamePerUser($idUser)
    {
        $bdd = $this->create_bdd();
        $sql = 'SELECT jeu_video.*, bibliotheque.nbHeure FROM bibliotheque JOIN jeu_video ON bibliotheque.idJV = jeu_video.idJV WHERE bibliotheque.idUser = :idUser';
        $stmt = $bdd->prepare($sql);
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getMostPlayVideoGame($idUser)
    {
        $bdd = $this->create_bdd();
        $sql = 'SELECT idJV FROM bibliotheque WHERE (SELECT MAX(nbHeure) FROM bibliotheque)';
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addGameToBibliotheque($idUser, $idJV, $timeSpent) {
        $bdd = $this->create_bdd();
        $sql = 'INSERT INTO bibliotheque (idUser, idJV, nbHeure) VALUES (:idUser, :idJV, :timeSpent)';
        $stmt = $bdd->prepare($sql);
        error_log("Executing query: $sql with idUser = $idUser, idJV = $idJV, timeSpent = $timeSpent");
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
}
?>