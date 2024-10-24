<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date日期</title>
</head>
<body>
    <h1>給定兩個日期,計算中間間隔天數</h1>
    <?php
        $start = "2023-10-24";
        $end = "2024-10-24";
        $startTime=strtotime($start);
        echo '開始時間:'.$startTime;
        echo "<br>";
        $endTime=strtotime($end);
        echo '結束時間:'.$endTime;
        echo "<br>";
        $gap=$endTime-$startTime;
        echo '差距秒:'.$gap;
        echo "<br>";
        $days=$gap/(60*60*24);
        echo "距下次生日還有:".$days ."天";
        echo "<br>";
        date_default_timezone_set('Asia/Taipei');
        echo date("F j, Y, g:i a");
    ?>

    <h1>計算距離自己下一次生日還有幾天</h1>
    <?php
    $start = date("Y-m-d");
    $end = "2024-10-30";
    $startTime=strtotime($start);
    echo '開始時間:'.$startTime;
    $endTime=strtotime($end);
    echo "<br>";
    echo '下次生日:'.$endTime;
    echo "<br>";
    $$gap=$endTime-$startTime;
    echo '差距秒:'.$gap;
    echo "<br>";
    $days=$gap/(60*60*24);
    echo "距下次生日還有: $days 天";
    echo "<br>";
    ?>
    
    
    <h1>利用date()函式的格式化參數,完成以下的日期格式呈現</h1>
    <ul>
        <li>2021/10/05</li>
        <li>10月5日 Tuesday</li>
        <li>2021-10-5 12:9:5</li>
        <li>2021-10-5 12:09:05</li>
        <li>今天是西元2021年10月5日 上班日(或假日)</li>
    </ul>
    <?php
    echo date("m月d日");
    echo "<br>";

   ?>

    <?php
    $dateString = "10月5日 Tuesday";
    
    // 定义星期几的转换映射
    $weekdays = [
        'Monday'=>['min'=>'一','short'=>'周一','fulltext'=>'星期一'],
        'Tuesday'=>['min'=>'二','short'=>'周二','fulltext'=>'星期二'],
        'Wednesday'=>['min'=>'三','short'=>'周三','fulltext'=>'星期三'],
        'Thursday'=>['min'=>'四','short'=>'周四','fulltext'=>'星期四'],
        'Friday'=>['min'=>'五','short'=>'周五','fulltext'=>'星期五'],
        'Saturday'=>['min'=>'六','short'=>'周六','fulltext'=>'星期六'],
        'Sunday'=>['min'=>'七','short'=>'周日','fulltext'=>'星期日']
    ];
    
   echo date("m月d日").$weekdays[date("l")]['min'];
   echo "<br>";
   echo date("m月d日").$weekdays[date("l")]['short'];
   echo "<br>";
   echo date("m月d日").$weekdays[date("l")]['fulltext'];
   echo "<br>";
   echo "今天是西元".date("Y年m月d日");
   echo "<br>";
   if(date("N")>5){
      echo "假日";
    }else{
      echo "上班日";
    }
    echo "<br>";
    ?>
    
    <?php
   //设置要检查的日期
   $dateString = "2021-10-09";
   $date = new DateTime($dateString);
   
   // 获取星期几（1 = 周一，7 = 周日）
   $dayOfWeek = $date->format('N');
   
   if ($dayOfWeek >= 6) { // 6 = 周六, 7 = 周日
       echo "{$dateString} 是假日。\n";
   } else {
       echo "{$dateString} 是工作日。\n";
   }
   
    
    
    
    ?>
    <h1>利用迴圈來計算連續五個周一的日期</h1>
    <ol>
        <li>2021-10-04 星期一</li>
        <li>2021-10-11 星期一</li>
        <li>2021-10-18 星期一</li>
        <li>2021-10-25 星期一</li>
        <li>2021-11-01 星期一</li>
    </ol>
    <hr>    
    <?php
    for ($i=1; $i<5 ; $i++) { 
        $timestamp=strtotime("+$i weeks".date("Y-m-d"));
        echo date("Y-m-d",$timestamp);
        echo "&nbsp;";
        echo $weekdays[date("l")]['fulltext'];
        echo "<br>";

    }
    
    
    
    ?>

    <h1>線上月曆製作</h1>
    <ul>
        <li>以表格方式呈現整個月份的日期</li>
        <li>可以在特殊日期中顯示資訊(假日或紀念日)</li>
        <li>嘗試以block box或flex box的方式製作月曆</li>
    </ul>
    <style>
        table{
            border-collapse:collapse;
        }
        td{
            padding: 5px 10px;
            text-align: center;
            border: 1px solid #999; 
        }
        .hoilday{
            background-color: pink;
            color:#999;
        }
        .grey-text{
            color:#999;
        }
        .today{
            background-color: blue;
            color:white;
            font-weight: bolder;
        }
    </style>
    <h3><?php echo date("m月");?></h3>
    <table>
        <tr>
            <td></td>
            <td>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td>六</td>
        </tr>
        <?php
        $firstday=date("Y-m-1");
        $firstdaytime=strtotime($firstday);
        $firstweek=date("w",strtotime(date("Y-m-1")));
        $thismonth=date("m");
             
        

        for($i=0;$i<6;$i++){ //$i是調整左邊那排的
            echo "<tr>";
            echo "<td>";
            echo $i+1;
            echo "</td>";
            for($j=0;$j<7;$j++){ //$j是調整上方那排
               echo "<td class='hoilday'>";
               $cell=$i*7+$j -$firstweek;
               $thedaytime=strtotime("$cell days".$firstday);

               $themonth=(date('m',$thedaytime)==date("m"))?'':'grey-text';
               $istoday=(date('Y-m-d',$thedaytime)==date("Y-m-d"))?'today':'';
               $w=date("w",$thedaytime);
               $ishoilday=($w==0 || $w==6)?'hoilday':'';


                  echo "<td class='$ishoilday $themonth $istoday'>";
                  echo date("d",$thedaytime);
                  echo "</td>";
            //    }else{
            //       echo "<td class='$themonth $istoday'>";
            //       echo date("d",$thedaytime);
            //       echo "</td>"
            //    }
            //    echo date("Y-m-d",$thedaytime);
            //    echo "</td>";
            //    if($thedaytime >= 6 ){
            //     echo ""
               

            }
            echo"</tr>";
        }
        ?>

             
                <!-- $dayNum=$i*7 + $j + 1 - $firstweek; -->
                <!-- if($dayNum<=date('t') && $dayNum > 0){ -->
                   <!-- echo $dayNum; -->
                <!-- } -->
               
    </table>




    </body>
</html>