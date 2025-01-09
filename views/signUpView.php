<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="utf-8" lang="fr">
        <link rel="stylesheet" href="/assets/signUpstyle.css">
    </head>
    <body>
        <div class="container">
            <h2>S'inscrire</h2>
            <form method="post" action="/signup">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" required>
                </div>
                <div class="form-group">
                    <label for="mdp2">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="mdp2" name="mdp2" required>
                </div>
                <?php if (isset($error)) { echo "<p class='text-danger'>$error</p>"; } ?>
                <button type="submit" name="SignUp" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
        <div class="container">
            <a href="/login">Déjà inscrit ? Connectez-vous</a>
        </div>
    </body>
</html>
