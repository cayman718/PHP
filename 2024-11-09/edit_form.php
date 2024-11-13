<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member edit</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div>
        <?php
        if(isset($_GET['status'])){
            if($_GET['status'] == 1){
                echo '更新成功';
            }else{
                echo '更新失敗';
            }
        }
        
        
        
        
        ?>
    </div>



    <h1>會員資料</h1>
    <!--form:post>(label+input:text)*4+div>input:submit+input:reset-->
    <?php
    $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
    $pdo=new PDO($dsn,'root','');
    $mem=$pdo->query("select * from `member` where `id`='{$_GET['id']}'")->fetch(PDO::ASSOC);
    ?>



    <div class="register-container">
        <form  action="edit.php" method="post" class="register-form">
            <h2>註冊帳戶</h2>
            
            <input type="text" name="acc" placeholder="帳號"  value="<?=$mem['acc'];?>"  required>
            
            <input type="email" name="email" placeholder="電子郵件" value="<?=$mem['email'];?>" required>
            
            <input type="password" name="pw" placeholder="密碼" value="<?=$mem['pw'];?>" required>
            
            <input type="text" name="tel" placeholder="電話" value="<?=$mem['tel'];?>" required>
            
            <button type="submit" class="submit-btn">註冊</button>

            <input type="hidden" name="id" value="<?=$mem['id'];?>">
            
            <p class="login-link">
                已有帳號？<a href="#">登入</a>
            </p>
        </form>
    </div>
</body>
</html>
</body>
</html>