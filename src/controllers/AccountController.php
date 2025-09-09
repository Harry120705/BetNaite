<?php

class AccountController {
    private $accountModel;

    public function __construct($accountModel) {
        $this->accountModel = $accountModel;
    }

    public function deposit($userId, $amount) {
        if ($amount <= 0) {
            return "Invalid deposit amount.";
        }
        return $this->accountModel->deposit($userId, $amount);
    }

    public function withdraw($userId, $amount) {
        if ($amount <= 0) {
            return "Invalid withdrawal amount.";
        }
        return $this->accountModel->withdraw($userId, $amount);
    }

    public function getAccountDetails($userId) {
        return $this->accountModel->getAccountDetails($userId);
    }
}