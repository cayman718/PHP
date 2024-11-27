-- 建立資料庫
CREATE DATABASE IF NOT EXISTS myproject;
USE myproject;

-- 建立菜品表
CREATE TABLE IF NOT EXISTS dishes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 插入測試資料（選擇性）
INSERT INTO dishes (name, price, description) VALUES 
('義大利麵', 280, '新鮮手工製作'),
('牛排', 580, '澳洲進口牛肉'),
('凱薩沙拉', 180, '新鮮生菜配凱薩醬');
