<?php 
session_start();
if (!isset($_SESSION['users_id'])) {
    header("Location: avtoriz.php");
    exit;
}
?>