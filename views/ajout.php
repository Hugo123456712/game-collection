<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Ajouter un jeu</h1>
                <?php if (isset($message)): ?>
                    <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>
                <form method="post" action="recherche.php">
                    <div class="form-group">
                        <label for="nomJV">Nom du jeu</label>
                        <input type="text" class="form-control" id="nomJV" name="nomJV" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h2>MES JEUX</h2>
                <div class="row">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="<?= htmlspecialchars($row['couverture']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nomJV']) ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($row['nomJV']) ?></h5>
                                        <p class="card-text">Éditeur: <?= htmlspecialchars($row['editeur']) ?></p>
                                        <p class="card-text">Date de sortie: <?= htmlspecialchars($row['dateSortie']) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center">Aucun jeu trouvé dans la ludothèque.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
