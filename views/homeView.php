<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['user_name']); ?> !</h1>
    <a href="/logout">Se déconnecter</a>
</body>
</html>
