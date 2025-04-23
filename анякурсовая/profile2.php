<?php
session_start();

if (!isset($_SESSION['id_user'])) {
  header("Location: avtoriz.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>История заявок</title>
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
            font-family: "Montserrat Alternates Light";
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .right-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            border-radius: 40px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 770px;
            height: auto;
            /* Изменено на auto для адаптивности */
            margin: 20px;
        }

        h2 {
            text-align: center;
            font-size: xx-large;
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

        ul.right-list {
            margin-right: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            /* Изменено на 100% для адаптивности */
        }

        .right-list {
            height: auto;
            /* Изменено на auto для адаптивности */
            list-style: none;
        }

        .right-list li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .right-status {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .status {
            font-weight: bold;
        }

        /* Медиа-запросы для адаптивности */
        @media (max-width: 768px) {
            .right-conteiner {
                width: 88%;
                padding: 20px;
            }

            h2 {
                font-size: large;
            }

            button {
                font-size: large;
                width: 95%;
                height: 60px;
            }

            ul.right-list {
                width: 95%;
                /* Устанавливаем ширину на 100% */
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: medium;
            }

            button {
                font-size: medium;
                height: 50px;
            }

            .right-list li {
                padding: 8px;
                /* Уменьшаем отступы для мобильных устройств */
            }
        }
    </style>
</head>

<body>
    <div class='right-container'> 
        <h2>Заявки</h2>
         <ul class='right-list'>
    <?php
    $servername = "MySQL-8.0";
    $username = "root";
    $password = "";
    $dbname = "db_curs";

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Ошибка подключения: " . $mysqli->connect_error);
    }
    $id_user = $_SESSION['id_user'];

    $sql = $mysqli->query("SELECT `orders`, `value`, `date` 
        FROM `application` 
        JOIN `order` USING (`id_order`)
        JOIN `status` USING (`id_status`) 
        WHERE `id_user`='{$id_user}'
        ORDER BY `date` DESC");

    while ($row = $sql->fetch_assoc()) {
        $date = $row['date'];
        $orders= $row['orders'];
        $status = $row['value'];

        echo
        " 
        <li>
        <div class='right-status'>
        <span class='status'><p>Дата: $date</p></span>
        <span class='status'><p>Услуга: $orders</p></span>
        <span class='status'><p>$status</p></span>
            </div>
        </li>
        ";
    } ?>
    </ul>
    <a href="profile.php"><button>НАЗАД</button></a>
    <a href="index.php"><button>ВЕРНУТЬСЯ НА ГЛАВНУЮ</button></a>
    </div>
</body>

</html>