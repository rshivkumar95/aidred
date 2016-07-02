<?php
include_once("config.php");	


     
            $result=$coll->find(array('blood_bank.username'=>$_SESSION["username"]));
                          

          foreach($result as $obj)
          {    

?>

<div class="col s12">

<ul class="collection with-header">
        <li class="collection-header"><h4><?php echo $obj['blood_bank']['bname']; ?></h4></li>
        <li class="collection-item"><div>Type of Blood Bank : <?php echo $obj['blood_bank']['type']; ?></div></li>
        <li class="collection-item"><div>Email :<?php echo $obj['blood_bank']['email']; ?></div></li>
        <li class="collection-item"><div>Contact No. :<?php echo $obj['blood_bank']['contact']; ?></div></li>
        <li class="collection-item"><div>State :<?php echo $obj['blood_bank']['state']; ?>&nbsp;&nbsp;&nbsp;City :<?php echo $obj['blood_bank']['city']; ?></div></li>
        <li class="collection-item"><div>Description :<?php echo $obj['blood_bank']['description']; ?></div></li>
       
      </ul>

</div>
<div class="col s12" style="text-align:center;">

<ul class="collection with-header"><b>
        <li class="collection-header"><h4>STOCK DETAILS</h4></li>
        <li class="collection-item"><div class="row"><div class="col s6">A+ : <?php echo $obj['blood_bank']['A+'];?></div><div class="col s6">A- : <?php echo $obj['blood_bank']['A-'];?></div></li>
        <li class="collection-item"><div class="row"><div class="col s6">B+ : <?php echo $obj['blood_bank']['B+'];?></div><div class="col s6">B- : <?php echo $obj['blood_bank']['B-'];?></div></li>
        <li class="collection-item"><div class="row"><div class="col s6">AB+ : <?php echo $obj['blood_bank']['AB+'];?></div><div class="col s6">AB- : <?php echo $obj['blood_bank']['AB-'];?></div></li>
        <li class="collection-item"><div class="row"><div class="col s6">O+ : <?php echo $obj['blood_bank']['O+'];?></div><div class="col s6">O- : <?php echo $obj['blood_bank']['O-'];?></div></li>
        <li class="collection-item"><div class="row"><div class="col s6">Red Cell Concentrate : <?php echo $obj['blood_bank']['rcc'];?></div><div class="col s6">F.F. Plasma : <?php echo $obj['blood_bank']['ffp'];?></div></li>
        <li class="collection-item"><div class="row"><div class="col s6">Total Available Stock : <?php echo $obj['blood_bank']['total'];?></div><div class="col s6">Last Updated On : <?php echo $obj['blood_bank']['sed'];?></div></li>
        </b>
       
      </ul>

</div>

<?php
}
?>

