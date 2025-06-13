<?php
session_start();
if (!isset($_SESSION['users_id'])) {
    header("Location: avtoriz.php");
    exit;
}
require_once 'db.php';

$application_id = $_POST['application_id'];
$status_id = $_POST['status'];

$stmt = $db->prepare("UPDATE application SET status_id = ? WHERE application_id = ?");
$stmt->bind_param("ii", $status, $id_application);

if ($stmt->execute()) {
    $_SESSION['success'] = "Статус успешно обновлен";
} else {
    $_SESSION['error'] = "Ошибка при обновлении статуса: " . $stmt->error;
}

header("Location: admin.php");
exit;
