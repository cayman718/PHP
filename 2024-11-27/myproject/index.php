<?php
require_once 'config/db.php';
require_once 'includes/header.php';

// 獲取所有菜品
$stmt = $db->query("SELECT * FROM dishes ORDER BY id DESC");
$dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="menu-list">
    <h2>菜單列表</h2>
    <table>
        <tr>
            <th>菜品名稱</th>
            <th>價格</th>
            <th>描述</th>
            <th>操作</th>
        </tr>
        <?php foreach($dishes as $dish): ?>
            <tr>
                <td><?= htmlspecialchars($dish['name']) ?></td>
                <td>$<?= htmlspecialchars($dish['price']) ?></td>
                <td><?= htmlspecialchars($dish['description']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $dish['id'] ?>">編輯</a>
                    <a href="delete.php?id=<?= $dish['id'] ?>">刪除</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?> 