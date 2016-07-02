<?php
  //session_start();
include_once("config.php");
         
?>

<!DOCTYPE html>
  <html>
    <head>
      <?php
        include('resources.php');
      ?>
    </head>

    <body style="background:url('img/back.jpg');">
  
    
    <?php
        include('navbar.php');
      ?>

  
<div class="container" style="background:#ffffff;margin-top:15px;border-radius: 15px 50px;width:50%;">
      
    
	  <div class="row">
	  <div class="col s12 " style="background:#ffffff;padding:50px;" >
           <h5 style="text-align:center;color:#d32f2f;">Blood Donors</h5><hr style="width:10%;color:#ff0000;">
                  
            

       <div class="row">
      <div class="col s12" style="padding:20px;">

          <?php
            
                       $state1=$_SESSION["state"];           
                       $city1=$_SESSION["city"];
                       $bloodgrp=$_SESSION["bloodgrp"];
           
            
                  $cursor = $coll->find(array('blood_donor.state' =>$state1,'blood_donor.city' =>$city1,'blood_donor.bloodgroup' => $bloodgrp,'blood_donor.candonate' => 'yes'));
                  $total=$cursor->count(); 
               
                 
                ?>
              

               <ul class="collapsible popout" data-collapsible="accordion">
                <?php
                       if($total > 0)
                        {     
                ?>
                   
                <h5>Found Blood donor!!!</h5>
               <div class="row">
      <div class="col s6" >    
            <b>State:<? echo $state1 ?></b></div>
                 <div class="col s4" > 
                      <b>City:<? echo $city1 ?></b></div></div>
               
                <h6 style="text-align:left;"><b>Bloodgroup:<? echo $bloodgrp ?></b></h6> <br>
                <?php
                    foreach ($cursor as $r) { 
                ?>
                 <li>
                    <div class="collapsible-header"><b> 
                <?php 
                     echo $r['blood_donor']['name'];
                ?>
                    </b>
                     </div>
                    <div class="collapsible-body" style="padding:20px;">


                          <div class="row" >      
                          <div class="col s12"><b>Donor Name :</b> <?php echo $r['blood_donor']['name']; ?></div>
                          </div>
                          <div class="row">      
                          <div class="col s6"><b>Email :</b> <?php echo $r['blood_donor']['email']; ?></div>
                          <div class="col s6"><b>Contact :</b> <?php echo $r['blood_donor']['mobileno']; ?></div>
                          </div>
                          <div class="row">      
                          <div class="col s6"><b>State :</b> <?php echo $r['blood_donor']['state']; ?></div>
                          <div class="col s6"><b>City :</b> <?php echo $r['blood_donor']['city']; ?></div>
                          </div>
                          <div class="row">      
                          <div class="col s6"><b>Gender :</b> <?php echo $r['blood_donor']['gender']; ?></div>
                          <div class="col s6"><b>DOB :</b> <?php echo $r['blood_donor']['DoB']; ?></div>
                          </div>
              
                    </div>
                 </li>
                <?php
                   }
                    }                       
                     
                     else{
              echo "<h6><b color='red'>No blood donor found in this area ! Please Register as a Blood Donor ! </b></h6>";
            }  
                 echo "</ul>";
                  ?>          

                   <div class="row">
                                          <div class="input-field col s12">  <center>
                                            <a href="dsearch.php" class="btn waves-effect waves-light">
                                              BACK
                                            </a> </center>
                                          </div>    
                                        </div>
          
                
       </div>
       </div>
     
             
	  </div>	     
</div>

</div>

        
          

      <?php
        include('resourcesend.php');
      ?>
    
      </body>
  </html>
