<?php
   require('functions.php');
   
   $id = $_GET['id'];
   
   if(hapus($id) > 0){
     echo "<script>alert('Berhasil Hapus Buku')
           document.location.href = 'tugas.php';
         </script>";
     
   }else{
     echo "<script>alert('Gagal Hapus Gagal')
             document.location.href = 'tugas.php';
         </script>";
   }

 ?>