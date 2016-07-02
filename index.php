<?php
//session_start();
include_once('config.php');
$_SESSION["loggedIn"]=0;

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
        <img src="img/1.png"> <!-- random image -->
        <div class="caption center-align">
          <h1 style="color:#000000;">Blood Donation will cost you nothing but it will save a life!</h1>
          
        </div>
      </li>
      <li>
        <img src="img/4.png"> <!-- random image -->
        <div class="caption left-align">
          <h1 style="color:#000000;">Five minutes of your time + 350 ml. of your blood = One life saved.</h1>
          
        </div>
      </li>
      <li>
        <img src="img/06.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h1 style="color:#000000;">The finest gesture one can make is to save life by donating Blood.</h1>
          
        </div>
      </li>
      <li>
        <img src="img/10.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h1 style="color:#ffffff;">Spare only 15 minutes and save one life.</h1>
        </div>
      </li>
    </ul>
  </div>



  <div class="container  " style="background:#ffffff;margin-top:15px;border-radius: 15px 50px">
      
    <!-- <div class="row z-depth-4"> -->
      <div class="col s12" style="" >
           <h4 style="text-align:center;"> ABOUT AIDRED </h4><hr style="width:10%;color:#ff0000;">
          <img src="img/logo.png" style="float:left;margin:10px" />
               <p style="font-size:16px;margin-right:50px;margin-left:50px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you at anytime witnessed a relative of yours or a close friend searching frantically for a blood donor, when blood banks say out of stock, the donors in mind are out of reach and the time keeps ticking? Have you witnessed loss of life for the only reason that a donor was not available at the most needed hour? Is it something that we as a society can do nothing to prevent? This thought laid our foundation.<br><br>
"AidRed" is an organization that brings voluntary blood donors and those in need of blood on to a common platform. Through this website, we seek donors who are willing to donate blood, as well as provide the timeliest support to those in frantic need of it.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aidred is a Web Portal developed by engineering students. AidRed  will be responsible to Spread the word about blood donation, inform your friends, get people involved and help to save lives!</p> 
      </div>
	  
	  <hr style="width:70%;color:#ff0000;">
	  <div class="row">
	  <div class="col s12" style="background:#b71c1c;padding:50px;" >
           <h5 style="text-align:center;color:#ffffff;">A huge thank you to everyone who joined in AidRed.</h5><hr style="width:10%;color:#ff0000;">
          
          <div class="col s3" style="text-align:center;"><h1 style="color:#ffffff;"><b><?php echo $coll->count(array('blood_donor.role'=>array('$exists'=>true)));?></b></h1><h5>DONOR</h5></div>
       <div class="col s3" style="text-align:center;"><h1 style="color:#ffffff;"><b><?php echo $coll->count(array('blood_bank.role'=>array('$exists'=>true)));?></b></h1><h5>BLOODBANKS</h5></div>
       <div class="col s3" style="text-align:center;"><h1 style="color:#ffffff;"><b><?php echo $coll->count(array('blood_event.role'=>array('$exists'=>true)));?></b></h1><h5>EVENTS</h5></div>
       <div class="col s3" style="text-align:center;"><h1 style="color:#ffffff;"><b><?php echo $coll->count(array('blood_request.role'=>array('$exists'=>true)));?></b></h1><h5>REQUEST</h5></div>
     
      </div>
	  </div>

	     <hr style="width:70%;color:#ff0000;">

     <div class="row" style="padding:50px;" >
           <h4 style="text-align:center;"> WHAT YOU WILL DO ?</h4><hr style="width:10%;color:#ff0000;">
		   <div class="row">
         <!-- <img src="img/what-we-do.jpg" style="float:right;margin:10px;width:30%;height:30%;border-radius: 15px 50px"  />-->
             <div class="col s4" style="text-align:center;"><i class="medium material-icons" style="color:#d32f2f;">perm_identity</i><h5>REGISTER YOURSELF</h5><p style="margin:20px;">Register yourself on www.aidred.com in form of Donor, Blood Bank, Request or Blood Event</p></div>
			 <div class="col s4" style="text-align:center;"><i class="medium material-icons" style="color:#d32f2f;">search</i><h5>PEOPLE WILL SEARCH YOU</h5><p style="margin:20px;">People will search you on www.aidred.com</p></div>
			 <div class="col s4" style="text-align:center;"><i class="medium material-icons" style="color:#d32f2f;">perm_phone_msg</i><h5>CONTACT YOU</h5><p style="margin:20px;">People will contact you personally.</p></div>
			 </div>
      </div>


      
     </div>
     


        
          


      <?php

             include('resourcesend.php');

      ?>
    </body>
  </html>
