<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"> <!-- Устанавливаем кодировку документа -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Адаптивность для мобильных устройств -->
  <title>Админ</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200&display=swap');

    * {
      font-weight: 900;
      /* Жирный шрифт */
      font-family: "Montserrat Alternates", sans-serif;
      /* Шрифт */
    }

    body {
      background-image: url(img/admin.png);
      background-position: center;
      background-size: cover;
      font-family: "Montserrat Alternates Light";
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    form{
      margin: 10px;
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
    }
    .container-left{
      margin: 10px;
    }
    .container {
      display: flex;
      justify-content: space-between;
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
      margin: 10px;
      border: 1px solid #ccc;
      height: 50px;
      border-radius: 40px;
    }

    button {
      font-size: large;
      background-color: #CCCDCD;
      border: none;
      padding: 12px 25px;
      border-radius: 40px;
      margin: 0px;
      cursor: pointer;
      width: auto;
      height: 50px;
    }

    button:hover {
      background-color: #8C8C8C;
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
  <div class="admin-container">
    <h2>Заявки</h2>
    <ul class="admin-list">
      <?php
      // Подключение к базе данных
      $servername = "MySQL-8.0";
      $username = "root";
      $password = "";
      $dbname = "db_curs";

      $mysqli = new mysqli($servername, $username, $password, $dbname);

      // Проверка подключения
      if ($mysqli->connect_error) {
        die("Ошибка подключения: " . $mysqli->connect_error);
      }

      // Запрос данных о заявках пользователей
      $sql = "SELECT * FROM `application` INNER JOIN `user` USING (`id_user`) INNER JOIN `order` USING (`id_order`) INNER JOIN `status` USING (`id_status`) ORDER BY `date` DESC";
      $result = $mysqli->query($sql);
      // Проверка наличия результатов
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "
                                <div class='container'>
                                <div class='container-left'> 
                                    <span>" . htmlspecialchars($row['name']) . "<br>" . "</span>
                                    <span>" . htmlspecialchars($row['company']) . "<br></span>
                                    <span>" . htmlspecialchars($row['date']) . "<br></span>
                                    <span>" . htmlspecialchars($row['phone']) . "<br></span>
                                    <span>" . htmlspecialchars($row['email']) . "<br></span>
                                    <span>" . htmlspecialchars($row['orders']) . "<br></span>
                                    <span>" . htmlspecialchars($row['value']) . "</span>
                                    </div>
                                    <div class='container-right'>
                                    <form action='status.php' method='post'>
                                    <input type='hidden' name='id_application' value={$row['id_application']}></input>
                                    <select id='status' name='status'>
                                    <option value='3'>ОТКАЗАНО</option>
                                    <option value='2'>ВЫПОЛНЕНО</option>
                                    </select><button type='submit'>ИЗМЕНИТЬ</button></form>
                                    </div>
                                </div>
                              ";
        }
      } else {
        echo "<li>Нет заявок для отображения</li>";
      }

      // Закрытие соединения
      $mysqli->close();
      ?>
    </ul>
  </div>
</body>

</html>