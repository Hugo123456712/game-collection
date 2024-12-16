<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Ajouter un jeu a sa bibliothèque</h1>
                <?php if (isset($message)): ?>
                    <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>
                <form method="post" action="ajoutFormulaire.php">
                    <div class="form-group">
                        <label for="nomJV">Nom du jeu</label>
                        <input type="text" class="form-control" id="nomJV" name="nomJV" required>
                    </div>
                    <div class="form-group">
                        <label for="editeur">Éditeur du jeu</label>
                        <input type="text" class="form-control" id="editeur" name="editeur" required>
                    </div>
                    <div class="form-group">
                        <label for="dateSortie">Sortie du jeu</label>
                        <input type="date" class="form-control" id="dateSortie" name="dateSortie" required>
                    </div>
                    <div class="form-group">
                        <label for="Platformes">Platformes</label>
                        <select name="Platformes" id="Platformes" multiple>
                            <option value="PS4">PS4</option>
                            <option value="Xbox">Xbox</option>
                            <option value="PC">PC</option>
                            <option value="Switch">Switch</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description du jeu</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="couverture">URL de la couverture</label>
                        <input type="text" class="form-control" id="couverture" name="couverture" required>
                    </div>
                    <div class="form-group">
                        <label for="prix">URL du site</label>
                        <input type="text" class="form-control" id="site" name="site" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</main>