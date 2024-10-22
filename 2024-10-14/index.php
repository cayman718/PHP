<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>程式語言基礎/github 操作練習</title>
</head>
<body>
    <?php
      define("PI",3.1415);
       
      $price=100;
      echo $price;
       
      echo "<br>";
      
      $name="lin";
      echo $name;
      
      echo "<br>";


      $total=(100/6)+(38-6*3);
      echo $total;
      
      echo "<br>";
      echo "PI是",PI;
      echo "<br>";



      $num=max(1,48).",".rand(1,48).",".rand(1,48).",".rand(1,48).",".rand(1,48).",".rand(1,48).",".rand(1,48);
      echo $num;

      echo "<br>";
      
    //   define("PI",3.846456);
    //   echo "PI是",PI;

    //   const pi=666;

    //   print(pi);
      
    

    ?>
    <?php
      $a=10;
      $b=50;
      
      $temp=$a;
      $a=$b;
      $b=$temp;
      
      $a=20;
      echo "a是",$a;
      echo "<br>";
      echo "b是",$b;
      echo "<br>";

      

      
      ?>
</body>
</html>