
<style>
    .table{
        display:flex;
        border-collapse:collapse;
        margin: 20px;
        /* align-item:center; */
        justify-content:center;
    }
    .table td{
        border:1px solid #aaa;
        padding:10px;
        width:auto;
        text-align:center;
    }
    .table tr{
        /* background-color: #fa0; */
    }
</style>

<?php
// $n=50;
// for($i=0;$i<=$n;$i=$i+2){
//     echo $i;
//     echo ",";
// }
// echo "<br>";

$n=100;
$count=0;
echo "n=".$n."<br>";
for($i=3;$i<=$n;$i=$i+2){
    $t=true;
    for ($j=2;$j<=sqrt($i);$j++){
        if($i%$j==0){
            $t=false;
            break;
        }
        $count++;
    }
    if($t==true){
        echo "$i 是質數<br>";
    }
}
echo $count;

?>

<h2>九九乘法表</h2>

<?php
echo "<table border=1>";
for($j=1;$j<=9;$j++){
    echo "<tr>";
    for($i=1;$i<=9;$i++){
        echo "<td>";
        echo "$j x $i = ".($j*$i);
        echo "</td>\n";
    }
    echo "<br>";
  }
  echo "<table/>"
?>

<?php
echo "<table class='table'>";
for($j=0;$j<=9;$j++){
    echo "<tr>";
    for($i=0;$i<=9;$i++){
        echo "<td>";
        if($j==0 && $i==0){
            echo "";
        }else if($j==0){
            echo $i;
        }else if($i==0){
            echo $j;
        }else{
            echo ($j*$i);
        }
        echo "</td>";
    }
    echo "</tr>";
  }
  echo "<table/>"
?>

<h2>半邊九九乘法表</h2>

<?php
// echo "<table border=1>";
// for($j=1;$j<=9;$j++){
//     echo "<tr>";
//     for($i=1;$i<=9;$i++){
//         echo "<td>";
//         echo "$j x $i = ".($j*$i);
//         echo "</td>\n";
//     }
//     echo "<br>";
//   }
//   echo "<table/>"
?> 

<?php
echo "<table class='table'>";
for($j=0;$j<=9;$j++){
    echo "<tr>";
    for($i=0;$i<=9;$i++){
        echo "<td>";
        if($j==0 && $i==0){
            echo "";
        }else if($j==0){
            echo $i;
        }else if($i==0){
            echo $j;
        }else{
            if($i>=$j){
               echo ($j*$i);
            }
        }
        echo "</td>";
    }
    echo "</tr>";
  }
  echo "<table/>"
?>




