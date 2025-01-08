<?php
$jeu = $_SESSION['jeu'];
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour le jeu</title>
    <link rel="stylesheet" href="/assets/styleHeader.css">
    <link rel="stylesheet" href="/assets/styleFooter.css">
    <link rel="stylesheet" href="/assets/styleLogin.css">
    <link rel="stylesheet" href="/assets/updateGameStyle.css">
    <link rel="stylesheet" href="/assets/homeView_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: #211F2A !important; 
        }
        .nav-link {
            color: #FFFFFF !important; 
        }
    </style>
</head>
<body>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
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
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                    <form method="post" action="deleteGame" style="display:inline;">
                        <input type="hidden" name="userId" value="<?= htmlspecialchars($user['idUser']) ?>">
                        <input type="hidden" name="gameId" value="<?= htmlspecialchars($jeu['idJV']) ?>">
                        <button type="submit" class="btn btn-danger delete">Supprimer le jeu de ma bibliothèque</button>
                    </form>
                </div>
            </div>
        </div>
        <?php echo $jeu['idJV'];
        echo "<br>";
        echo $user['idUser']; ?>
    </main>
</body>
</html>