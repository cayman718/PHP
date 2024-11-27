<?php
$host = 'localhost';
$dbname = 'myproject';  // 資料庫名稱改為myproject
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "連接失敗: " . $e->getMessage();
} 