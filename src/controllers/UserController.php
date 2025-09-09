<?php

class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register($data) {
        // Validate and register a new user
        if ($this->validateRegistration($data)) {
            return $this->userModel->createUser($data);
        }
        return false;
    }

    public function login($email, $password) {
        // Authenticate user
        $user = $this->userModel->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function logout() {
        // Log out the user
        session_start();
        session_destroy();
        header("Location: /login.php");
        exit();
    }

    public function updateProfile($userId, $data) {
        // Update user profile information
        return $this->userModel->updateUser($userId, $data);
    }

    public function changePassword($userId, $oldPassword, $newPassword) {
        // Change user password
        $user = $this->userModel->getUserById($userId);
        if ($user && password_verify($oldPassword, $user['password'])) {
            return $this->userModel->updatePassword($userId, password_hash($newPassword, PASSWORD_DEFAULT));
        }
        return false;
    }

    private function validateRegistration($data) {
        // Validate registration data (e.g., check for existing email, valid password)
        return true; // Implement actual validation logic
    }
}