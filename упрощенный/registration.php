<?php
session_start();
if (isset($_GET['error'])) {
    $error = $_GET['error'] == 'email' ? 'Пользователь с таким email уже зарегистрирован' : 'Ошибка регистрации';
}
require_once 'style.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
    <div class="container">
    <h2>Регистрация</h2>
    <?php if (!empty($error)): ?>
        <div><?= $error ?></div>
    <?php endif; ?>
    <form action="registr.php" method="post">
        <input type="text" name="name" placeholder="ФИО" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Пароль" required minlength="6">
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
</body>
</html>