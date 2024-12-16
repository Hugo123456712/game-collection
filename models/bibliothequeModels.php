<?php 
require_once "bddModels.php";


function getVideoGamePerUser($idUser) {
    $bdd = create_bdd();
    $sql = 'SELECT idUser, bibliotheque.idJV, nomJV, nbHeure FROM bibliotheque INNER JOIN jeu_video ON bibliotheque.idJV = jeu_video.idJV WHERE idUser = :idUser';
    $result = $bdd->prepare($sql);
    $result->execute([':idUser' => $idUser]);
    $jeux = $result->fetchAll(PDO::FETCH_ASSOC); 
    return $jeux;
}


function getMostPlayVideoGame($idUser){
    $bdd = create_bdd();
    $sql = 'SELECT idJV FROM bibliotheque WHERE (SELECT MAX(nbHeure) FROM bibliotheque)';
}
?>