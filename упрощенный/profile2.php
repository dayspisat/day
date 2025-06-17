<?php
require_once 'session.php';
require_once 'style.php';
require_once 'db.php';
?>

<body>
    <div class="container">
        <ul>
            <?php
            $users_id = $_SESSION['users_id'];
            $result = $db->query("SELECT `orders_id`, `orders`, `status`, `date`,`adres`, `reject_reason` 
                FROM `application` 
                JOIN `orders` USING (`orders_id`)
                JOIN `status` USING (`status_id`) 
                WHERE `users_id`='{$users_id}'
                ORDER BY `date` DESC");
            if (!$result) {
                die("Ошибка выполнения запроса: " . $db->error);
            }
            echo "<li>";
            while ($row = $result->fetch_assoc()) {
                echo "<span>{$row['adres']} </span>
                <span>{$row['date']} </span>
                <span> {$row['orders']} </span>
                <span>({$row['status']})</span>";

                if ($row['status'] == 'Отказано' && !empty($row['reject_reason'])) {
                    echo "<br><span style='color: red;'>Причина: {$row['reject_reason']}</span>";
                }
                echo "<br>";
            }
            echo "</li>"; ?>
            <a href="profile.php"><button>Назад</button></a>
        </ul>
    </div>
</body>