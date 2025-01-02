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
        <link rel="stylesheet" href="/assets/css/homeView_style.css">
    </head>
    <body>
        <div class="img_principal">
            <img src="/assets/pictures/background_main.png" alt="Illustration zelda BOTW">
            <div class="text-overlay">
                <p>Salut, <?php echo htmlspecialchars($user['email']); ?> ! <br> 
                Prêt à ajouter des jeux à ta collection ?</p>
            </div>
        </div>
       
        <div class="principal">
            <p>Mes Jeux</p>
        </div>
        <?php foreach($jeux as $jeu) 
        {
            echo '<div class="jeu">';
            echo '<img src="' . htmlspecialchars($jeu['couverture']) . '" alt="' . htmlspecialchars($jeu['nomJV']) . '">';
            echo '<p>' . htmlspecialchars($jeu['nomJV']) . '</p>';
            echo '<p>Éditeur: ' . htmlspecialchars($jeu['editeur']) . '</p>';
            echo '<p>' . htmlspecialchars($jeu['nbHeure']) . ' h</p>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </body>
</html>