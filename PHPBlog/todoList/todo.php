<?php
class ToDo{
 
    // database connection and table name
    private $conn;
    private $table_name='todolist';
 
    // object properties
    public $id_todo;
    public $titlename;
    public $description;
    public $created;
    public $id_user;
   
  
    public function __construct($db){
        $this->conn = $db;
    }

    public function CreateToDoList($titlename, $description, $id_user){
        $query = "INSERT INTO `todolist` ( `titlename`, `description`, `id_user`) VALUES ( '$titlename', '$description', '$id_user')";

 
        $stmt = $this->conn->prepare($query);
 
        

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
    public function readAllTodo(){
        $query = "SELECT   todolist.id_todo,todolist.titlename, todolist.description,todolist.created,todolist.id_user, users.name
        FROM todolist
        INNER JOIN users ON todolist.id_user = users.id_user
        WHERE users.id_user= ?
        "; 
        // $query = "SELECT  blogs.id_blog, blogs.city, blogs.culture,blogs.food, blogs.lenguage, blogs.nightlife, 
        // blogs.education, blogs.people,blogs.id_user,blogs.blog_image,blogs.created, users.name
        // FROM blogs
        // INNER JOIN users ON blogs.id_user = users.id_user 
        // WHERE blogs.id_user= ?
  //  ";  
        
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $_GET['id_user']);
    
    $stmt->execute();
 
       
     
        return $stmt;
    }

    public function CountAllTodo(){
        $query = "SELECT id_todo FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
        }

        public function OneTodo(){
            $query = "SELECT id_todo, titlename,description, created, id_user
            FROM todoList
            
            WHERE id_todo = ?
            ";  
             
      
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $_GET['id_todo']);
    
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $this->id_todo=$row['id_todo'];
        $this->name=$row['titlename'];
        $this->description = $row['description'];
        
        $this->id_user = $row['id_user'];
       
    
            }
}