<?php
$servername = "MySQL-8.0";
$username = "root";
$password = "";
$dbname = "db_curs";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}
session_start();
mysqli_report(MYSQLI_REPORT_OFF);
// Обработка данных формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $company = trim($_POST["company"]);
    // Серверная валидация
    if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($company)) {
        echo "Все поля обязательны для заполнения.";
        exit;
    }
    // Проверка формата email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неверный формат email.";
        exit;
    }
     // Проверка уникальности email
     $sql = "SELECT `id_user` FROM `user` WHERE email = ?";
     $stmt = $mysqli->prepare($sql);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
 
     if ($result->num_rows > 0) {
         header("Location: avtoriz.php?error=email_is_used");
         exit;
     }
    // Хэширование пароля
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Вставка данных в таблицу
    $sql = "INSERT INTO `user`(`name`, `phone`, `email`, `password`, `company`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $name, $phone, $email, $hashedPassword, $company);
    if ($stmt->execute()) {
        // Перенаправление на страницу профиля с передачей ID пользователя
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