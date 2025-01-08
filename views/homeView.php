<?php

if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/assets/homeView_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <img src="/assets/pictures/background_main.png" alt="">
    <p class='salutation'>Salut <?= htmlspecialchars($user['nom']) ?> ! <br> Prêt à ajouter des jeux à ta collection ?</p>  
    <div class="container mt-5">
        <h1>Mes Jeux</h1>
        <?php if (!empty($jeux)): ?>
            <div class="row">
                <?php foreach ($jeux as $jeu): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <a href="updateGame?gameId=<?= htmlspecialchars($jeu['idJV']) ?>"></a>
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($jeu['nomJV']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($jeu['descJV']) ?></p>
                                <p class="card-text"><?= htmlspecialchars($jeu['editeur']) ?></p>
                                <p class="card-text"><?= htmlspecialchars($jeu['nbHeure']) ?> heures</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Aucun jeu trouvé dans votre bibliothèque.</p>
        <?php endif; ?>
    </div>
</body>
</html>