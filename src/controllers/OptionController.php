<?php

class OptionController {
    private $optionModel;

    public function __construct($optionModel) {
        $this->optionModel = $optionModel;
    }

    public function createOption($data) {
        // Logic to create a new game option
        return $this->optionModel->create($data);
    }

    public function updateOption($id, $data) {
        // Logic to update an existing game option
        return $this->optionModel->update($id, $data);
    }

    public function deleteOption($id) {
        // Logic to delete a game option
        return $this->optionModel->delete($id);
    }

    public function listOptions() {
        // Logic to list all game options
        return $this->optionModel->getAll();
    }

    public function findOption($id) {
        // Logic to find a specific game option by ID
        return $this->optionModel->find($id);
    }
}