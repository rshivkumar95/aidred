<?php
  //session_start();
include_once("config.php");
 
if(isset($_POST['print']))
{

   $_SESSION['state']=$_POST['state'];
   $_SESSION['city']=$_POST['city'];
   $_SESSION['bloodgroup']=$_POST['bloodgroup'];
   header('Location: dreport.php');

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
           <h5 style="text-align:center;color:#d32f2f;">Blood Donor Directory</h5><hr style="width:10%;color:#ff0000;">
                  
                  <form name="donorreport" method="POST" class="col s12" action="donorreport.php">
     <div class="row">
       <div class="input-field col s6">
        <label for="state">Select state</label><br><br>
        <select class="browser-default" id="state" name="state">
         <option value="" disabled selected >Choose state</option>
        </select>
       </div>
       <div class="input-field col s6">
          <label for="city">Select city</label><br><br>
         <select class="browser-default" id="city" name="city">
         <option value="" disabled selected>Choose city</option>
         </select>
      </div>
     </div>
     
    <div class="row">
       <div class="input-field col s6">
        <label for="bloodgroup">Select Bloodgroup</label><br><br>
         <select class="browser-default" name="bloodgroup" id="bloodgroup">
            <option value="Choose Blood group" selected>Choose Blood group</option>
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
          <button class="btn waves-effect waves-light" type="submit" name="print">
            print
          </button> </center>
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
