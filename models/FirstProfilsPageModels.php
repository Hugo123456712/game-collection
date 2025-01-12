<?php
function deleteUserAndLibrary($userId) {
    $db = new PDO('mysql:host=localhost;dbname=game_collection', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('DELETE FROM bibliotheque WHERE userId = :userId');
    $stmt->execute(['userId' => $userId]);

    $stmt = $db->prepare('DELETE FROM users WHERE idUser = :userId');
    $stmt->execute(['userId' => $userId]);
}