<?php
class Task{
 
    // database connection and table name
    private $conn;
    private $table_name='task';
 
    // object properties
    public $id_task;
    public $title;
    public $desc;
    public $created;
    public $id_u;
    public $id_todo;
  
    public function __construct($db){
        $this->conn = $db;
    }
    public function CreateTask($title, $desc, $id_u,$id_todo){
        $query = "INSERT INTO `task` ( `title`, `description`, `id_user`, `id_todo`) VALUES ( '$title', '$desc', '$id_u', '$id_todo')";

 
        $stmt = $this->conn->prepare($query);
 
        

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
    public function ListTaskIdtodo(){
        $query = "SELECT   task.id_task,task.title, task.description,task.created,task.id_user, todolist.titlename
        FROM task
        INNER JOIN todolist ON task.id_todo = todolist.id_todo
        WHERE task.id_todo= ?
        "; 
        
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $_GET['id_todo']);
    
    $stmt->execute();
 
    
 
    return $stmt;
    }
    public function CountAllTask(){
        $query = "SELECT id_task FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
        }
    
}