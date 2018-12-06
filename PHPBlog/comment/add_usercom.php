<?php

if($_POST){
  
$id_user = $_POST['id_user'];
$id_blog= $_POST['id_blog'];
$content= $_POST['content'];

if($comment->create($id_user,$id_blog,$content)){
       
       header("Location: ../user/user_page.php?id_user={$id_user}");
       echo "Success!";
      
     
   
       
     
    }else{
        echo "<div class='alert alert-danger' role='alert'>Unable to comment.</div>";
    }
   
    
   
   }
   ?>