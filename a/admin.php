<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админ</title>
</head>

<body>
  <div class="admin-container">
    <h2>Заявки</h2>
    <ul class="admin-list">
      <?php
      require_once 'db.php';
      $sql = "SELECT * FROM `application` 
      INNER JOIN `user` USING (`id_user`)
       INNER JOIN `order` USING (`id_order`) 
       INNER JOIN `status` USING (`id_status`) ORDER BY `date` DESC";
      $result = $mysqli->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "
                                <div class='container'>
                                <div class='container-left'> 
                                    <span>" . htmlspecialchars($row['name']) . "<br>" . "</span>
                                    <span>" . htmlspecialchars($row['company']) . "<br></span>
                                    <span>" . htmlspecialchars($row['date']) . "<br></span>
                                    <span>" . htmlspecialchars($row['phone']) . "<br></span>
                                    <span>" . htmlspecialchars($row['email']) . "<br></span>
                                    <span>" . htmlspecialchars($row['orders']) . "<br></span>
                                    <span>" . htmlspecialchars($row['value']) . "</span>
                                    </div>
                                    <div class='container-right'>
                                    <form action='status.php' method='post'>
                                    <input type='hidden' name='id_application' value={$row['id_application']}></input>
                                    <select id='status' name='status'>
                                    <option value='3'>ОТКАЗАНО</option>
                                    <option value='2'>ВЫПОЛНЕНО</option>
                                    </select><button type='submit'>ИЗМЕНИТЬ</button></form>
                                    </div>
                                </div>
                              ";
        }
      } else {
        echo "<li>Нет заявок для отображения</li>";
      }
      $mysqli->close();
      ?>
    </ul>
  </div>
</body>

</html>