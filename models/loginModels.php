<?php
if (!function_exists('create_bdd')) {
    function create_bdd() {
        $host = 'localhost';
        $dbname = 'td_game-collection'; 
        $user = 'root';
        $password = '';
        
        try {
            $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
            return $pdo;
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}

class loginModel {
    public static function findByEmail($email) {
        $pdo = create_bdd(); 
        $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>
