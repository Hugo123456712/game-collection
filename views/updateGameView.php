<?php
$jeu = $_SESSION['jeu'];
$user = $_SESSION['user'];
?>

<head>
    <link rel="stylesheet" href="/assets/updateGameStyle.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 form-section">
                <h1>Mettre à jour le jeu</h1>
                <form method="post" action="saveGameDetails">
                    <div class="form-group">
                        <label for="nomJV">Nom du jeu</label>
                        <input type="text" class="form-control" id="nomJV" name="nomJV" value="<?= htmlspecialchars($jeu['nomJV']) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" readonly><?= htmlspecialchars($jeu['descJV']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="timeSpent">Temps passé (heures)</label>
                        <input type="number" class="form-control" id="timeSpent" name="timeSpent" required>
                    </div>
                    <input type="hidden" name="idJV" value="<?= htmlspecialchars($jeu['idJV']) ?>">
                    <input type="hidden" name="idUser" value="<?= htmlspecialchars($user['idUser']) ?>">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
                <form method="post" action="deleteGame" style="display:inline;">
                    <input type="hidden" name="idUser" value="<?= htmlspecialchars($user['idUser']) ?>">
                    <input type="hidden" name="idJV" value="<?= htmlspecialchars($jeu['idJV']) ?>">
                    <button type="submit" class="btn btn-danger delete">Supprimer</button>
                </form>
            </div>
            <div class="col-md-6 image-section">
                <img src="<?= $jeu['couverture'] ?>" alt="<?= htmlspecialchars($jeu['nomJV']) ?>" class="game-cover">
            </div>
        </div>
    </div>
</body>