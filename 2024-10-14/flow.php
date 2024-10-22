<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>程式基礎-流程</title>
</head>
<body>
    <h1>流程-if-else</h1>

    <?php
    $score=80;
    if($score>70){
        print("及格");
    }else{
        print("不及格");
    }
    echo "<br>";
    echo "我的分數".$score;
    ?>
    

    <h1>switch...case</h1>
    <?php
    $level="B";
    switch($level){
        case "A":
            print("表現優良，請繼續保持");
        break;
        case "B":
            print("值得肯定，還有進步空間");
        break;
        case "C":
            print("需要更多的練習");
        break;
        case "D":
            print("需要加強基本功");
        break;
        case "E":
            print("是否無心學業?");
        break;
        }
        ?>
        
        <h1>三元運算子</h1>
        <?php
        $score=66;        
        echo ($score>=60)?"及格":"不及格";
        ?>

        <h1>for loop</h1>
        <?php
        for($i=0;$i<=6;($i=$i+2)){
            print($i*10);
            print("<br>");
        }
        print "<br>";
        
        $score=10;
        $counter=0;
        while($score<60){
           $score=$score+10;
           $counter++;
        }
        echo $score;
        echo "<br>";
        echo $counter;
        ?>

        <h1>陣列</h1>
        <?php
        $a=["a","b","c","d","e"];
        // echo $a[0] ;
        
        for($i=0;$i<count($a);$i++){
            echo $a[$i];
            // echo "<br>";
        }
        
        echo "<br>";
        $b=['姓名'=>'lin','數學'=>'80','英文'=>'90'];
        

        $keys=array_keys($b);
        for($i=0;$i<count($keys);$i++){
            $key = $keys[$i];//當前的鍵
            $value = $b[$key];//當前鍵獲取的值
            // echo $keys[$i];
            echo ($key.":".$value);
        }



        // foreach($b as $value){
        //     echo $value;
        //     echo "<br>";
        // }
        ?>

    </body>
</html>