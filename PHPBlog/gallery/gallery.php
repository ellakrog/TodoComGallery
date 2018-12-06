<?php
class Gallery{
 
    // database connection and table name
    private $conn;
    private $table_name='gallery';
 
    // object properties
    public $id_g;
    public $gname;
    public $folder;
    public $id_user;
    public $filename;
    public $g_created;
    
    public function __construct($db){
        $this->conn = $db;
    }

    function createGallery($gname, $folder, $id_user,$filename){
        
        //write query
        $query = "INSERT INTO `gallery` ( `gname`, `g_folder`,`id_user`,`g_img`) 
        VALUES ( '$gname', '$folder', '$id_user','$filename')";

 
        $stmt = $this->conn->prepare($query);
       // $this->created = date('Y-m-d H:i:s');
       // $this->image=htmlspecialchars(strip_tags($this->image));
       // $date = new Datetime('now');
       $stmt->bindParam(":g_img", $filename);
       
       // $stmt->bindValue(':created',date("Y-m-d H:i:s", time()));

        if($stmt->execute()){
            
            return true;
        }else{
            return false;
        }
 
 
    }
    public function userGallery(){
        $query = "SELECT   gallery.id_g, gallery.gname,gallery.g_folder, gallery.id_user,gallery.g_img,users.name
        FROM gallery
        INNER JOIN users ON gallery.id_user = users.id_user 
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

    public function CountAllGallery(){
        $query = "SELECT id_g FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
        }
 


    
    public function OneGallery(){
        $query = "SELECT id_g,gname,g_folder,id_user
        FROM " . $this->table_name . "
        WHERE id_g = ?
        LIMIT 0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $_GET['id_g']);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id_g = $row['id_g'];
    $this->gname = $row['gname'];
    $this->g_folder = $row['g_folder'];
        }
}
   