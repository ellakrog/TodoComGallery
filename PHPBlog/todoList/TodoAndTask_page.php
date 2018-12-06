<link rel="stylesheet" href="../registration/registration.css" >
<link rel="stylesheet" href="../index/index.css" >

<?php
session_start();
if(isset($_SESSION["user"])){
//$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');

// include database and object files
include_once '../config/database.php';
include_once '../user/user.php';
include_once 'todo.php';
include_once 'task.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$user = new User($db);
$todo =new ToDo($db);
$task = new Task($db);


$page_title = "ToDoList";



$total_rows=$todo->CountAllTodo();
$stmts=$todo->readAllTodo();
?>

<?php
include_once '../index/headerbasic.php';
?>


<div class="page-user">
    <h1><?php echo $_SESSION['user']['name']; ?></h1>
    
</div>


 <?php

 
 include_once '../user/navbar.php';
 
 ?>
 

<div class="todolist" style="width: 70rem; margin-top:80px; position: relative;left: 200px; background-color: #FFFFCC;">
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Created</th>
    </tr>
  </thead>
    <?php

                


    if($total_rows>0){
 
  
 
        while ($row = $stmts->fetch(PDO::FETCH_ASSOC)){
            extract($row);
     
  
            echo" <tbody>";
                echo" <tr>";
                echo" <th scope='row'>$id_todo</th>";
                echo" <td>$titlename</td>";
                echo" <td>$description</td>";
                echo" <td>$created</td>";
                echo "<td><a class='nav-link ' href='../todoList/new_task.php?id_todo={$id_todo}'>New task</a></td>";
                echo" </tr>";
               
            echo" </tbody>";
          
}
        
        }else{
         echo "<div class='alert alert-danger'>No todos found.</div>";
    
    
        }
  ?>
        
          </table>
        </div>

    <div class="addnew" style="width: 50rem; height:23rem; position: relative;left: 360px; padding-top:50px;border-radius: 50px 20px;  background-color: #E5FFCC;">
    <div class="todolist" style="width: 40rem; position: relative;left: 100px; ">
    <?php
    include_once 'add_todoList.php';
    include_once 'formTodoList.php';?>

    </div>
    </div>
        <?php
    }
    ?>