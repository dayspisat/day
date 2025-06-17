<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Регистрация</title>
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