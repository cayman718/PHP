<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>string replace</title>
</head>
<body>
    <h1>字串取代</h1>
    <h3>將字串內的文字替代為*</h3>
    <?php
    //mb_internal_encoding("UTF-8");//將內部編碼可變成中文
    $str="aaddw1123";
    $str= str_replace(['a','a','d','d','w','1','1','2','3'],"*",$str);
    echo $str;
    echo $str . "<br>";
    
    

    $str="this,is,a,book";
    $arr1=explode(",",$str);
    print_r($arr1);
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";

    $str=join(" ",$arr1);
    echo $str;
    echo "<br>";

    $arr1="The reason why a great man is great is that he resolves to be a great man";
    echo substr($arr1,0,10);//(要取的字串,起始位置,長度)
    echo "<br>";

    $arr2="偉人之所以偉大，是因為他與別人共處逆境時，別人失去了信心，他卻下決心實現自己的目標。";
    echo mb_substr($arr2,-1);
    // $str="this,is,a,book";
    // $arr1=str_split($str,4);
    // print_r($arr1);
    // echo "<pre>";
    // print_r($arr1);
    // echo "</pre>";

    
    echo "<br>";
    
    $str="學會Php網頁設計,薪水會加倍,工作會好找";
    $key="程式設計";
    $large="<span style='font-size:28px;color:blue'>".$key."</span>";
    $str=str_replace($key,$large,$str);
    echo $str ."<br>";
    
    
    
    
    
    
    
    
    
    
    
    
    ?>

    
</body>
</html>