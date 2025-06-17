<?php
session_start();
if (isset($_GET['error'])) {
    $error = $_GET['error'] == 'user' ? 'Пользователь не найден' : 
            ($_GET['error'] == 'password' ? 'Неверный пароль' : 'Ошибка авторизации');
}
require_once 'style.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
</head>
<body>
    <div class="container">
    <h2>Вход в систему</h2>
    <?php if (!empty($error)): ?>
        <div><?= $error ?></div>
    <?php endif; ?>
    
    <form action="avtor.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form>
    <a href="index.php"><button>На главную</button></a>
</div>
</body>
</html>