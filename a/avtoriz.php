<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
   </head>
<body>
    <div class="container">
        <h2>Авторизация</h2>
        <form action="avtor.php" method="post">
            <label for="email">E-MAIL:</label>
            <input type="email" id="email" name="email" placeholder="Введите ваш email" pattern="^\S+@\S+\.\S+$" required>
            <label for="password">ПАРОЛЬ:</label>
            <input type="password" id="password" name="password" placeholder="Введите пароль" minlength="8" maxlength="255" pattern="[A-Za-z0-9]+" required>
            <button type="submit">ВОЙТИ</button>
        </form>
        <a href="index.php"><button>ВЕРНУТЬСЯ НА ГЛАВНУЮ</button></a>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'user_does_not_exist') {
            echo '<div class="error-message">' . 'Ошибка: ' . 'Пользователя с таким email не существует' . '</div>';
        }
        if (isset($_GET['error']) && $_GET['error'] == 'password_is_incorrect') {
            echo '<div class="error-message">' . 'Ошибка: ' . 'Неверный пароль' . '</div>';
        }
        ?>
</body>

</html>