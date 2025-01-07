<?php
session_start();
$jeu = $_SESSION['jeu'];
$user = $_SESSION['user'];
?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Mettre à jour le jeu</h1>
                <form method="post" action="/saveGameDetails">
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
            </div>
        </div>
    </div>
    <?php echo $jeu['idJV'];
    echo "<br>";
            echo $user['idUser']; ?>

</main>
