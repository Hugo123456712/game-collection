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

function addVideoGame($nomJV, $editeur, $dateSortie, $couverture){
    $bdd = create_bdd();
    $nomJV = htmlspecialchars($nomJV);
    $editeur = htmlspecialchars($editeur);
    $dateSortie = htmlspecialchars($dateSortie);
    $couverture = htmlspecialchars($couverture);

    $sql = 'INSERT INTO jeu_video (nomJV, editeur, dateSortie, couverture) 
    VALUES (:nomJV, :editeur, :dateSortie, :couverture)';
    $result = $bdd->prepare($sql);
    $resultat = $result->execute();
}

function deleteVideoGame($idJV){
    $bdd = create_bdd();
    $idJV = htmlspecialchars($idJV);
    $sql = 'DELETE FROM bibliotheque WHERE idJV = :idJV';
    $result = $bdd->prepare($sql);
    $resultat = $result->execute();
    $anotherSQL = 'DELETE FROM jeu_video WHERE idJV = :idJV';
    $anotherResult = $dbb->prepare($anotherSQL);
    $anotherResultat = $anotherResult->execute();
}

?>