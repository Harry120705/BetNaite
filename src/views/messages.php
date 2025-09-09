<?php
session_start();

function displayMessage($message, $type = 'info') {
    echo "<div class='alert alert-$type'>$message</div>";
}

if (isset($_SESSION['success_message'])) {
    displayMessage($_SESSION['success_message'], 'success');
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
    displayMessage($_SESSION['error_message'], 'danger');
    unset($_SESSION['error_message']);
}
?>