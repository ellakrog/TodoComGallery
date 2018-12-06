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
$todo = new Todo($db);
$task = new Task($db);


$page_title = "Create tasks";

$id_todo=$todo->id_todo;


$num=$task->CountAllTask();
$stmt=$task->ListTaskIdtodo();



$todo->oneTodo();

include_once '../index/headerbasic.php';

?>


<div class="page-user">
    <h1><?php echo $_SESSION['user']['name']; ?></h1>
    
</div>

<?php
 include_once '../user/navbar.php';
?>

<div class="todolist" style="width: 60rem; margin-top:80px; position: relative;left: 200px;  background-color: #FFFFCC;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Todo List</th>
     
    </tr>
  </thead>
<?php
echo" <tbody>";
echo" <tr>";
echo" <th scope='row'>$todo->id_todo</th>";
echo" <td>$todo->name</td>";
echo" <td>$todo->description</td>";

echo" </tr>";


echo" </tbody>";


?>
</table>
</div>
<div class="todolist" style="width: 57rem;position: relative;left: 250px;  background-color: #FFFFCC;">
<table class="table">
  <thead>
    <tr>
     
      <th scope="col">Zadaci</th>
      
      
    </tr>
  </thead>
<?php

if ($num>0){


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo" <tbody>";
                echo" <tr>";
                echo" <th scope='row'>#</th>";
                echo" <td>$title</td>";
                echo" <td>$description</td>";
               
                echo" </tr>";
               
            echo" </tbody>";
    }
}
?>
</table>
</div>
<div class="tasknew" style="width: 60rem; margin-top:50px; position: relative;left: 200px;  background-color: #FFFFCC;">
<?php


if($_POST){
  
  $title= $_POST['title'];
  $desc= $_POST['desc'];
  $id_u = $_POST['id_u'];
  $id_todo=$_POST['id_t'];
  

if($task->CreateTask($title, $desc, $id_u,$id_todo)){
                   
                   header("Location: ../todoList/new_task.php?id_todo={$id_todo}");
                   echo "Success!";
                  
                 
               
                   
                 
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Unable to create task.</div>";
                }
               
                
               
               }



include_once 'formTask.php';
}
?>
</div>
