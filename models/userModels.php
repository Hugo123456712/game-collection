<?php

require_once 'bddModels.php';

class UserModels
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

    public function deleteUser($idUser) {
        $bdd = $this->create_bdd();
        $sql = 'DELETE FROM utilisateur WHERE idUser = :idUser';
        $stmt = $bdd->prepare($sql);
        $result = $stmt->execute([
            'idUser' => htmlspecialchars($idUser)
        ]);

        if ($result) {
            error_log("Utilisateur supprimé avec succès.");
        } else {
            error_log("Erreur lors de la suppression de l'utilisateur.");
        }

        return $result;
    }
}
?>