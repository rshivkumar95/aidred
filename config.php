<?php
  session_start();
// $_SESSION["loggedIn"]=0;

  error_reporting(0);
  $m    = new MongoClient();
  $db   = $m->maindb;
  //$s   = $db->createCollection("demo");
  $coll = $db->maincoll;
  $collection = $db->counters;

  // global $coll;
	/*$res = $coll->findOne(array('blood_donor.username' => "admin", 'blood_donor.password' => "admin", 'blood_donor.role' => "admin"));
	if(!($res)):
              $res = $coll->insert(array('blood_donor'=>array('username' => "admin", 'password' => "admin", 'role' => "admin")));   
	endif;*/

  function getNextSequence($name){
global $collection;
 
$retval = $collection->findAndModify(
     array('_id' => $name),
     array('$inc' => array("seq" => intval(1))),
     null,
     array(
        "new" => true,
    )
);
return $retval['seq'];
}

 
?>
