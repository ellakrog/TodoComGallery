<?php
class Image{
 
    // database connection and table name
    private $conn;
    private $table_name='images';
 
    // object properties
    public $id_img;
    
    public $img_name;
    public $img_folder;
    public $id_user;
    public $picture;
    public $id_g;
    
    public function __construct($db){
        $this->conn = $db;
    }

    function createImage($img_name, $img_folder, $id_user,$picture,$id_g){
        
        //write query
        $query = "INSERT INTO `images` ( `img_name`, `img_folder`,`id_user`,`picture`,`id_g`) 
        VALUES ( '$img_name', '$img_folder', '$id_user','$picture','$id_g')";

 
        $stmt = $this->conn->prepare($query);
       // $this->created = date('Y-m-d H:i:s');
       // $this->image=htmlspecialchars(strip_tags($this->image));
       // $date = new Datetime('now');
       $stmt->bindParam(":picture", $picture);
       
       // $stmt->bindValue(':created',date("Y-m-d H:i:s", time()));

        if($stmt->execute()){
            
            return true;
        }else{
            return false;
        }
 
 
    }
    public function GalleryImages(){

 
       $query = "SELECT  images.id_img, images.id_g,images.img_folder, images.img_name,images.picture, gallery.id_g, gallery.gname
       FROM images
       INNER JOIN gallery ON images.id_g = gallery.id_g
       WHERE images.id_g= ?
       ";  
        
 
  
         $stmt = $this->conn->prepare( $query );
         $stmt->bindParam(1, $_GET['id_g']);
  
         $stmt->execute();
  
  
  
         return $stmt;
        }


      public function CountAllImages(){
        $query = "SELECT id_img FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
        }
 

}