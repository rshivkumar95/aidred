<?php
session_start();

require("config.php");


 $data = $coll->remove(array('blood_donor.username' =>  $_SESSION['username']));

if($data){

      header("Location: index.php");
           $_SESSION["loggedIn"]=0;
}





?>
