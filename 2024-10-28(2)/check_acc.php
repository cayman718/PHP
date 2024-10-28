<?php
$acc=$_POST['username'];
$pw=$_POST['password'];

if($acc=='admin' && $pw=='1234'){
    echo "帳密正確:登入成功";
}else{
    echo "帳密錯誤:登入失敗";
}






?>