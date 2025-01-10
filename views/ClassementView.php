<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}

$user = $_SESSION['user'];
?>

<head>
    <title>Classement</title>
    <link rel="stylesheet" href="/assets/classementView_style.css">
</head>

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