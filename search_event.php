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

  
 




  <div class="container" style="background:#ffffff;margin-top:15px;width:50%;">
      
    
	  <div class="row">
	  <div class="col s12 " style="background:#ffffff;padding:50px;" >
           <h5 style="text-align:center;color:#d32f2f;">Search Blood Event</h5><hr style="width:10%;color:#ff0000;">
                  

                                         <form name="brequestsearch" method="POST" class="col s12" action="<?=$_SERVER["PHP_SELF"]; ?>">  

   
                                         <div class="row">
                                                <div class="input-field col s6">
                                                <label>State</label><br><br>
                                                <select class="browser-default" id="state" name="state">
                                                   <option value="" disabled selected>Select Your State</option>           
                                                </select>
                                                </div>

                                                <div class="input-field col s6">
                                                <label>City</label><br><br>
                                                <select class="browser-default" id="city" name="city">
                                                   <option value="" disabled selected>Select Your City</option>           
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
                          

       <div class="row">
      <div class="col s12" style="background:#ffffff;padding:50px;">

                                  <?php
                                          if(isset($_POST["submit"]))
                                            {
            
                                                  $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                                                  $limit = 12;
                                                  $skip  = ($page - 1) * $limit;
                                                  $next  = ($page + 1);
                                                  $prev  = ($page - 1);
                                                  $sort  = array('createdAt' => -1);
                                                  $cursor = $coll->find(array('blood_event.state' =>$_POST['state'],'blood_event.city' =>$_POST['city']))->skip($skip)->limit($limit)->sort($sort);
                                                $total=$cursor->count(); 
                                  ?>
            
                                  <ul class="collapsible popout" data-collapsible="accordion">
                                  <?php
                                                if($total > 0)
                                                  {     
                                  ?><h6>Found Blood event</h6><?php
                                                  foreach ($cursor as $r) { 
                                                  ?>
                          <li>
                                  <div class="collapsible-header"><b> 
                                    <?php 
                                      echo $r['blood_event']['eventname'];
                                    ?>
                                               </b>
                                  </div>
                                  <div class="collapsible-body" style="padding:10px;">


                                        <div class="row">      
                                        <div class="col s12"><b>Event Name :</b> <?php echo $r['blood_event']['eventname']; ?></div>
                                        </div>
                                        <div class="row">      
                                        <div class="col s6"><b>Blood bank name :</b> <?php echo $r['blood_event']['bbname']; ?></div>
                                        <div class="col s6"><b>Contact :</b> <?php echo $r['blood_event']['contact']; ?></div>
                                        </div>
                                        <div class="row">      
                                        <div class="col s6"><b>Hosted By :</b> <?php echo $r['blood_event']['hostedby']; ?></div>
                                        <div class="col s6"><b>Date :</b> <?php echo $r['blood_event']['date']; ?></div>
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
                                                echo "<h6><b color='red'>No blood event found in this area ! Please Register as a Blood event ! </b></h6>";
                                              }
                                              

                                               }
                                             ?>

                           
                                </ul>
        
                
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
