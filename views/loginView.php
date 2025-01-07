<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8" lang="fr">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styleLogin.css">
</head>

<body>
    <div class="container">
        <h2>Se connecter à Game Collection</h2>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials'): ?>
            <div class="alert alert-danger">Identifiants invalides. Veuillez réessayer.</div>
        <?php endif; ?>
    </div>

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

    <script>
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            echo "console.log('Contenu de la session :', " . json_encode($_SESSION) . ");";
        ?>
    </script>
</body>

</html>