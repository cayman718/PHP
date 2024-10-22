<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>天干地支</title>
</head>
<body>
<?php
// 定義天干和地支的數組
$tianGan = ['甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'];
$diZhi = ['子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'];

// 設定起始年份
$startYear = 1024;
$inputYear = 2024; // 可以改為任意年份

$currentTianGanIndex = 0; // 天干索引
$currentDiZhiIndex = 0;    // 地支索引

// 從1024年開始，循環至目標年份
for ($i = $startYear; $i <= $inputYear; $i++) {
    // 當年是目標年份時，輸出結果
    if ($i == $inputYear) {
        echo "西元 $inputYear 年對應的天干地支為: " . $tianGan[$currentTianGanIndex] . $diZhi[$currentDiZhiIndex];
        break; // 找到後終止迴圈
    }
    
    // 更新天干和地支的索引
    $currentTianGanIndex = ($currentTianGanIndex + 1) % 10; // 天干每10年循環
    $currentDiZhiIndex = ($currentDiZhiIndex + 1) % 12;     // 地支每12年循環
}
?>

</body>
</html>