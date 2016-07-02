<?php
//session_start();
include_once('config.php');
//$_SESSION["loggedIn"]=0;

?>




<!DOCTYPE html>
  <html>
    <head>
      <?php
        include('resources.php');
      ?>
    </head>

    <body>
  
    
    <?php
        include('navbar.php');
      ?>

  
 



  <div class="slider">
    <ul class="slides">
      <li>
        <img src="img/12.jpg"> <!-- random image -->
        <div class="caption center-align">          
        </div>
      </li>
    </ul>
  </div>



  <div class="container  " style="background:#ffffff;margin-top:15px;border-radius: 15px 50px;">
      
    <!-- <div class="row z-depth-4"> -->
      
           <h4 style="text-align:center;"> DEVELOPERS & DESIGNERS </h4><hr style="width:10%;color:#ff0000;">
             <div class="row" style="text-align:center;"> 
          <div class="col s6 text-center">
                   <img src="img/shiva.jpg" height="200px" width="200px" class="circle responsive-img">
                            <h4>Shivkumar Rathod</h4>
                           <p class="intro">rshivkumar95@gmail.com</p>                           
        </div>
        <div class="col s6 text-center">
                   <img src="img/vivek.jpg" class="circle responsive-img" height="200px" width="200px">
                            <h4>Vivek Patil</h4>
                           <p class="intro">143.vivek.patil@gmail.com</p>                           
        </div>
      </div>
      <div class="row" style="text-align:center;"> 
          <div class="col s6 text-center">
                   <img src="img/sneha.jpg" height="200px" width="200px" class="circle responsive-img">
                            <h4>Sneha Sancheti</h4>
                           <p class="intro">snehasancheti8@gmail.com</p>                           
        </div>
        <div class="col s6 text-center">
                   <img src="img/shivali.jpg" height="200px" width="200px" class="circle responsive-img">
                            <h4>Shivali Narule</h4>
                           <p class="intro">shivalinarule10@gmail.com</p>                           
        </div>
      </div>


     
	  
	 
      
     </div>
     


        
          


      <?php

             include('resourcesend.php');

      ?>
    </body>
  </html>
