<?php
session_start();
if (!isset($_SESSION['users_id'])) {
  header("Location: avtoriz.php");
  exit;
}?>
<?php require_once 'style.php' ?>
<!DOCTYPE html>
<html>
<body>
  <div class="container">
    <h2>Добро пожаловать в ваш профиль, <?= htmlspecialchars($_SESSION['email']) ?>!</h2>

    <form action="order.php" method="post">
      <h2>Укажите адрес:</h2>
      <input type="text" name="adres" class="form-control" id="adres" placeholder="Введите адрес" required>
      <h2>Выберите услугу:</h2>
      <select name="orders">
        <option value="1">Услуга 1</option>
        <option value="2">Услуга 2</option>
      </select>
      <h2>Выберите дату:</h2>
      <?php
      $today = getdate();
      $day = sprintf(
        '%04d-%02d-%02dT%02d:%02d',
        $today['year'],
        $today['mon'],
        $today['mday'],
        $today['hours'],
        $today['minutes']
      );
      echo <<<HERE
                <input type="datetime-local" min='$day' max="2025-12-31T23:59" name="date">
                HERE;
      ?>
      <button type="submit">Создать заявку</button>
    </form>
    <a href="profile2.php"><button>Мои заявки</button></a>
  </div>
</body>
</html>