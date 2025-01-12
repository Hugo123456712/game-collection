<head>
    <title>Se connecter à Game Collection</title>
    <link rel="stylesheet" href="/assets/styleLogin.css">
</head>

<div class="container">
    <div class="form-container">
        <h2>Se connecter à Game Collection</h2>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials'): ?>
            <div class="alert alert-danger">Identifiants invalides. Veuillez réessayer.</div>
        <?php endif; ?>
        <form method="POST" action="/login">
            <div class="email-input">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="mdp">
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <input type="submit" value="SE CONNECTER">
        </form>
        <p class="redirect"><a href="/signup">S'inscrire</a></p>
    </div>
</div>