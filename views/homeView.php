
<?php
session_start();
var_dump($_SESSION); 
echo session_id();  
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
