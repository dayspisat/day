<?php 
$servername = "MySQL-8.0";
$username = "root";
$password = "";
$dbname = "db_curs";

// Подключение к базе данных
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}
session_start();
$id_application = $_POST['id_application'];
$id_status = $_POST['status'];

$sql="UPDATE `application` SET id_status='$id_status' WHERE id_application='$id_application'";
if($mysqli->query($sql)){
    header("location: admin.php");
}else{
    echo 'error: ' . $mysqli->error;
}
exit();
?>