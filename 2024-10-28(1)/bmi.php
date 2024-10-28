<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>計算BMI</title>
</head>
<body>
    <?php
    if(isset($_GET['bmi'])){
        echo "你量測的bmi為{$_GET['bmi']}";
    }
    
    
    ?>
    <h1>計算BMI-get</h1>
    <form action="result.php" method="get">
        <div>
            <label for="height">身高:</label>
            <input type="number" name="height" id="height" step="0.1">cm
        </div>
        <div>
            <label for="weight">體重:</label>
            <input type="number" name="weight" id="weight" step="0.1">kg
        </div>
        <div>
            <input type="submit" value="計算"><input type="reset" value="清空/重置">
        </div>
    </form>

    <h1>計算BMI-post</h1>
    <form action="result.php" method="post">
        <div>
            <label for="height">身高:</label>
            <input type="number" name="height" id="height" step="0.1">cm
        </div>
        <div>
            <label for="weight">體重:</label>
            <input type="number" name="weight" id="weight" step="0.1">kg
        </div>
        <div>
            <input type="submit" value="計算">
            <input type="reset" value="清空/重置">
        </div>
    </form>
</body>
</html>