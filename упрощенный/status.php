<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application_id = $_POST['application_id'];
    $status_id = $_POST['status'];
    $reject_reason = $_POST['status'] == 3 ? ($_POST['reject_reason'] ?? '') : '';

    $stmt = $db->prepare("UPDATE `application` SET `status_id` = ?, `reject_reason` = ? WHERE `application_id` = ?");
    $stmt->bind_param("isi", $status_id, $reject_reason, $application_id);
    
    if ($stmt->execute()) {
        header("Location: admin.php");
    } else {
        die("Ошибка обновления статуса: " . $db->error);
    }
}