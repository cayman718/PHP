<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入頁面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            width: 50%;
            margin:10px;
        }
        .login-container input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_GET['login'])){

    }
    ?>
    
    <div class="login-container">
        <h1>登入</h1>
        
        <!-- 錯誤信息 -->
        <div class="error-message">
            <?php
            if (isset($_GET['error'])) {
                echo "使用者名稱或密碼錯誤。";
            }
            ?>
        </div>
        
        <form action="check_acc.php" method="post">
            <label for="username">使用者名稱:</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">密碼:</label>
            <input type="password" name="password" id="password" required>
            
            <input type="submit" value="登入">
        </form>
    </div>
    <?php
    
    
    
    
    
    
    
    
    
    
    ?>




    
</body>
</html>
