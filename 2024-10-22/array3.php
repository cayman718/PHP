<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>閏年</title>
</head>
<body>
    <?php
    $leap=[];

    for($i=2024;$i<=2524;$i++){
        if($i % 4==0 && ($i % 100 != 0 || $i % 400 == 0)){
            $leap[]=$i;
        }
    }

    echo"<pre>";
    print_r($leap);
    echo"</pre>";
    ?>
</body>
</html>