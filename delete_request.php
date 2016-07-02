<?php
session_start();

require("config.php");


 $data = $coll->remove(array('blood_request.username' =>  $_SESSION['username']));
 $res = $collection->remove(array('_id' =>  $_SESSION['username'].'yes'));
 $res = $collection->remove(array('_id' =>  $_SESSION['username'].'no'));
 

if($data){

      header("Location: index.php");
           $_SESSION["loggedIn"]=0;
}





?>
