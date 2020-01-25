<?php
   $jmlLoveBird = 6969;
   $bertelur = 21;
   $waktu = 411;
   $mati = 0.111;
   
   $waktuBertelur = floor($waktu / $bertelur);
   $totalLoveBird = $jmlLoveBird * $waktuBertelur;
   $totalMati = $mati * $jmlLoveBird * $waktuBertelur;
   $hasil = $totalLoveBird-$totalMati;
   
   echo "Total Love Bird Setelah ".$waktu." adalah ".floor($hasil);
   
   
   
   
   

 ?>