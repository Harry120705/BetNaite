<?php

class GameController {
    private $gameModel;

    public function __construct($gameModel) {
        $this->gameModel = $gameModel;
    }

    public function createGame($data) {
        // Logic to create a new game
        return $this->gameModel->create($data);
    }

    public function updateGame($id, $data) {
        // Logic to update an existing game
        return $this->gameModel->update($id, $data);
    }

    public function listGames() {
        // Logic to list all games
        return $this->gameModel->getAll();
    }

    public function deleteGame($id) {
        // Logic to delete a game
        return $this->gameModel->delete($id);
    }

    public function searchGame($criteria) {
        // Logic to search for games based on criteria
        return $this->gameModel->search($criteria);
    }
}