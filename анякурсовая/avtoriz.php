<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200&display=swap');

        * {
                
            /* Жирный шрифт */
            font-family: "Montserrat Alternates", sans-serif;
            /* Шрифт */
        }

        body {
            background-image: url(img/avtoriz.png);
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Montserrat Alternates Light';
        }

        .container {
            width: 770px;
            height: auto;
            /* Изменено на auto для адаптивности */
            background-color: #fff;
            border-radius: 40px;
            padding: 30px 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: xx-large;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
            margin-left: 50px;
        }

        input[type="email"],
        input[type="password"] {
            font-size: large;
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            height: 70px;
            border-radius: 40px;
        }

        button {
            font-size: x-large;
            background-color: #D8DFFF;
            color: #000000;
            border: none;
            padding: 12px 25px;
            border-radius: 40px;
            margin-bottom: 15px;
            margin-top: 15px;
            cursor: pointer;
            width: 455px;
            height: 85px;
        }

        button:hover {
            background-color: #8a95ca;
        }

        a {
            text-decoration: none;
            color: #000000;
        }

        /* Стили для сообщения об ошибке */
        .error-message {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            text-align: center;
        }

        /* Медиа-запросы для адаптивности */
        @media (max-width: 768px) {
            .container {
                width: 88%;
                padding: 20px;
            }

            h2 {
                font-size: large;
            }

            label {
                margin-left: 20px;
            }

            input[type="email"],
            input[type="password"] {
                height: 50px;
            }

            button {
                font-size: large;
                width: 100%;
                height: 60px;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: medium;
            }

            label {
                margin-left: 10px;
            }

            input[type="email"],
            input[type="password"] {
                height: 40px;
            }

            button {
                font-size: medium;
                height: 50px;
            }
        }
    </style>
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