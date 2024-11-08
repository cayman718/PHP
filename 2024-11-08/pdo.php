<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資料庫連線</title>
    <style>
        table{
        }
    </style>
</head>
<body>
    <h1>資料庫連線</h1>
    <?php
    // $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    // $pdo=new PDO($dsn,'root','');

    // $sql="select * from classes";
    
    // $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
    // foreach($rows as $row){
    //     echo $row['id']."-".$row['name']."-".$row['tutor']."<br>";
    // }
    ?>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資料庫連線</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">資料庫連線</h1>
    <?php
    try {
        // 建立 PDO 連線
        $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
        $pdo = new PDO($dsn, 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 查詢資料
        $sql = "SELECT * FROM classes";
        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        // 顯示資料於表格中
        if (!empty($rows)) {
            echo '<table>';
            echo '<tr><th>ID</th><th>班級名稱</th><th>導師</th></tr>';
            foreach ($rows as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['tutor']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p style="text-align: center;">目前沒有資料。</p>';
        }
    } catch (PDOException $e) {
        echo '<p style="color: red; text-align: center;">資料庫連線失敗：' . $e->getMessage() . '</p>';
    }
    ?>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資料庫連線</title>
    <style>
        table{
        }
    </style>
</head>
<body>
    <h1>資料庫連線</h1>
    <?php
    // $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    // $pdo=new PDO($dsn,'root','');

    // $sql="select * from classes";
    
    // $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
    // foreach($rows as $row){
    //     echo $row['id']."-".$row['name']."-".$row['tutor']."<br>";
    // }
    ?>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資料庫連線</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">資料庫連線</h1>
    <?php
    try {
        // 建立 PDO 連線
        $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
        $pdo = new PDO($dsn, 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 查詢資料
        $sql = "SELECT * FROM classes";
        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        

        // 顯示資料於表格中
        if (!empty($rows)) {
            echo '<table>';
            echo '<tr><th>ID</th><th>班級名稱</th><th>導師</th></tr>';
            foreach ($rows as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['tutor']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p style="text-align: center;">目前沒有資料。</p>';
        }
    } catch (PDOException $e) {
        echo '<p style="color: red; text-align: center;">資料庫連線失敗：' . $e->getMessage() . '</p>';
    }
    ?>
</body>
</html>

