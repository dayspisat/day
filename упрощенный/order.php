<?php
session_start();

if (!isset($_SESSION['users_id'])) {
    header("Location: avtoriz.php");
    exit;
}

if (!isset($_POST['orders']) || !isset($_POST['date']) || !isset($_POST['adres'])) {
    die("Не все данные переданы");
}

$adres = trim($_POST['adres']);
if (empty($adres)) {
    die("Адрес не может быть пустым");
}

$date = str_replace('T', ' ', $_POST['date']);

require_once 'db.php';

$stmt = $db->prepare("INSERT INTO `application` (`users_id`, `orders_id`, `date`, `adres`) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $_SESSION['users_id'], $_POST['orders'], $date, $adres);

if ($stmt->execute()) {
    header("Location: profile2.php");
    exit;
} else {
    echo "Ошибка создания заявки: " . $stmt->error;
}