<?php
session_start();
require_once 'session.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Профиль</title>
</head>

<body>
  <div class="container">
    <form method="post" action="order.php">
      <div class="left-side">
        <h2>ПРОФИЛЬ</h2>
        <h2><?php echo $_SESSION['email'] ?></h2>
        <div class="right">
          <h2>ВЫБЕРИТЕ УСЛУГУ:</h2>
          <select name="orders">
            <option value="1">Установка освещения</option>
            <option value="2">Установка пусковой аппаратуры</option>
            <option value="3">Установка щитков</option>
          </select>
          <h2>Выберите дату:</h2>
          <?php
          $today = getdate();
          $day = sprintf(
            '%04d-%02d-%02dT%02d:%02d',
            $today['year'],
            $today['mon'],
            $today['mday'],
            $today['hours'],
            $today['minutes']
          );
          echo <<<HERE
                <input type="datetime-local" min='$day' max="2025-12-31T23:59" name="date">
                HERE;
          ?>
        </div>

      </div>
      <button type="submit">ОТПРАВИТЬ</button>
    </form>
    <a href="profile2.php"><button> ЗАЯВКИ</button></a>
    <a href="index.php"><button>ВЕРНУТЬСЯ НА ГЛАВНУЮ</button></a>
  </div>
</body>

</html>