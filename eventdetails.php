
<?php
include_once("config.php");

$msg; 


$result=$coll->find(array('blood_event.username'=>$_SESSION["username"]));
 
foreach($result as $obj)
          {    

 $d1= $obj['blood_event']['date'];
    }
          $date = new DateTime($d1);
          $now = new DateTime();
          if($date>$now)
             {
            $difference= $date->diff($now)->d;
            $difference=$difference+1;
            $msg=$difference.' days are remain for your event';
            }
         else
          {
           $msg="you are done with your event";
          }       
?>

<div class="col s12">

<ul class="collection with-header">
        <li class="collection-header"><h4><?php echo $msg; ?>   </h4></li>
         

  </ul>
</div>
 




<?php     
            $result=$coll->find(array('blood_event.username'=>$_SESSION["username"]));
                          

          foreach($result as $obj)
          {    

?>

<div class="col s12">

<ul class="collection with-header">
        <li class="collection-header"><h4><?php echo $obj['blood_event']['eventname']; ?></h4></li>
        <li class="collection-item"><div>Blood Bank Name : <?php echo $obj['blood_event']['bbname']; ?></div></li>
        <li class="collection-item"><div>Hosted By : <?php echo $obj['blood_event']['hostedby']; ?></div></li>
        <li class="collection-item"><div>Date : <?php echo $obj['blood_event']['date']; ?></div></li>
        <li class="collection-item"><div>Email :<?php echo $obj['blood_event']['email']; ?></div></li>
        <li class="collection-item"><div>Contact No. :<?php echo $obj['blood_event']['contact']; ?></div></li>
        <li class="collection-item"><div>State :<?php echo $obj['blood_event']['state']; ?>&nbsp;&nbsp;&nbsp;City :<?php echo $obj['blood_event']['city']; ?></div></li>       
      </ul>

</div>



<?php

   $yes=intval($obj['blood_event']['attendyes']);
   $no=$obj['blood_event']['attendno'];
   $maybe=$obj['blood_event']['attendmaybe'];
   $total=$yes+$no+$maybe;

   

}
?>

<div class="row" style="padding:50px;">

      <h5 style="color:#000000;text-align:center;">Total <?php echo $total; ?> blood donors are responded to invitation </h5>
       <div class="col s4" style="text-align:center;"><h3 style="color:#000000;"><b><?php echo intval($yes);?></b></h3><h5>YES</h5></div>
       <div class="col s4" style="text-align:center;"><h3 style="color:#000000;"><b><?php echo intval($no);?></b></h3><h5>NO</h5></div>
       <div class="col s4" style="text-align:center;"><h3 style="color:#000000;"><b><?php echo intval($maybe);?></b></h3><h5>MAYBE</h5></div>
       






</div>

<?php



?>

