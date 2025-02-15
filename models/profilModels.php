<?php
require_once 'bddModels.php';



class ProfilModels
{
    private function create_bdd()
    {
        $pdo = create_bdd();
        return $pdo;
    }

    public function getInformation($idUser)
    {
        $bdd = $this->create_bdd();
        $sql = 'SELECT * FROM utilisateur WHERE idUser = :idUser';
        $stmt = $bdd->prepare($sql);
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateInformation($idUser, $prenom, $nom, $mdp, $email)
    {
        $bdd = $this->create_bdd();
        $sql = 'UPDATE utilisateur SET prenom = :prenom, nom = :nom, mdp = :mdp, email = :email WHERE idUser = :idUser';
        $stmt = $bdd->prepare($sql);
        return $stmt->execute([
            'prenom' => $prenom,
            'nom' => $nom,
            'mdp' => $mdp,
            'email' => $email,
            'idUser' => $idUser
        ]);
    }
}
