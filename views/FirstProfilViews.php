

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="/assets/styleProfilPage.css">
</head>
<body>
    <div class="container">
        <h1>Mon Profil</h1>
        <p class="nom"><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
        <p class="prenom"><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
        <p class="email"><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
        <a href="/profil">
            <button type="submit" class="btn btn-primary">Modifier mon profil</button>
        </a>
        <form method="post" action="/deleteAccount">
            <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
        </form>
        <form method="post" action="/logout">
            <button type="submit" class="btn btn-secondary">Se déconnecter</button>
        </form>
    </div>
</body>
</html>