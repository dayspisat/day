<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Регистрация</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200&display=swap');

    * {
      font-weight: 900;
      /* Жирный шрифт */
      font-family: "Montserrat Alternates", sans-serif;
      /* Шрифт */
    }

    body {
      background-image: url(img/registration.png);
      font-family: "Montserrat Alternates Light";
      background-position: center;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
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

    h1 {
      margin-bottom: 10px;
      font-size: xx-large;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      text-align: left;
      margin-left: 50px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      font-size: large;
      width: 95%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      height: 50px;
      border-radius: 40px;
    }

    button {
      font-size: large;
      background-color: #ffac63;
      color: #000000;
      border: none;
      padding: 12px 25px;
      border-radius: 40px;
      margin-top: 10px;
      margin-bottom: 10px;
      cursor: pointer;
      width: 400px;
      height: 70px;
    }

    button:hover {
      background-color: #dd8639;
    }

    a {
      text-decoration: none;
      color: #000000;
    }

    /* Медиа-запросы для адаптивности */
    @media (max-width: 768px) {
      .container {
        width: 88%;
        padding: 20px;
      }

      h1 {
        font-size: large;
      }

      label {
        margin-left: 20px;
      }

      input[type="text"],
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
      h1 {
        font-size: medium;
      }

      label {
        margin-left: 10px;
      }

      input[type="text"],
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
    <h1>РЕГИСТРАЦИЯ</h1>
    <form action="registr.php" method="post">
      <label for="name">ФИО:</label>
      <input type="text" id="name" name="name" placeholder="Введите ваше имя" />

      <label for="phone">НОМЕР ТЕЛЕФОНА:</label>
      <input
        type="text"
        id="phone"
        name="phone"
        placeholder="Введите номер телефона" pattern="^\+7 \d{3} \d{3}-\d{2}-\d{2}$"/>

      <label for="email">E-MAIL:</label>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="Введите ваш email"
        required pattern="^\S+@\S+\.\S+$"/>

      <label for="company">НАЗВАНИЕ КОМПАНИИ:</label>
      <input
        type="text"
        id="company"
        name="company"
        placeholder="Введите название компании" />

      <label for="password">ПАРОЛЬ:</label>
      <input
        type="password"
        id="password"
        name="password"
        placeholder="Введите пароль"
        required minlength="8" maxlength="255" pattern="[A-Za-z0-9]+"/>

      <button type="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
     
    </form> 
    <a href="index.php"><button>ВЕРНУТЬСЯ НА ГЛАВНУЮ</button></a>
  </div>
</body>

</html>