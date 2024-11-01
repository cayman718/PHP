<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日期</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            padding: 5px 10px;
            text-align: center;
            border: 1px solid #999;
        }
        .holiday {
            background: pink;
            color: #999;
        }
        .grey-text {
            color: #999;
        }
        .today {
            background: blue;
            color: white;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <h3><?php echo date("m月"); ?></h3>
    <ul>
        <li>有上一個月下一月的按鈕</li>
        <li>萬年曆都在同個頁面同個檔案</li>
        <li>有前年和來年的按鈕</li>
    </ul>

    <?php
    if (isset($_GET['month'])) {
        $month = (int)$_GET['month'];
    } else {
        $month = (int)date("m");
    }

    // 檢查月份的邊界
    if ($month < 1) {
        $month = 12; // 12 月
        $year = (int)date("Y") - 1; // 去年
    } elseif ($month > 12) {
        $month = 1; // 1 月
        $year = (int)date("Y") + 1; // 明年
    } else {
        $year = (int)date("Y"); // 今年
    }
    ?>

    <a href="ccc.php?month=<?php echo $month - 12; ?>">前年</a>
    <a href="ccc.php?month=<?php echo $month - 1; ?>">上一個月</a>
    <a href="ccc.php?month=<?php echo $month + 1; ?>">下一個月</a>
    <a href="calender.php?month=<?php echo $month + 12; ?>">明年</a>
    <h3><?php echo $year . "年 " . $month . "月"; ?></h3>
    
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
        $firstDay = "{$year}-{$month}-01";
        $firstDayTime = strtotime($firstDay);
        $firstDayWeek = date("w", $firstDayTime);

        for ($i = 0; $i < 6; $i++) {
            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>"; // 顯示星期幾
            for ($j = 0; $j < 7; $j++) {
                $cell = $i * 7 + $j - $firstDayWeek;
                $theDayTime = strtotime("$cell days " . $firstDay);

                // 判斷樣式
                $theMonth = (date("m", $theDayTime) == date("m")) ? '' : 'grey-text';
                $isToday = (date("Y-m-d", $theDayTime) == date("Y-m-d")) ? 'today' : '';
                $w = date("w", $theDayTime);
                $isHoliday = ($w == 0 || $w == 6) ? 'holiday' : '';

                echo "<td class='$isHoliday $theMonth $isToday'>";
                echo date("d", $theDayTime);
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
