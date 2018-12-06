
<?php

if($_POST){
  
$titlename= $_POST['name'];
$description= $_POST['description'];
$id_user = $_POST['id_user'];

if($todo->CreateToDoList($titlename, $description, $id_user)){
       
       header("Location: ../todoList/TodoAndTask_page.php?id_user={$_SESSION["user"]["id_user"]}");
       echo "Success!";
      
     
   
       
     
    }else{
        echo "<div class='alert alert-danger' role='alert'>Unable to create todo list.</div>";
    }
   
    
   
   }
   ?>