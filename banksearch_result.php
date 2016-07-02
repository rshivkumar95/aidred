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
     
           <h5 style="text-align:center;color:#d32f2f;">Blood Bank</h5><hr style="width:10%;color:#ff0000;">
                  
            

       <div class="row">
      <div class="col s12" style="padding:20px;">

          <?php
            
                       $state1=$_SESSION["state"];           
                       $city1=$_SESSION["city"];
                       
           
            
                  $cursor = $coll->find(array('blood_bank.state' =>$state1,'blood_bank.city' =>$city1));
                  $total=$cursor->count(); 
               
                 
                ?>
                  <ul class="collapsible popout" data-collapsible="accordion">
                <?php
                 if($total > 0)
                {     ?><h6>Found Blood bank !!!</h6><br>
                <div class="row">
      <div class="col s8" >    
            <b>State:<? echo $state1 ?></b></div>
                 <div class="col s4" > 
                      <b>City:<? echo $city1 ?></b></div></div>

              <?php
                    foreach ($cursor as $r) { 
            ?>
                 <li>
          <div class="collapsible-header"><b> 
              <?php 
                echo $r['blood_bank']['bname'];
              ?>
                                       </b></div>
                    <div class="collapsible-body" style="padding:10px;">


        <div class="row">      
        <div class="col s12"><b>bank Name :</b> <?php echo $r['blood_bank']['bname']; ?></div>
        </div>
        <div class="row">      
        <div class="col s6"><b>Email :</b> <?php echo $r['blood_bank']['email']; ?></div>
        <div class="col s6"><b>Contact :</b> <?php echo $r['blood_bank']['contact']; ?></div>
        </div>
        <div class="row">      
        <div class="col s6"><b>State :</b> <?php echo $r['blood_bank']['state']; ?></div>
        <div class="col s6"><b>City :</b> <?php echo $r['blood_bank']['city']; ?></div>
        </div>
        <div class="row">      
        <div class="col s6"><b>Blood Bank Type :</b> <?php echo $r['blood_bank']['type']; ?></div>
        <div class="col s6"><b>Discription :</b> <?php echo $r['blood_bank']['description']; ?></div>
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
         
                                   <div class="input-field col s12" align="center">
                                        <a href="banksearch.php" class="waves-effect waves-light btn" >Back</a>
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
