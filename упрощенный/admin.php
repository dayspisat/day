<?php
session_start();
if (!isset($_SESSION['users_id'])) {
    header("Location: avtoriz.php");
    exit;
}
require_once 'style.php';
require_once 'db.php';

$result = $db->query("SELECT * FROM `application` 
    INNER JOIN `users` USING (`users_id`) 
    INNER JOIN `orders` USING (`orders_id`) 
    INNER JOIN `status` USING (`status_id`) 
    ORDER BY `date` DESC");

if (!$result) {
    die("Ошибка выполнения запроса: " . $db->error);
} ?>
<div class="">
    <h2>Заявки</h2>
    <?php if ($result->num_rows > 0): ?>
        <div class="">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="container">
                    <div class="">
                        <p> <span><?= htmlspecialchars($row['email']) ?></span>
                        <p> <span><?= htmlspecialchars($row['orders']) ?></span> </p>
                        <p> <span><?= htmlspecialchars($row['date']) ?></span></p>
                        <p> <span><?= htmlspecialchars($row['adres']) ?></span></p>
                        <p> <span><?= htmlspecialchars($row['status']) ?></span></p>
                    </div>

                    <div class="">
                        <form action="status.php" method="post">
                            <input type="hidden" name="application_id" value="<?= $row['application_id'] ?>">
                            <select name="status" required>
                                <option value="3" <?= $row['status_id'] == 3 ? 'selected' : '' ?>>Выполнено</option>
                                <option value="2" <?= $row['status_id'] == 2 ? 'selected' : '' ?>>Отказано</option>
                            </select>
                            <button type="submit">ИЗМЕНИТЬ</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Нет заявок для отображения</p>
    <?php endif; ?>
</div>