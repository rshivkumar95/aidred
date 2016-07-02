<?php
  //session_start();
include_once("config.php");
       if(isset($_POST["submit"])) 
     {
          $_SESSION['state']=$_POST["state"];           
          $_SESSION['city']=$_POST["city"];
                         
                        
          
         header("Location: wtw_result.php");
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
           <h5 style="text-align:center;color:#d32f2f;">REQUEST REPORT</h5><hr style="width:10%;color:#ff0000;">
                  
                             <form name="brequestsearch" method="POST" class="col s12" action="<?=$_SERVER["PHP_SELF"]; ?>">


                                <div class="row">
                                        <div class="input-field col s6">
                                          <label for="state">State</label></br></br>
                                          <p>
                                          <select class="browser-default" id="state" name="state">
                                            <option value="" disabled selected>Choose your state</option> 
                                          </select>
                                          </p>
                                        </div>
                                      

                                        <div class="input-field col s6">
                                          <label for="city">City</label></br></br>
                                        <p>
                                          <select class="browser-default" id="city" name="city">
                                            <option value="" disabled selected>Choose your city</option>
                                            
                                          </select>
                                          </p>
                                        </div>
                                    
                                </div>
                                <div class="row">       
         
                                   <div class="input-field col s12" align="center">
                                        <button class="waves-effect waves-light btn" name="submit">Search</button>
                                   </div>
        
                                </div>
                              </form>
     

       <!--<div class="row">
      <div class="col s12" style="padding:20px;">

                                  <?php/*
                                          if(isset($_POST["submit"]))
               {
            
            $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $limit = 12;
            $skip  = ($page - 1) * $limit;
            $next  = ($page + 1);
            $prev  = ($page - 1);
           // $sort  = array('createdAt' => -1);
            $cursor = $coll->find(array('blood_bank.state' =>$_POST['state'],'blood_bank.city' =>$_POST['city']))->skip($skip)->limit($limit);//->sort($sort);
                                                $total=$cursor->count(); 
                                            ?>
            
                                                <ul class="collapsible popout" data-collapsible="accordion">
                                             <?php
                                                if($total > 0)
                                            {     ?><h6>Found Blood bank</h6><?php
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
              echo "<h6><b color='red'>No blood bank found in this area ! Please Register as a Blood Bank ! </b></h6>";
            }
            

             }*/
          ?>

                           
            </ul>
        </div>-->
           
                
       </div>
              </div>

	  </div>

	     


      
     
</div>

        
          
    <br><br><br><br>
      <?php 
        include('resourcesend.php');
      ?>
    
      </body>
  </html>
