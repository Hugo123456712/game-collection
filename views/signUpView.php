<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="/assets/signUpstyle.css">
</head>
<body>
    <?php include("headerView.php"); ?>
    
    <main>
        <div class="container">
            <h2>Inscription</h2>
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
            <a href="/login">Se connecter</a>
        </div>
    </main>
    
    <?php include("footerView.php"); ?>
</body>
</html>