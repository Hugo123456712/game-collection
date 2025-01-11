<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if (!function_exists('create_bdd')) {
    function create_bdd(){
        $host = $_ENV["DBHOST"];
        $dbname = $_ENV["DBNAME"];
        $user = $_ENV["DBUSER"];
        $password = $_ENV["DBMDP"];
        $pdo = new PDO('mysql:host='.$host.'; dbname='. $dbname, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $pdo;
    }
}

?>