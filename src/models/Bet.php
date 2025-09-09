<?php

class Bet {
    private $id;
    private $userId;
    private $gameId;
    private $amount;
    private $createdAt;

    public function __construct($userId, $gameId, $amount) {
        $this->userId = $userId;
        $this->gameId = $gameId;
        $this->amount = $amount;
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getGameId() {
        return $this->gameId;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function save($db) {
        $stmt = $db->prepare("INSERT INTO bets (user_id, game_id, amount, created_at) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiis", $this->userId, $this->gameId, $this->amount, $this->createdAt);
        return $stmt->execute();
    }

    public static function getAllBets($db) {
        $result = $db->query("SELECT * FROM bets");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function deleteBet($db, $id) {
        $stmt = $db->prepare("DELETE FROM bets WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>