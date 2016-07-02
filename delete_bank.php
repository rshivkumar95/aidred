<?php
//session_start();

require("config.php");


 $data = $coll->remove(array('blood_bank.username' =>  $_SESSION['username']));
//$data = $coll->update(array('blood_donor.connectedbb' =>  $_SESSION['username']),array('$set'=>array('blood_donor.connectedbb'=>"none")));
   $res = $coll->update(array('blood_donor.connectedbb' =>$_SESSION['username']),array('$set'=>array('blood_donor.connectedbb' => "none")));


if($data){

      header("Location: index.php");
           $_SESSION["loggedIn"]=0;
}





?>
