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

function getVideoGamePerUser($idUser){
    $bdd = create_bdd();
    $sql = 'SELECT idUser, idJV FROM bibliotheque WHERE idUser = :idUser';
    $result = $bdd->prepare($sql);
    $resultat = $result->execute();
}

function getMostPlayVideoGame($idUser){
    $bdd = create_bdd();
    $sql = 'SELECT idJV FROM bibliotheque WHERE SELECT MAX(nbHeure) FROM bibliotheque';
}

?>