
<link rel="stylesheet" href="../registration/registration.css" >
<link rel="stylesheet" href="../index/index.css" >
<link rel="stylesheet" href="../home/home.css" >

<?php
session_start();
if(isset($_SESSION["user"])){
//$id_user= isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');

// include database and object files
include_once '../config/database.php';


include_once 'image.php';
include_once '../gallery/gallery.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 

// prepare objects
$gallery = new Gallery($db);
$images = new Image($db);


$page_title = "AddPicture";

$gallery->OneGallery();


$prikaz=$images->GalleryImages();
$ukupno =$images->CountAllImages();

include_once '../index/headerbasic.php';

?>

<div class="page-user">
    <h1><?php echo $_SESSION['user']['name']; ?></h1>
    
</div>

 <?php
$id_gallery=$gallery->id_g;
$fol=$gallery->g_folder;

 include_once '../user/navbar.php';



 if($_POST){

    $img_folder =$_POST['img_folder'];
    $folders ="../uploads/$img_folder/";
    $image = $_FILES['picture']['name']; 
    
    $path = $folders . $image ; 
    
    $target_file=$folders.basename($_FILES["picture"]["name"]);
    
     
     $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
     $allowed=array('jpeg','png' ,'jpg'); 
     $picture=$_FILES['picture']['name']; 
    
  // $id=$id;
 
 
  $img_name= $_POST['img_name'];
  $id_user=$_POST['id_user'];
  $id_g=$_POST['id_g'];
  
  $ext=pathinfo($picture, PATHINFO_EXTENSION);
   if(!in_array($ext,$allowed) ) 
  
  { 
  
   echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
  
  }
  
  else{ 
  
  move_uploaded_file( $_FILES['picture'] ['tmp_name'], $target_file); 
  
   
   
   
  
  
      if($images->createImage($img_name, $img_folder, $id_user,$picture, $id_g)){
         
         
         header("Location: ../images/add_picture.php?id_g={$id_g}");
         echo "Success!";
        
       
     
         
       
      }else{
          echo "<div class='alert alert-danger' role='alert'>Unable to save picture.</div>";
      }
     
      
     
    }
    }
    ?>
    <form class="blog" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

 
  <div class="form-group">
    <label for="picture">Picture</label>
    <input type="file"  name="picture"  />
  </div>

  <div class="form-group">
  <input type="hidden" name="id_user" value="<?= $_SESSION["user"]["id_user"]; ?>">
  <input type="hidden" name="img_folder" value="<?= $gallery->g_folder; ?>">
  <input type="hidden" name="img_name" value="<?= $gallery->gname; ?>">
  <input type="hidden" name="id_g" value="<?= $gallery->id_g; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
if($ukupno>0){

    while($img=$prikaz->fetch(PDO::FETCH_ASSOC)){
      extract($img);
        
      echo "  <div style=' display: flex;' class='card-group'>";
       echo " <div class='card'>";
        echo "<img class='card-img-top' src='../uploads/$img_folder/".$img['picture']."' alt='Card image cap'>";
        echo "<div class='card-body'>";
        
       // echo " <h1 class='card-title'>{$img_name} </h1>";
            echo "  </div>";
      echo "  </div>";
    }





}
}
?>
   

