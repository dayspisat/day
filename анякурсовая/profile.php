<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header("Location: avtoriz.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Профиль</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200&display=swap');

    * {
      font-weight: 900;
      /* Жирный шрифт */
      font-family: "Montserrat Alternates", sans-serif;
      /* Шрифт */
    }

    body {
      background-image: url(img/profile.png);
      background-position: center;
      background-size: cover;
      /* font-weight: 900; Жирный шрифт */
      font-family: "Montserrat Alternates", sans-serif;
      /* Шрифт */
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #fff;
      border-radius: 40px;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      width: 770px;
      margin: 20px;
    }

    h2 {
      text-align: center;
      font-size: xx-large;
    }

    input {
      font-size: large;
      width: 95%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      height: 70px;
      border-radius: 40px;
    }

    select {
      font-size: large;
      width: 95%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      height: 90px;
      border-radius: 40px;
    }

    button {
      font-size: x-large;
      background-color: #e0fee5;
      border: none;
      padding: 12px 25px;
      border-radius: 40px;
      margin-top: 40px;
      margin-bottom: 15px;
      cursor: pointer;
      width: 425px;
      height: 75px;
    }

    button:hover {
      background-color: #72ac7c;
    }

    a {
      text-decoration: none;
      color: #000000;
    }

    /* Медиа-запросы для адаптивности */
    @media (max-width: 768px) {
      .container {
        width: 90%;
        padding: 20px;
      }

      h2 {
        font-size: large;
      }

      input,
      select {
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

      input,
      select {
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
                $today=getdate();
                $day = sprintf('%04d-%02d-%02dT%02d:%02d', 
                $today['year'],
                $today['mon'], 
                $today['mday'], 
                $today['hours'], 
                $today['minutes']
                );
                echo<<<HERE
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