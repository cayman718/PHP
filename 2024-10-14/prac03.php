<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>star</title>
    <style>
        body{
            font-family:'Courier New', 'Courier, monospace';
        }
    </style>
</head>
<body>
    <?php
    // for($i=0;$i<5;$i++){
    //     for($k=0;$k<($i+1);$k++){
    //         echo "*";
    //     }
    //     echo "<br>";
    // }

    for($i=5;$i>0;$i--){
        for($k=0;$k<$i;$k++){
            echo "*";
        }
        echo "<br>";
    }
    
    ?>
    <hr>
    <h2>正三角形</h2>
    <?php
    for($i=0;$i<5;$i++){
        for($k=0;$k<5-$i;$k++){
            echo "&nbsp";
        }

        for($j=0;$j<(2*$i+1);$j++){
          echo "*";
        }
        echo "<br>";
    }
    
    ?>
    
    <hr>
    <h2>倒正三角形</h2>
    <?php
    /*
    * 
    *
    *
    */ 
    for($i=4;$i>=0;$i--){
       for($k=0;$k<(4-$i);$k++){
         echo "&nbsp;";
       }
       for($j=0;$j<(2*$i+1);$j++){
        echo "*";
       }
       echo "<br>";
    }
    
    ?>
    
    <hr>
    <h2>菱形</h2>
    <?php
    $size=11;
    for($i=0;$i<$size;$i++){
        if($i>(floor($size/2))){
            $k1=$i-(floor($size/2));
            $j1=2*($i-(2*($i-(floor($size/2)))))+1;
        }else{
            $k1=(floor($size/2))-$i;
            $j1=(2*$i+1);
        }

        for($k=0;$k<$k1;$k++){
            echo "&nbsp;";
        }
        for($j=0;$j<$j1;$j++){
            if($j==0 || $j==$j1-1 || $i==(floor($size/2)) || $j==floor(($j1-1)/2) ){
            echo "*";
        }else{
            echo "&nbsp;";
        }
    }
        echo "<br>";
    }

    ?>



    <hr>
    <h2>矩形</h2>
    <?php
    for($i=1;$i<=5;$i++){
       for($j=1;$j<=5;$j++){
        if($i==1 || $i==5){
            echo "*";
        }else if($j==1 || $j==5){
            echo "*";
        }else{
            echo "&nbsp;";
        }
    }
        echo "<br>";
}
?>

    <hr>
    <h2>矩形對角線</h2>
    <?php
    $width=5; //套用變數更彈性
    for($i=0;$i<$width;$i++){
       for($j=0;$j<$width;$j++){
        if($i==0 || $i==($width-1)){
            echo "*";
        }else if($j==0 || $j==($width-1)){
            echo "*";
        }else if($i==$j || $j==($width-1-$i)){
            echo "*";
        }else{
            echo "&nbsp;";
        }
    }
        echo "<br>";
}
?>
</body>
</html>