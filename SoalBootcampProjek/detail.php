<?php

require('functions.php');

$id = $_GET['id'];
$detail = query("SELECT * FROM book_tb JOIN category_tb ON book_tb.category_id = category_tb.id_cat JOIN writer_tb ON book_tb.writer_id = writer_tb.id_writ WHERE id_book = $id");
?>
<!doctype html>
<html lang="en">
 <head> 
  <!-- Required meta tags --> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <!-- Bootstrap CSS --> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
  <title>Book</title> 
 </head> 
 <body> 
  <div class="container"> 
   <div class="row mt-3 mb-3"> 
    <div class="col"> 
     <h3>Detail Book</h3> 
    </div> 
   </div> 
   <div class="row ml-3">
    <?php foreach($detail as $d) :?>
    <div class="col-sm-4 mt-3 ml-3"> 
     <div class="card"> 
      <img src="../img/<?= $d['img']; ?>" class="card-img-top" alt="..."> 
      <div class="card-body"> 
       <h5 class="card-title"><?= $d['name_book']; ?></h5> 
       <br> 
       <p class="card-text"><b>Category : </b><?= $d['name_cat']; ?></p> 
       <p class="card-text"><b>Writer : </b><?= $d['name_writ']; ?></p> 
       <p class="card-text"><b>Release Date : </b><?= $d['publication_year']; ?></p> 
       <a href="tugas.php" class="btn btn-danger">Back</a> 
      </div> 
     </div> 
    </div> 
     <? endforeach; ?>
   </div>
      
  </div>
     
 </body>
</html>