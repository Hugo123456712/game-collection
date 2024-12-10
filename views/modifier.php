<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Modifier un jeu</h1>
                <?php if (isset($message)): ?>
                    <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>
                <?php if (isset($jeu)): ?>
                    <form method="post" action="modifier.php">
                        <input type="hidden" name="idJV" value="<?= htmlspecialchars($jeu['idJV']) ?>">
                        <div class="form-group">
                            <label for="nomJV">Nom du jeu</label>
                            <input type="text" class="form-control" id="nomJV" name="nomJV" value="<?= htmlspecialchars($jeu['nomJV']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="editeur">Éditeur</label>
                            <input type="text" class="form-control" id="editeur" name="editeur" value="<?= htmlspecialchars($jeu['editeur']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="dateSortie">Date de sortie</label>
                            <input type="date" class="form-control" id="dateSortie" name="dateSortie" value="<?= htmlspecialchars($jeu['dateSortie']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="couverture">URL de la couverture</label>
                            <input type="text" class="form-control" id="couverture" name="couverture" value="<?= htmlspecialchars($jeu['couverture']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tempsDeJeu">Temps passé sur le jeu</label>
                            <input type="number" class="form-control" id="tempsDeJeu" name="tempsDeJeu" value="<?= htmlspecialchars($jeu['tempsDeJeu']) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                <?php else: ?>
                    <p class="text-center">Jeu non trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>