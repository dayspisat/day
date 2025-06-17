<?php
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['orders']) && isset($_POST['date'])) {
        $orders = $_POST['orders'];
        $date = $_POST['date'];
        $date = str_replace('T', ' ', $date) ;
        if (!isset($_SESSION['id_user'])) {
            echo "Ошибка: пользователь не авторизован.";
            exit;
        }
        $id_user = $_SESSION['id_user'];

        if (empty($orders) || empty($date)) {
            echo "Все поля обязательны для заполнения.";
            exit;
        }
        $sql = "INSERT INTO `application`(`id_user`, `id_order`, `date`) VALUES (?,?,?)";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            echo "Ошибка подготовки: " . $mysqli->error;
            exit;
        }
        $stmt->bind_param("iss", $id_user, $orders, $date);
        if ($stmt->execute()) {
            $ordersId = $stmt->insert_id;
            header("Location: profile2.php?id=$ordersId");
            exit;
        } else {
            echo "Ошибка регистрации: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Ошибка: данные не переданы.";
        exit;
    }
}
$mysqli->close();
?>