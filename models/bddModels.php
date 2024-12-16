<?php
if (!function_exists('create_bdd')) {
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
}

?>