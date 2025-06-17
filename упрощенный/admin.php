<?php
require_once 'session.php';
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
                        <?php if ($row['status_id'] == 3 && !empty($row['reject_reason'])): ?>
                            <p>Причина отказа: <span><?= htmlspecialchars($row['reject_reason']) ?></span></p>
                        <?php endif; ?>
                    </div>

                    <div class="">
                        <form action="status.php" method="post">
                            <input type="hidden" name="application_id" value="<?= $row['application_id'] ?>">
                            <select name="status" id="status-select-<?= $row['application_id'] ?>" required onchange="toggleReasonField(this)">
                                <option value="3" <?= $row['status_id'] == 3 ? 'selected' : '' ?>>Отказано</option>
                                <option value="2" <?= $row['status_id'] == 2 ? 'selected' : '' ?>>Выполнено</option>
                            </select>
                            <div id="reason-field-<?= $row['application_id'] ?>" style="display: none;">
                                <input type="text" name="reject_reason" placeholder="Краткая причина отказа" maxlength="100">
                            </div>
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

<script>
function toggleReasonField(select) {
    const applicationId = select.id.replace('status-select-', '');
    const reasonField = document.getElementById('reason-field-' + applicationId);
    reasonField.style.display = select.value == '3' ? 'block' : 'none';
    document.querySelectorAll('[id^="status-select-"]').forEach(toggleReasonField);
}
</script>