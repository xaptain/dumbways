<?php
   $data = ["a","b","c","d"];
   $dataLain = ["h","g","a","b","d","f"];
   
   
  function minmax($array){
 
   $arr = [];
   
   foreach($array as $d){
     if($d < end($array)){
      $arr[]=explode(",",$d);
     }
   }
   
  $hasil = min($arr)[0].",".end($array);
  $hasil = explode(",",$hasil);
  return $hasil;
}

 var_dump(minmax($data));
 var_dump(minmax($dataLain));
 

 ?>