<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>SALUT, <?php htmlspecialchars($_SESSION['user']['username']) ?> ! <br> PRÊT À AJOUTER DES JEUX À TA COLLECTION ?</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>MES JEUX</h2>
            </div>
        </div>
        <?php foreach($jeux as $jeu) ?>
        
        <?php endforeach; ?>
    </div>
</main>