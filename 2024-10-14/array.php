<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>陣列操作</title>
</head>
<body>
    <h2>陣列宣告</h2>
    <?php
    $header=["","國文","英文","數學","地理","歷史"];
    $judy=[95,64,70,90,84];
    $amo=[88,78,54,81,71];
    $john=[45,60,68,70,62];
    $students=[
        'judy'=>[
            '國文'=>95,
            '英文'=>64,
            '數學'=>70,
            '地理'=>90,
            '歷史'=>84],
        'amo'=>[88,78,54,81,71],
        'john'=>[45,60,68,70,62]
    ]

    
    ?>
    <?php
    foreach($judy as $value){
        echo "<td>{$value}</td>";
    }
    ?>
    



</body>
</html>