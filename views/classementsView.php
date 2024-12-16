<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Classement des jeux préférés</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Joueur</th>
                            <th scope="col">Jeu favori</th>
                            <th scope="col">Éditeur</th>
                            <th scope="col">Date de sortie</th>
                            <th scope="col">Temps passé (heures)</th>
                        </tr>
                    </thead>


                    <!-- a modifier -->
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php $rank = 1; ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <th scope="row"><?= $rank++ ?></th>
                                    <td><?= htmlspecialchars($row['nomJV']) ?></td>
                                    <td><?= htmlspecialchars($row['editeur']) ?></td>
                                    <td><?= htmlspecialchars($row['dateSortie']) ?></td>
                                    <td><?= htmlspecialchars($row['nbHeure']) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Aucun jeu trouvé dans la ludothèque.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    

                </table>
            </div>
        </div>
    </div>
</main>