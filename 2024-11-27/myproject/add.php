<?php
require_once 'config/db.php';
require_once 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $stmt = $db->prepare("INSERT INTO dishes (name, price, description) VALUES (?, ?, ?)");
    $stmt->execute([$name, $price, $description]);
    
    header("Location: index.php");
    exit();
}
?>

<form method="POST" class="dish-form">
    <h2>新增菜品</h2>
    <div>
        <label>名稱：</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>價格：</label>
        <input type="number" name="price" required>
    </div>
    <div>
        <label>描述：</label>
        <textarea name="description"></textarea>
    </div>
    <button type="submit">新增</button>
</form>

<?php require_once 'includes/footer.php'; ?> 