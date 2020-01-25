<?php

$data = "DEV99";


function drawLine($word){
  

$arr = str_split($word);
  for($b=0; $b<strlen($word); $b++){
    for($j=1; $j<=$b; $j++){
        echo"  ";
    }for($b1=$b; $b1<$j; $b1++){
        echo $arr[$b1];
    }
    echo "\n";
    }
 }
 
 drawLine("DUMbWAYS");
 drawLine($data);

 ?>