<?php
session_start();

// Autoload classes
spl_autoload_register(function ($class_name) {
    include '../src/controllers/' . $class_name . '.php';
});

// Routing logic
$page = 'dashboard'; // Default page

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

// Check user authentication
if (!isset($_SESSION['user_id']) && $page !== 'login' && $page !== 'register') {
    header('Location: login.php');
    exit();
}

// Include the requested page
switch ($page) {
    case 'login':
        include 'login.php';
        break;
    case 'register':
        include 'register.php';
        break;
    case 'logout':
        include 'logout.php';
        break;
    case 'dashboard':
        include 'dashboard.php';
        break;
    case 'user_edit':
        include 'user_edit.php';
        break;
    case 'password_change':
        include 'password_change.php';
        break;
    default:
        include 'dashboard.php';
        break;
}
?>