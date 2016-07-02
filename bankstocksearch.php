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
           <h5 style="text-align:center;color:#d32f2f;">Search Blood Bank</h5><hr style="width:10%;color:#ff0000;">
                  
                             <form name="brequestsearch" method="POST" class="col s12" action="resultstocksearch.php">


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
     

</div>
</div>

      
     
</div>

        
          

      <?php
        include('resourcesend.php');
      ?>
    
      </body>
  </html>
