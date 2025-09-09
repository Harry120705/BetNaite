<?php
session_start();
require_once '../src/config/database.php';
require_once '../src/controllers/UserController.php';

$userController = new UserController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    $userId = $_SESSION['user_id'];

    if ($newPassword !== $confirmPassword) {
        $error = "As senhas não coincidem.";
    } else {
        $result = $userController->changePassword($userId, $currentPassword, $newPassword);
        if ($result) {
            $success = "Senha alterada com sucesso.";
        } else {
            $error = "Falha ao alterar a senha. Verifique sua senha atual.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Alterar Senha</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form action="password_change.php" method="POST">
            <div class="form-group">
                <label for="current_password">Senha Atual:</label>
                <input type="password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Nova Senha:</label>
                <input type="password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar Nova Senha:</label>
                <input type="password" name="confirm_password" required>
            </div>
            <button type="submit">Alterar Senha</button>
        </form>
    </div>
</body>
</html>