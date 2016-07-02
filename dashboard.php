<?php
include_once("config.php");	
   if($_SESSION['loggedIn']==0){
        header("Location: login.php");
}
else{
      $_SESSION['loggedIn']=1;
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

  
 




  <div class="container  " style="background:#ffffff;margin-top:15px;border-radius: 15px 50px;">
      
    
	  <div class="row" style="background:#ffffff;padding:50px;">
	 <!-- <div class="col s12 "  >--><h5 style="text-align:left;">Hello <b><?php echo $_SESSION["username"];?></b>,</h5>
           <h5 style="text-align:center;">DASHBOARD</h5><hr style="width:10%;color:#ff0000;">
                   <div class="col s6" style="padding:50px;text-align:center;color:#d32f2f;"> 
                      <div class="row">
                      <?php
                                  
  					
                                           if($_SESSION["role"]=='donor'){
                                                  include("donordashboard.php");
						                                  }
                                           elseif($_SESSION["role"]=="event"){
                                                  include("eventdashboard.php");}
					                                 elseif($_SESSION["role"]=="bank"){
                                                  include("bankdashboard.php");}
					                                 elseif($_SESSION["role"]=="request"){
                                                  include("requestdashboard.php");}

                           
				               ?>
                           </div>
			     </div>
            <div class="col s6" style="border-left: thin solid #000000;">
               <div class="row">
                  <?php
                         if ($_SESSION["role"]=="donor") {
                                 include("donordetails.php");
                          } 
                          elseif ($_SESSION["role"]=="event") {
                                 include("eventdetails.php");
                          } 
                          elseif ($_SESSION["role"]=="bank") {
                                include("bankdetails.php");                          } 
                          elseif ($_SESSION["role"]=="request") {
                                  include("requestdetails.php");        
                          } 



                          
                  ?>
              </div>
      </div>
	  </div>

	     


      
     
</div>

        
          

      <?php
        include('resourcesend.php');
      ?>
    
      </body>
  </html>
