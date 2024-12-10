<?php 
function create_bdd(){
    $host = 'localhost';
    $dbname = 'td_game-collection';
    $user = 'root';
    $password = '';
    $pdo = new PDO('mysql:host='.$host.'; dbname='. $dbname, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    return $pdo;
}

function viewUser($idUser){
    $bdd = create_bdd();
    $sql = 'SELECT prenom, nom, email FROM UTILISATEUR WHERE idUser = :idUser';
    $result = $bdd->prepare($sql);
    $resultat = $result->execute();
}

function addUser($prenom, $nom, $email, $mdp){
    $bdd = create_bdd();
    $prenom = htmlspecialchars($prenom);
    $nom = htmlspecialchars($nom);
    $email = htmlspecialchars($email);
    $mdp = htmlspecialchars($password);

    $sql = 'INSERT INTO UTILISATEUR (prenom, nom, email, mdp)
    VALUES (:prenom, :nom, :email, :mdp)';
    $result = $bdd->prepare($sql);
    $resultat = $result->execute();
}

function deleteUser($idUser){
    $bdd = create_bdd();
    $idUser = htmlspecialchars($idUser);
    $sql = 'DELETE FROM UTILISATEUR WHERE idUser = :idUser';
    $result = $bdd->prepare($sql);
    $resultat = $result->execute();
}

?>