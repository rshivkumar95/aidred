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
           <h5 style="text-align:center;color:#d32f2f;">Request Search</h5><hr style="width:10%;color:#ff0000;">
                  
            
   <!--<form name="brequestsearch_result" method="POST" action="requestsearch.php">-->
       <div class="row">
      <div class="col s12" style="padding:20px;">

          <?php
            
                       $state1=$_SESSION["state"];           
                       $city1=$_SESSION["city"];
                       
           
            
                  $cursor = $coll->find(array('blood_request.state' =>$state1,'blood_request.city' =>$city1));
                  $total=$cursor->count(); 
                
                     

          foreach($cursor as $obj)
          {    
 
         $d1= $obj['blood_request']['ldate'];
           
          $date = new DateTime($d1);
          $now = new DateTime();
          if($date>$now)

             {

                ?>
              

               <ul class="collapsible popout" data-collapsible="accordion">
                <?php
                       if($total > 0)
                        {     
                ?>
                   
                <h5>Request Found!!!</h5>
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
                     echo $r['blood_request']['pname'];
                ?>
                    </b>
                     </div>
                    <div class="collapsible-body" style="padding:20px;">


                          <div class="row" >      
                          <div class="col s12"><b> Name :</b> <?php echo $r['blood_request']['pname']; ?></div>
                          </div>
                          <div class="row">      
                          <div class="col s6"><b>Email :</b> <?php echo $r['blood_request']['email']; ?></div>
                          <div class="col s6"><b>Contact :</b> <?php echo $r['blood_request']['contact']; ?></div>
                          </div>
                          <div class="row">      
                          <div class="col s6"><b>State :</b> <?php echo $r['blood_request']['state']; ?></div>
                          <div class="col s6"><b>City :</b> <?php echo $r['blood_request']['city']; ?></div>
                          </div>
                          <div class="row">      
                          <div class="col s6"><b>Bloodgroup :</b> <?php echo $r['blood_request']['bloodgroup']; ?></div>
                          <div class="col s6"><b>Last date of donation :</b> <?php echo $r['blood_request']['ldate']; ?></div>
                          </div>
              
                    </div>
                 </li>
                <?php
                   }
                    }                       
                     
                     else{
              echo "<h6><b color='red'>No blood request found in this area !  </b></h6>";
            }  
                 echo "</ul>";
                        }
                   else{
              echo "<h6><b color='red'>No blood request found in this area !  </b></h6>";
            }  
               }   ?>          

                                      <div class="row">
                                          <div class="input-field col s12">  <center>
                                            <a href="requestsearch.php" class="btn waves-effect waves-light">
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
