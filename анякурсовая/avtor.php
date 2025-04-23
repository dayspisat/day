<?php
session_start();
$host = 'MySQL-8.0';
$db = 'db_curs';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass, $db);
// Проверка подключения к базе данных
if ($mysqli->connect_error) {
    die('Ошибка подключения: ' . $mysqli->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = "anyakreker007@gmail.com";
        // Проверка на пустое значение
        if (!empty($email) && !empty($password)) {
            // Подготовленный запрос для предотвращения SQL-инъекций
            $sql = "SELECT * FROM `user` WHERE `email` = (?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result) {
                die("Query failed: " . $mysqli->error);
            }
            // Проверка на совпадение данных
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