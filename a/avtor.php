<?php
session_start();
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = "admin@gmail.com";
        if (!empty($email) && !empty($password)) {
            $sql = "SELECT * FROM `user` WHERE `email` = (?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result) {
                die("Query failed: " . $mysqli->error);
            }
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['email'] = $email;
                    if ($email == $admin) {
                        header("Location: admin.php?admin=true&id={$row['id_user']}");                 
                        exit();
                    } else {
                        header("Location: profile.php?id={$row['id_user']}");
                        exit();
                    }     } else {
                    header("Location: avtoriz.php?error=password_is_incorrect");
                    exit();
                }   } else {
                header("Location: avtoriz.php?error=user_does_not_exist");
                exit();
            }  } else {
            header("Location: avtoriz.php?error=missing_data");
            exit();
        }  } }
$mysqli->close();
?>