<?php

class Account {
    private $conn;
    private $table_name = "accounts";

    public $id;
    public $user_id;
    public $balance;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (user_id, balance) VALUES (:user_id, :balance)";
        $stmt = $this->conn->prepare($query);

        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->balance = htmlspecialchars(strip_tags($this->balance));

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':balance', $this->balance);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET balance = :balance WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);

        $this->balance = htmlspecialchars(strip_tags($this->balance));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        $stmt->bindParam(':balance', $this->balance);
        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>