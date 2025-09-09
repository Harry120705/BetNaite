<?php
session_start();
require_once '../src/controllers/UserController.php';

$userController = new UserController();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user = $userController->getUserById($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($userController->updateUser($user['id'], $name, $email)) {
        $message = "Dados atualizados com sucesso!";
        $user = $userController->getUserById($user['id']); // Refresh user data
    } else {
        $message = "Erro ao atualizar os dados.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include '../src/views/header.php'; ?>
    
    <div class="container">
        <h2>Editar Informações do Usuário</h2>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        
        <form action="user_edit.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            
            <button type="submit">Atualizar</button>
        </form>
    </div>

    <?php include '../src/views/footer.php'; ?>
</body>
</html>