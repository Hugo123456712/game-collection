<head>
    <title>Ajouter un jeu à sa bibliothèque</title>
    <link rel="stylesheet" href="/assets/styleAjoutFormulaire.css">
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h1>Ajouter un jeu à sa bibliothèque</h1>
            <?php if (isset($message)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>
            <?php if (!empty($errors)): ?>
                <?php foreach ($errors as $error): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
            <form method="post" action="ajoutFormulaire">
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
                    <select name="Platformes" id="Platformes" class="form-control" multiple>
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