<?php
require_once "models/videoGameModels.php";

$idUser = $_SESSION['idUser']; 

$model = new VideoGameModels();
$jeux = $model->getUserGames($idUser);
?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Ma Bibliothèque</h1>
                <div class="row">
                    <?php if (!empty($jeux)): ?>
                        <?php foreach($jeux as $jeu): ?>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="<?= htmlspecialchars($jeu['couverture']) ?>" class="card-img-top" alt="<?= htmlspecialchars($jeu['nomJV']) ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($jeu['nomJV']) ?></h5>
                                        <p class="card-text">Éditeur: <?= htmlspecialchars($jeu['editeur']) ?></p>
                                        <p class="card-text">Date de sortie: <?= htmlspecialchars($jeu['dateSortie']) ?></p>
                                        <p class="card-text">Temps passé: <?= htmlspecialchars($jeu['nbHeure']) ?> heures</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">Aucun jeu dans votre bibliothèque.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
