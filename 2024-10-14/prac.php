<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* *{
            list-style: none;
            margin:0;
            padding:0;
        } */
        ul{
            background-color: #888;
            list-style-type: none;
            width:100%;
            display: block;
        }
        ul li{
            padding:15px;
        }
    </style>
</head>
<body>
    <h2>分配成績等級</h2>
    <h3>給定一個成績數字,根據成績所在的區間,給定等級</h3>
    <ul>
        <li> 0 ~ 59 => E</li>
        <li> 60 ~ 69 => D</li>
        <li> 70 ~ 79 => C</li>
        <li> 80 ~ 89 => B</li>
        <li> 90 ~ 100 => A</li>
    </ul>
    <?php
    $score=89;
    $level='';
    if($score>=90){
    $level="A";
    }else if($score>=80){
        $level="B";
    }else if($score>=70){
        $level="C";
    }else if($score>=60){
        $level="D";
    }else{
        $level="Failure";
    }
    // echo "score=".$score;
    echo "你的等級=".$level;
    ?>
    

    <h1>閏年判斷，給定一個西元年份，判斷是否為閏年</h1>
    <div>地球對太陽的公轉一年的真實時間大約是365天5小時48分46秒，因此以365天定為一年 的狀況下，每年會多出近六小時的時間，所以每隔四年設置一個閏年來消除這多出來的一天。</div>
    <ul>
        <li>公元年分除以4不可整除，為平年。</li>
        <li>公元年分除以4可整除但除以100不可整除，為閏年。
        </li>
        <li>公元年分除以100可整除但除以400不可整除，為平年。
        </li>
    </ul>
    
<?php
$year=2500;
if($year%4==0){
    if($year%100!=0 && $year%400==0){
        echo "西元";
        echo "$year";
        echo "是閨年";
    }else{
        echo "西元";
        echo $year;
        echo "是平年";
    }
}else{
    echo "西元";
    echo $year;
    echo "是閨年";
}

?>

</body>
</html>


