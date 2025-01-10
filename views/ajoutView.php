<head>
    <link rel="stylesheet" href="assets/ajoutJeuApplistyle.css">
    <link rel="stylesheet" href="assets/gamecard.css">
</head>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>Ajouter un jeu à sa bibliotheque</h1>
            <?php if (isset($message)): ?>
                <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="nomJV" name="nomJV" required>
                </div>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <h2>Résultats de ma recherche</h2>
            <div class="row">
                <?php if (!empty($jeux)): ?>
                    <?php foreach ($jeux as $jeu): ?>
                        <div class="col-md-4">
                            <div class="card mb-4" style="background-image: url('<?= htmlspecialchars($jeu['couverture']) ?>');">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($jeu['nomJV']) ?></h5>
                                    <p class="card-text">Éditeur: <?= htmlspecialchars($jeu['editeur']) ?></p>
                                    <p class="card-text">Date de sortie: <?= htmlspecialchars($jeu['dateSortie']) ?></p>
                                    <form method="post" action="/updateGame">
                                        <input type="hidden" name="idJV" value="<?= htmlspecialchars($jeu['idJV']) ?>">
                                        <button type="submit" class="btn btn-success">Ajouter à ma bibliothèque</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Aucun jeu trouvé dans la ludothèque.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>