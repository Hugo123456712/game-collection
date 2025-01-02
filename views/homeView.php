<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
    </head>
    <body>
        <h1>Bienvenue, <?php echo htmlspecialchars($user['prenom']); ?> !</h1>
        <p>Email : <?php echo htmlspecialchars($user['email']); ?></p>
        <a href="/logout">Déconnexion</a>
    </body>
</html>