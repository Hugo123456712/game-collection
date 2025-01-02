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
        </div>
        
        <form method="post" action="/home">
            <div class="email-input">
            <label for="email">Email</label>
            <input type="text" id="email">
            </div>
            <div class="pwd-input">
                <label for="pwd">Mot de passe</label>
                <input type="text" id="pwd">
            </div>
            <input type="submit" value="Se connecter">
        </form>
        <p class="redirect">S'inscrire</p>
    </body>
<?php include 'footer.php'; ?>
</html>
    