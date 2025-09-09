<?php

class Option {
    private $db;
    private $table = 'options';

    public function __construct($database) {
        $this->db = $database;
    }

    public function createOption($data) {
        $query = "INSERT INTO " . $this->table . " (name, description, game_id) VALUES (:name, :description, :game_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':game_id', $data['game_id']);
        return $stmt->execute();
    }

    public function getOptionsByGame($game_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE game_id = :game_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':game_id', $game_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateOption($id, $data) {
        $query = "UPDATE " . $this->table . " SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteOption($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}