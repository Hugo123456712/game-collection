<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement</title>
    <link rel="stylesheet" href="/assets/classementViewStyle.css">
</head>
<body>
    <?php include("headerView.php"); ?>
    
    <main>
        <div class="container mt-5">
            <h1>Classement des 20 meilleurs joueurs</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Nom du jeu</th>
                        <th>Heures jouées</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($topPlayers as $player): ?>
                        <tr>
                            <td><?= htmlspecialchars($player['prenom']) ?></td>
                            <td><?= htmlspecialchars($player['nom']) ?></td>
                            <td><?= htmlspecialchars($player['nomJV']) ?></td>
                            <td><?= htmlspecialchars($player['totalHeures']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <?php include("footerView.php"); ?>
</body>
</html>