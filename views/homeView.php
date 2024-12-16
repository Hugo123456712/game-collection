
<link rel="stylesheet" href="assets/homeView_style.css">
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <img src="/assets/pictures/background_main.png" alt="Photo d'accueil" heigth="250px">
                <h1>SALUT, <?php htmlspecialchars($_SESSION['user']['username']) ?> ! <br> PRÊT À AJOUTER DES JEUX À TA COLLECTION ?</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>MES JEUX</h2>
            </div>
        </div>
        <div class="row">
            <p>Mes jeux</p>
            <?php if (!empty($jeux)): ?>
                <?php foreach ($jeux as $jeu): ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($jeu['nomJV']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($jeu['editeur']); ?></p>
                                <p class="card-text"><?php echo htmlspecialchars($jeu['nbHeure']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun jeu dans votre collection pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
</main>