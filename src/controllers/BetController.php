<?php

class BetController {
    private $betModel;

    public function __construct($betModel) {
        $this->betModel = $betModel;
    }

    public function createBet($userId, $gameId, $amount, $optionId) {
        // Logic to create a new bet
        if ($this->betModel->placeBet($userId, $gameId, $amount, $optionId)) {
            return ['status' => 'success', 'message' => 'Bet placed successfully.'];
        } else {
            return ['status' => 'error', 'message' => 'Failed to place bet.'];
        }
    }

    public function listBets($userId) {
        // Logic to list all bets for a user
        return $this->betModel->getBetsByUserId($userId);
    }

    public function cancelBet($betId) {
        // Logic to cancel a bet
        if ($this->betModel->removeBet($betId)) {
            return ['status' => 'success', 'message' => 'Bet canceled successfully.'];
        } else {
            return ['status' => 'error', 'message' => 'Failed to cancel bet.'];
        }
    }
}