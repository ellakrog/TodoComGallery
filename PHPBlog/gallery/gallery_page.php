<link rel="stylesheet" href="../registration/registration.css" >
<link rel="stylesheet" href="../index/index.css" >
<link rel="stylesheet" href="../home/home.css" >

<?php
session_start();
if(isset($_SESSION["user"])){
//$id_user= isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');

// include database and object files
include_once '../config/database.php';



include_once 'gallery.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 

// prepare objects
$gallery = new Gallery($db);


$page_title = "Gallery";

$total_rows=$gallery->CountAllGallery();
$stmts=$gallery->userGallery();


include_once '../index/headerbasic.php';

?>

<div class="page-user">
    <h1><?php echo $_SESSION['user']['name']; ?></h1>
    
</div>

 <?php

 
 include_once '../user/navbar.php';


echo "<div class='gallery' style='width: 600px;  position: relative;left: 160px; margin-top:20px'>";
 include_once 'addgallery.php';
 include_once 'new_galleryform.php';
 echo "</div>";
 echo "<br>";
 echo " <h1 class='card-title'>List of all Galleries: </h1>";
 echo "<br>";
 echo "<div  class='gallery' style='width: 1600px; height:700px; position: relative;left: 30px;margin-top:5px'>";
 if($total_rows>0){

 
    while ($row = $stmts->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        
        echo "  <div class='card-group' style=' display: flex ;'>";
         echo " <div class='card'>";
          echo "<img class='card-img-top' src='../uploads/$g_folder/".$row['g_img']."' alt='Card image cap'>";
          echo "<div class='card-body'>";
          
          echo " <h1 class='card-title'>{$gname} </h1>";
              echo "  </div>";
        echo "  </div>";
       
        //echo " <h1 class='card-title'>{$gname} </h1>";
       
        //echo " <img style='padding-bottom:1px;width: 180px;  height:200px;border: 3px solid gray' class='card-img-bottom'  src='../uploads/$g_folder/".$row['g_img']."'>";
        echo "<a class='btn btn-primary' style='width: 105px; height:700px;' href='../images/add_picture.php?id_g={$id_g}' role='button'>View Gallery</a>";
       
      
      
      }
      
      
}

}