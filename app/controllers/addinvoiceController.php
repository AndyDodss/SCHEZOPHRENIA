<?php
include "../models/Addinvoice.php";
if ($_POST) {
    if (isset($_POST["SUBMIT"]) AND $_POST["SUBMIT"] == "submit") {
         $data["itemId"]=$_POST["itemID"];
         $data["amount"]=$_POST["Amount"];
         
     try {
            new addd($data);
            
    } catch (Exception $exc) {
            echo $exc->getMessage();
          }
    }
}
 else {
   include "../views/employee/Addinvoice.php";
}
?>