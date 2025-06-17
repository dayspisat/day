<?php 
session_start();
require_once 'db.php';
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