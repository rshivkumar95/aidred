<?php
  //session_start();
    
include_once("config.php");
    if(isset($_POST["submit"])) 
     {
          $_SESSION['state']=$_POST["state"];           
                        $_SESSION['city']=$_POST["city"];
                         $_SESSION['bloodgrp']=$_POST["bloodgrp"];
                        
          
         header("Location: dsearch_result.php");
       }
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
           <h5 style="text-align:center;color:#d32f2f;">Search Blood Donor</h5><hr style="width:10%;color:#ff0000;">
                  
                  <form name="donorsearch" method="POST" class="col s12" action="<?=$_SERVER["PHP_SELF"]; ?>">
     <div class="row">
       <div class="input-field col s6">
        <label for="state">Select state</label><br><br>
        <select class="browser-default" id="state" name="state">
         <option value="" disabled selected >Choose state</option>
        </select>
       </div>
       <div class="input-field col s6">
          <label for="state">Select city</label><br><br>
         <select class="browser-default" id="city" name="city">
         <option value="" disabled selected>Choose city</option>
         </select>
      </div>
     </div>
     
    <div class="row">
       <div class="input-field col s6">
        <label for="bloodgrp">Select Bloodgroup</label><br><br>
         <select class="browser-default" name="bloodgrp" id="bloodgrp">
            <option value="" disabled selected>Choose Blood group</option>
          <option value="A+">A+</option>
           <option value="A-">A-</option>
           <option value="B+">B+</option>
       <option value="B-">B-</option>
           <option value="O+">O+</option>
            <option value="O-">O-</option>
             <option value="AB+">AB+</option>
       <option value="AB-">AB-</option>
         </select>
       </div>
    </div>
    


     <div class="row">
        <div class="input-field col s12">  <center>
          <button class="btn waves-effect waves-light" type="submit" name="submit">
            search
          </button> </center>
        </div>    
      </div>

     </form>
     

       <!--<div class="row">
      <div class="col s12" style="padding:20px;">

          <?php
              if(isset($_POST["submit"]))
               {
            
                  $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                  $limit = 12;
                  $skip  = ($page - 1) * $limit;
                  $next  = ($page + 1);
                  $prev  = ($page - 1);
                  //$sort  = array('createdAt' => -1);
                  $cursor = $coll->find(array('blood_donor.state' =>$_POST['state'],'blood_donor.city' =>$_POST['city']))->skip($skip)->limit($limit);//->sort($sort);
                  $total=$cursor->count(); 
                ?>
            
                <ul class="collapsible popout" data-collapsible="accordion">
                <?php
                       if($total > 0)
                        {     
                ?>
                <h6>Found Blood donor</h6>
                <?php
                    foreach ($cursor as $r) { 
                ?>
                 <li>
                    <div class="collapsible-header"><b> 
                <?php 
                     echo $r['blood_donor']['name'];
                ?>
                    </b></div>
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
                                             
                     echo "</ul>";                             

            if($page > 1){
                      echo '<a href="?page=' . $prev . '">Previous</a>';
                      if($page * $limit < $total) {
                        echo ' <a href="?page=' . $next . '">Next</a>';
                      }
                  } else {
                      if($page * $limit < $total) {
                    echo ' <a href="?page=' . $next . '">Next</a>';
                      }
                  }   
                }
            else{
              echo "<h6><b color='red'>No blood donor found in this area ! Please Register as a Blood Donor ! </b></h6>";
            }
            

             }
          ?>

                           
            </ul>

           
                
       </div>-->
              </div>

	  </div>

	     
</div>

      
     
</div>

        
          

      <?php
        include('resourcesend.php');
      ?>
    
      </body>
  </html>
