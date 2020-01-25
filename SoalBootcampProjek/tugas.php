<?php

require('functions.php');

$data = query("SELECT id_book,name_book,img FROM book_tb");


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
     <h3>All Book</h3> 
    </div> 
   </div> 
   <div class="row mt-3 mb-3 ml-1"> 
    <div class="col"> 
     <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal2">Add Book</button> 
     <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#exampleModal1">Add Category</button> 
     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3">Add Writer</button> 
    </div> 
   </div> 
   
   
   
   <div class="row"> 
   <?php foreach($data as $d) : ?>
    <div class="col-sm-4 mb-3"> 
     <div class="card"> 
      <img src="../img/<?=$d['img']; ?>" class="card-img-top"> 
      <div class="card-body"> 
       <h5 class="card-title"><?= $d['name_book']; ?></h5>   
       <a href="detail.php?id=<?= $d['id_book']; ?>" class="btn btn-success">See Detail</a> 
       <a href="hapus.php?id=<?= $d['id_book']; ?>" class="btn btn-danger" onclick="return prompt('Yakin Mau Hapus Buku?);">Delete</a> 
      </div> 
     </div> 
    </div> 
   <?php endforeach; ?>
   </div> 
   
  </div> 
  
  
  
  
  
  <!-- Modal -->
  <?php
  if(isset($_POST['addW'])){
    if(addWriter($_POST) > 0){
      echo "<script>alert('Berhasil Tambah Penulis')
            </script>";
    }else{
      "<script>alert('Gagal Tambah Penulis')
            </script>";
    }
  }
  ?>
  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Add Writer</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <form action="" method="post"> 
       <div class="form-group"> 
        <label for="exampleInputEmail1">Writer :</label> 
        <input type="text" class="form-control" name="writer"> 
       </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> 
        <button type="submit" class="btn btn-primary" name="addW">Add Writer</button> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div> 
  
  
  <!-- Modal -->
  <?php
  if(isset($_POST['addCat'])){
    if(addCat($_POST) > 0){
     echo "<script>alert('Berhasil Tambah Kategori')
            </script>";
    }else{
      "<script>alert('Gagal Tambah Kategori')
            </script>";
    }
  }
  ?> 
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Add Category</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <form action="" method="post"> 
       <div class="form-group"> 
        <label for="exampleInputEmail1">Category :</label> 
        <input type="text" class="form-control" name="category"> 
       </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> 
        <button type="submit" class="btn btn-primary" name="addCat">Add Category</button> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div> 
  
  <?php
  if(isset($_POST['addButton'])){
    if(addBook($_POST) > 0){
     echo "<script>alert('Berhasil Tambah Buku')
             document.location.href = 'tugas.php';
            </script>";
    }else{
     echo "<script>alert('Gagal Tambah Buku')
            </script>";
    }
  }
  ?>
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Add Book</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <form action="" method="post" enctype="multipart/form-data"> 
       <div class="form-group"> 
        <input type="text" class="form-control" name="name-book" placeholder="Name Book"> 
       </div> 
       <div class="form-group"> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">Info ID</button> 
        <input type="text" class="form-control" name="cat-id" placeholder="Category ID"> 
       </div> 
       <div class="form-group"> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5">Info ID</button> 
        <input type="text" class="form-control" name="writ-id" placeholder="Writer ID"> 
       </div> 
       <div class="form-group"> 
        <input type="text" class="form-control" name="pub-year" placeholder="Release Date"> 
       </div> 
       <div class="form-group"> 
        <input type="file" name="picture"> 
       </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
        <button type="submit" name="addButton" class="btn btn-primary">Add</button> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div> 
  
  <?php
  $cat = query("SELECT * FROM category_tb");
  ?>
  <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Category Code Info</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <?php foreach($cat as $c) : ?> 
      <?php echo "Code ".$c['id_cat']. " = ". $c['name_cat']; ?> 
      <?= "<br>"; ?> 
      <?php endforeach; ?> 
      <br> 
      <b>Jika Code Tidak Tersedia Silahkan Input Element Baru!!</b> 
     </div> 
     <div class="modal-footer"> 
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
     </div> 
    </div> 
   </div> 
  </div>
  
  
  <?php
  $writer = query("SELECT * FROM writer_tb");
  ?> 
  <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
     <div class="modal-header"> 
      <h5 class="modal-title" id="exampleModalLabel">Writer Code Info</h5> 
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> 
     </div> 
     <div class="modal-body"> 
      <?php foreach($writer as $w) : ?> 
      <?php echo "Code ".$w['id_writ']. " = ". $w['name_writ']; ?> 
      <?= "<br>"; ?> 
      <?php endforeach; ?> 
      <br> 
      <b>Jika Code Tidak Tersedia Silahkan Input Element Baru!!</b> 
     </div> 
     <div class="modal-footer"> 
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- Optional JavaScript --> 
  <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
 </body>
</html>