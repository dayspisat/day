<?php
session_start();
require_once 'session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>История заявок</title>
    @media(max-width: 480px) {
    h2 {
    font-size: medium;
    }
    button {
    font-size: medium;
    height: 50px;
    }
    .right-list li {
    padding: 8px;
    }    }
    </style>
</head>

<body>
    <div class='right-container'>
        <h2>Заявки</h2>
        <ul class='right-list'>
            <?
            require_once 'db.php';

            $id_user = $_SESSION['id_user'];

            $sql = $mysqli->query("SELECT `orders`, `value`, `date` 
        FROM `application` 
        JOIN `order` USING (`id_order`)
        JOIN `status` USING (`id_status`) 
        WHERE `id_user`='{$id_user}'
        ORDER BY `date` DESC");

            while ($row = $sql->fetch_assoc()) {
                $date = $row['date'];
                $orders = $row['orders'];
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