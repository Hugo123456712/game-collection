<link rel="stylesheet" href="/assets/profilViewStyle.css">

<h1>Mon profil</h1>
<div class="formulaire">
    <?php if (isset($user)): ?>
    <form method="post" action="/profil" onsubmit="return validatePasswords()">
        <input type="hidden" name="idUser" value="<?= isset($user['idUser']) ? htmlspecialchars($user['idUser']) : '' ?>">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= isset($user['nom']) ? htmlspecialchars($user['nom']) : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= isset($user['prenom']) ? htmlspecialchars($user['prenom']) : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="pwd">Mot de passe</label>
            <input type="password" class="form-control" id="pwd" name="pwd" value="<?= isset($user['mdp']) ? htmlspecialchars($user['mdp']) : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="pwd_confirm">Confirmation mot de passe</label>
            <input type="password" class="form-control" id="pwd_confirm" name="pwd_confirm" value="<?= isset($user['mdp']) ? htmlspecialchars($user['mdp']) : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <button type="button" class="btn btn-danger">Supprimer mon compte</button>
        
    </form>
    <form method="post" action="/logout" >
        <button type="submit" class="btn btn-secondary">Se Déconnecter</button>
        </form>
    <?php else: ?>
    <p>Erreur : Les informations de l'utilisateur n'ont pas pu être récupérées.</p>
    <?php endif; ?>
</div>

<script>
function validatePasswords() {
    var pwd = document.getElementById('pwd').value;
    var pwdConfirm = document.getElementById('pwd_confirm').value;
    if (pwd !== pwdConfirm) {
        alert('Les mots de passe ne correspondent pas.');
        return false;
    }
    return true;
}
</script>