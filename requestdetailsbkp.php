<?php
include_once("config.php");	


     
            $result=$coll->find(array('blood_request.username'=>$_SESSION["username"]));
                          

          foreach($result as $obj)
          {    

?>

<div class="col s12">

<ul class="collection with-header">
        <li class="collection-header"><h4><?php echo $obj['blood_request']['pname']; ?></h4></li>
        <li class="collection-item"><div>Required Blood Group :<?php echo $obj['blood_request']['bloodgroup']; ?>&nbsp;&nbsp;&nbsp;No. Of Units :<?php echo $obj['blood_request']['NoU']; ?></div></li>
        <li class="collection-item"><div>Last Date : <?php echo $obj['blood_request']['ldate']; ?></div></li>
        <li class="collection-item"><div>Email :<?php echo $obj['blood_request']['email']; ?></div></li>
        <li class="collection-item"><div>Contact No. :<?php echo $obj['blood_request']['contact']; ?></div></li>
        <li class="collection-item"><div>State :<?php echo $obj['blood_request']['state']; ?>&nbsp;&nbsp;&nbsp;City :<?php echo $obj['blood_request']['city']; ?></div></li>
        <li class="collection-item"><div>Reason : <?php echo $obj['blood_request']['reason']; ?></div></li>       
      </ul>

</div>

<?php

   $yes=intval($obj['blood_request']['donateyes']);
   $no=$obj['blood_request']['donateno'];
}
?>


<div class="row" style="padding:50px;">

      
       <div class="col s12" style="text-align:center;"><h3 style="color:#000000;"><b><?php echo intval($yes);?></b></h3><h5>PEOPLES INTERESTED TO DONATE</h5></div>
       
</div>
