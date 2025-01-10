<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter à Game Collection</title>
    <link rel="stylesheet" href="/assets/styleLogin.css">
</head>

<body>
    <header>
        <h1>Game Collection</h1>
    </header>
    
    <main>
        <div class="container">
            <div class="form-container">
                <h2>Se connecter à Game Collection</h2>
                <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials'): ?>
                    <div class="alert alert-danger">Identifiants invalides. Veuillez réessayer.</div>
                <?php endif; ?>
                <form method="POST" action="/login">
                    <div class="email-input">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="mdp">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" id="mdp" name="mdp" required>
                    </div>
                    <input type="submit" value="Se connecter">
                </form>
                <p class="redirect"><a href="/signup">S'inscrire</a></p>
            </div>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2023 Game Collection. Tous droits réservés.</p>
    </footer>
</body>
</html>