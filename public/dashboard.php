<?php
session_start();
require_once '../src/controllers/UserController.php';

$userController = new UserController();
$user = $userController->getUserById($_SESSION['user_id']);

if (!$user) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include '../src/views/header.php'; ?>
    
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <p>Your account details:</p>
        <ul>
            <li>Email: <?php echo htmlspecialchars($user['email']); ?></li>
            <li>Account Balance: $<?php echo htmlspecialchars($user['balance']); ?></li>
        </ul>
        
        <h2>Options</h2>
        <ul>
            <li><a href="user_edit.php">Edit Profile</a></li>
            <li><a href="password_change.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <?php include '../src/views/footer.php'; ?>
</body>
</html>