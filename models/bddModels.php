<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
echo __DIR__ . '/../'. "<br>";

if (!function_exists('create_bdd')) {
    function create_bdd(){
        $host = $_ENV["DB_HOST"];
        echo "*".$host."*"."<br>";
        $dbname = $_ENV["DB_NAME"];
        echo "*".$dbname."*"."<br>";
        $user = $_ENV["DB_USER"];
        echo "*".$user."*"."<br>";
        $password = $_ENV["DB_PASSWORD"];
        echo "*".$password."*"."<br>";
        $pdo = new PDO('mysql:host='.$host.'; dbname='. $dbname, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $pdo;
    }
}

?>