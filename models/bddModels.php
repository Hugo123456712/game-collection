<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if (!function_exists('create_bdd')) {
    function create_bdd(){
        $host = $_ENV["DB_HOST"];
        $dbname = $_ENV["DB_NAME"];
        $user = $_ENV["DB_USER"];
        $password = $_ENV["DB_PASSWORD"];
        $pdo = new PDO('mysql:host='.$host.'; dbname='. $dbname, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $pdo;
    }
}

?>