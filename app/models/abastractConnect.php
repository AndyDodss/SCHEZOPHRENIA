<?php


class abastractConnect {  
    
    //class attr
    protected $db;  // databse object => connection to Mysql
    
    
    //class methods or functions
    function connectToDb()
    {
        //require_once MODELS.'Database.php';
        $vars = "../includes/global.php";
        $this->db = new Database($vars);
    }
    
    function close()
    {
        $this->db->close();
    }
    
}


