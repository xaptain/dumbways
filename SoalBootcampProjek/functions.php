<?php
   $username = "root";
   $password = "";
   $server = "localhost";
   $db = "book";
   
   $conn = mysqli_connect($server,$username,$password,$db);
    
    
    function query($query){
     global $conn;
     $fetch = mysqli_query($conn, $query);
     $rows = [];
     while($row = mysqli_fetch_assoc($fetch)){
       $rows[] = $row;
     }
     return $rows;
    
    }
    
    
    
    function addCat($data){
      global $conn;
      $nameCat = $data['category'];
      
      $query = mysqli_query($conn, "INSERT INTO category_tb VALUES('','$nameCat')");
      return mysqli_affected_rows($conn);
    }
    
    function addWriter($data){
      global $conn;
      $nameW = $data['writer'];
      
      $query = mysqli_query($conn, "INSERT INTO writer_tb VALUES('','$nameW')");
      return mysqli_affected_rows($conn);
    }
   
   function addBook($data){
     
     global $conn;
     
      $name = $data['name-book'];
      $category = $data['id-cat'];
      $writer = $data['id-writ']; 
      $public = $data['pub-year'];
      
      $gambar = upload();
      if(!$gambar){
        return false;
      }
      
      
     $query =  mysqli_query($conn, "INSERT INTO book_tb VALUES('', '$name','$category','$writer','$public','$gambar')");
      return mysqli_affected_rows($conn);
   
  }
  
  function update($data){
     
     global $conn;
      $id_pkn = $data['up-id'];
      $name = $data['up-namePk'];
      $str = $data['up-str'];
      $deff = $data['up-def'];
      $category = $data['up-category']; 
      $elCode = $data['up-elCode'];
      $oldPicture = $data['oldPicture'];
      var_dump($oldPicture);
      
      if($_FILES['picture']['error'] === 4){
        $oldPicture = $picture;
      }else{
        $picture = upload();
      }
      
     $query = "UPDATE pokemon_tb SET
                    name_pkn = '$name',
                    str = '$str',
                    def = '$deff',
                    category = '$category',
                    gambar = '$picture',
                    element_id = '$elCode'
                    WHERE id_pkn = $id_pkn
                 ";
     mysqli_query($conn, $query);
      return mysqli_affected_rows($conn);
   
  }
  
  
    function upload(){
      $namePic = $_FILES['picture']['name'];
      $tmpName = $_FILES['picture']['tmp_name'];
      $size = $_FILES['picture']['size'];
      $error = $_FILES['picture']['error'];
      
      //cek ekstensi file
       $eksValid = ["jpg","png","jpeg"];
       $eksFile = explode(".",$namePic);
       $eksFile = strtolower(end($eksFile));
       
       //cek error 
       if($error === 4){
        echo "<script>alert('Gambar Harus dimasukkan!')</script>";
         return false;
       }
       
       if(!in_array($eksFile,$eksValid)){
         echo "<script>alert('Ekstensi File salah')</script>";
         return false;
       }
       
       
      //cek size
       if($size > 2000000){
         echo "<script>alert('Ukuran File terlalu besar')</script>";
         return false;
       }
     
      
      
      $newFile = uniqid();
      $newFile .= '.';
      $newFile .= $eksFile;
      
      move_uploaded_file($tmpName, 'img/' . $newFile);
       
     return $newFile; 
       
      
    }
  
  
  
    function hapus($id){
      global $conn;
      
      $query = mysqli_query($conn,"DELETE FROM book_tb WHERE id_book = $id");
      
      return mysqli_affected_rows($conn);
        
    }
    
    

 