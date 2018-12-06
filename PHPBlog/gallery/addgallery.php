<?php

if($_POST){
  
  $folder =$_POST['g_folder']; 
  mkdir("../uploads/$folder ", 0770) ;
  $folders ="../uploads/$folder/";
  $image = $_FILES['g_img']['name']; 
  
  $path = $folders . $image ; 
  
  $target_file=$folders.basename($_FILES["g_img"]["name"]);
  
   
   $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
   $allowed=array('jpeg','png' ,'jpg'); 
   $filename=$_FILES['g_img']['name']; 
  
// $id=$id;

$gname= $_POST['gname'];

$id_user=$_POST['id_user'];

$ext=pathinfo($filename, PATHINFO_EXTENSION);
 if(!in_array($ext,$allowed) ) 

{ 

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

}

else{ 

move_uploaded_file( $_FILES['g_img'] ['tmp_name'], $target_file); 

 
 
 


    if($gallery->createGallery($gname, $folder, $id_user,$filename)){
       
       
       header("Location: ../gallery/gallery_page.php?id_user={$_SESSION['user']['id_user']}");
       echo "Success!";
      
     
   
       
     
    }else{
        echo "<div class='alert alert-danger' role='alert'>Unable to create new gallery.</div>";
    }
   
    
   
   }
  }
  ?>
