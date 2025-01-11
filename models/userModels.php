<?php

require_once 'bddModels.php';

class UserModels
{
    private function create_bdd()
    {
        $pdo = create_bdd();
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