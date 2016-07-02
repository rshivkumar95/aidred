<?php
session_start();

require("config.php");


 $data = $coll->remove(array('blood_event.username' =>  $_SESSION['username']));
 $res = $collection->remove(array('_id' =>  $_SESSION['username'].'yes'));
 $res = $collection->remove(array('_id' =>  $_SESSION['username'].'no'));
 $res = $collection->remove(array('_id' =>  $_SESSION['username'].'maybe'));


 
if($data){

      header("Location: index.php");
           $_SESSION["loggedIn"]=0;
}





?>
