<?php


//include "../includes/global.php";
include "Database.php";
class Register
{  //`id`, `name`, `username`, `password`, `adress`, `email`, `image`, `type`
    
    // Register attributes
    private $name;
    private $email;
    private $username;
    private $password;
    private $adress;
   // private $image;
   // private $type = 3;
    private $db;   // Database Object
    
    function __construct($data)
    {
        // is_array validation
        if(is_array($data))        
            $this->setData($data);        
        else        
            throw new Exception("Error: Data must be in an array.");        
        
        // Connect to database
        $this->connectToDb();
        // insert user data
        $this->rgisterUser();
        
    }
    
    private function setData($data)
    {
        $this->name     = $data['name'];
        $this->username = $data['username']; 
        $this->password = $data['password'];
        $this->adress    =$data['adress'];
        $this->email    = $data['email'];
        //$this->image = $data['image'];
        //$this->type = $data['type'];
    
        
    }
    
    private function connectToDb()
    {
        $vars = "../includes/global.php";
      
        $this->db = new Database($vars);
    }
    
    function rgisterUser()
    {
         //`id`, `name`, `username`, `password`, `adress`, `email`, `image`, `type`
        $sql = "INSERT INTO `users` (`id`, `name`, `username`, `password`, `adress` ,`email` ,`image`,`type`)
          VALUES 
            ('','$this->name','$this->username','$this->password','$this->adress','$this->email','','')";
        
        $this->db->conn->exec($sql);
        
        if($sql)    echo"<div style='width:100%; height:50px; background:#008600; color:#fff;'>Registered successfuly</div>";
        else        throw new Exception("Error: not registerd");
        
    }
    function close()
    {
        $this->db->close();
    }
    
}

?>
