<?php
session_start();
require_once 'db.php';
mysqli_report(MYSQLI_REPORT_OFF);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $company = trim($_POST["company"]);
     if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($company)) {
        echo "Все поля обязательны для заполнения.";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неверный формат email.";
        exit;
    }
       $sql = "SELECT `id_user` FROM `user` WHERE email = ?";
     $stmt = $mysqli->prepare($sql);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
      if ($result->num_rows > 0) {
         header("Location: avtoriz.php?error=email_is_used");
         exit;
     }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `user`(`name`, `phone`, `email`, `password`, `company`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $name, $phone, $email, $hashedPassword, $company);
    if ($stmt->execute()) {
         $userId = $stmt->insert_id;
        $_SESSION['id_user'] = $userId; 
        header("Location: avtoriz.php?id=$userId");
        $_SESSION['email'] = $email;
        exit;
    } else {
        echo "Ошибка регистрации: " . $stmt->error;
    }
    $stmt->close();
}
$mysqli->close();
?>