<?php 
public function addGameToLibrary($userId, $gameId) {
    $query = $this->db->prepare("SELECT * FROM user_games WHERE user_id = :userId AND game_id = :gameId");
    $query->execute(['userId' => $userId, 'gameId' => $gameId]);
    $existingGame = $query->fetch();

    if ($existingGame) {
        echo "Le jeu est déjà dans votre bibliothèque.";
    } else {
        $query = $this->db->prepare("INSERT INTO user_games (user_id, game_id) VALUES (:userId, :gameId)");
        $query->execute(['userId' => $userId, 'gameId' => $gameId]);
        echo "Le jeu a été ajouté à votre bibliothèque.";
    }
}

public function deleteGameFromLibrary($userId, $gameId) {
    $query = $this->db->prepare("DELETE FROM user_games WHERE user_id = :userId AND game_id = :gameId");
    $query->execute(['userId' => $userId, 'gameId' => $gameId]);
    echo "Le jeu a été supprimé de votre bibliothèque.";
}
?>