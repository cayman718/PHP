<?php
// session_start();
if(!isset($_POST['acc'])){
    header("location:login.php");
    exit();
}


$acc=$_POST['acc'];
$pw=$_POST['pw'];
if ($acc == 'admin' && $pw == '1234') {
    echo "歡迎光臨!!";
    setcookie("login", $acc, time() + 180);

if (isset($_COOKIE['login'])) {
    echo "<br>登入使用者: " . $_COOKIE['login'];
} else {
    echo "<br>登入使用者: " . $acc; // 此時 cookie 還未生效
}
echo '<br><a href="login.php">回首頁</a>';
} else {
echo "帳密錯誤: 登入失敗";
echo '<br><a href="login.php">重新登入</a>';
}
?>


<?php 

// if(!isset($_POST['acc'])){
//     header("location:login.php");
//     exit();
// }

// $acc=$_POST['acc'];
// $pw=$_POST['pw'];

// if($acc=='admin' && $pw=='1234'){
//     echo "帳密正確:登入成功";
//     setcookie("login","$acc",time()+180);
//     echo $_COOKIE['login'];
//     echo "<br><a href='login.php'>回首頁</a>";
// }else{
//     echo "帳密錯誤:登入失敗";

// }


?>