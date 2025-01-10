<?php

if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}

$user = $_SESSION['user'];
?>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="/assets/homeView_style.css">
    <link rel="stylesheet" href="/assets/gamecard.css">
</head>

<body>
    <div class="background-section">
        <img src="/assets/pictures/background_main.png" alt="Background Image">
        <div class="overlay"></div>
        <hi class='salutation'>Salut <?= htmlspecialchars($user['nom']) ?> ! <br> Prêt à ajouter des jeux à ta collection ?</h1>
    </div>
    <section class="container">
        <h1>Mes Jeux</h1>
        <?php if (!empty($jeux)): ?>
            <div class="row">
                <?php foreach ($jeux as $jeu): ?>
                    <div class="col-md-4">
                        <div class="card mb-4" style="background-image: url('<?= htmlspecialchars($jeu['couverture']) ?>');">
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
    </section>
</body>