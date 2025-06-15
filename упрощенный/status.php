<?php
session_start();
if (!isset($_SESSION['users_id'])) {
    header("Location: avtoriz.php");
    exit;
}
require_once 'db.php';

$application_id = $_POST['application_id'];
$status_id = $_POST['status'];

$stmt ="UPDATE application SET status_id = $status_id WHERE application_id = $application_id";
if($db->query($stmt)){
    header("location: admin.php");
}else{
    echo 'error: ' . $db->error;
}
exit();
?>
