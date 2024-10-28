<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI結果</title>
</head>
<body>
    <?php
    if(isset($_GET['height'])){
        $height=$_GET['height'];
    }else if(isset($_POST['height'])){
        $height=$_POST['height'];
    }else{
        echo "請從首頁登入";
        exit();
    }
    
    if(isset($_GET['weight'])){
        $weight=$_GET['weight'];
    }else if(isset($_POST['weight'])){
        $weight=$_POST['weight'];
    }else{
        echo "請從首頁登入";
        exit();
    }
    ?>


    <h1>BMI結果</h1>
    <div>你的身高:<?=$height;?>公分</div>
    <div>你的體重:<?=$weight;?>公斤</div>
    <?php
    $h=$_GET['height']/100;

    $bmi=round($_GET['weight']/($h * $h),2);
    
    if($bmi<18.5){
        $level= "體重過輕";
    }else if($bmi<=24){
        $level= "體重正常";
    }else {
        $level= "體重過重";
    }
    
    ?>




    <div>你的BMI:<?=$bmi;?></div>
    <div>體位判定:<?=$level;?></div>
    
    <div>
        <a href="index.php?bmi=<?=$bmi;?>">回首頁/重新量測</a>
    </div>





</body>
</html>