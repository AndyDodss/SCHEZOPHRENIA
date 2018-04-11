<?php
include "Database.php";
class addd
{   
    // attributes
 //   private $posa          ;
    private $itemname      ;
    private $itemId        ;
    private $id            ;
    private $amount        ;
    private $price         ;
    private $totalprice    ;
    private $datee         ;
    private $db            ;   // Database Object
    private $newexistMount ;
    private $newsoldMount  ;
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
        $this->addinvoice();
        
    }
      private function connectToDb()
    {
        $vars = "../includes/global.php";

        $this->db=new Database($vars);
    }
        
    private function setData($data)
    {
        $this->itemId     = $data['itemId']     ; 
        $this->amount     = $data['amount']     ;
        $this->datee      = date("Y/m/d")       ;
       
    }
    
    function addinvoice()
    {      $sname  = "SELECT `name` FROM `items`  WHERE `id` = $this->itemId";
           $querry = $this->db->conn->prepare($sname);
           $querry->execute();
           $this->itemname = $querry->fetch();
           $aaa = $this->itemname[0];
           $sprice = "SELECT `unitPrice` FROM `items`  WHERE `id` = $this->itemId" ;
           $querry = $this->db->conn->prepare($sprice);
           $querry->execute();
           $this->price = $querry->fetch();
           $aa = $this->price[0];
           $this->totalprice = $this->price[0] * $this->amount   ;
           $snewexistMount = "SELECT `existMount` FROM `items` WHERE `id`= $this->itemId";
           $quersy = $this->db->conn->prepare($snewexistMount);
           $quersy->execute();
           $this->newexistMount = $quersy->fetch();
           $snewsoldMount  = "SELECT `soldMount` FROM `items` WHERE `id` = $this->itemId";
           $queray = $this->db->conn->prepare($snewsoldMount);
           $queray->execute();
           $this->newsoldMount = $queray->fetch();
            $sql = "INSERT INTO `invoices` (`id`, `itemId`, `unitPrice`, `Mount`, `totalPrice` ,`invoiceDate`)
                    VALUES 
                    ('','$this->itemId','$aa','$this->amount','$this->totalprice','$this->datee')";
            $this->db->conn->exec($sql);
            $nw = $this->newexistMount[0] - $this->amount;
            $ol  = $this->newsoldMount[0]  + $this->amount;
            $sql1 ="UPDATE `items`
                    SET `existMount` = $nw  , `soldMount` = $ol 
                    WHERE `id`=$this->itemId"; 
            $this->db->conn->exec($sql1);
    }

    function close()
    {
        $this->db->close();
    }
    
}

?>