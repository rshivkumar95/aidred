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
           <h4 style="text-align:center;"> FACTS ABOUT BLOOD NEEDS </h4><hr style="width:10%;color:#ff0000;">
               <p style="font-size:20px;margin-right:50px;margin-left:50px;"><ol style="font-size:20px;"><li>Every year our nation requires about 4 Crore units of blood, out of which only a meager 40 Lakh units of blood are available.</li>
            <li>The gift of blood is the gift of life. There is no substitute for human blood.</li>
            <li>Every two seconds someone needs blood.</li>
            <li>More than 38,000 blood donations are needed every day.</li>
            <li>A total of 30 million blood components are transfused each year.</li>
            <li>The average red blood cell transfusion is approximately 3 pints.</li></ol></p> 
      </div>
	  
	  <hr style="width:70%;color:#ff0000;">
	  <div class="row">
	  <div class="col s12" style="background:#b71c1c;padding:50px;" >
       <h4 style="text-align:center;"> FACTS ABOUT BLOOD SUPPLY </h4><hr style="width:10%;color:#ff0000;">
          <p style="font-size:20px;margin-right:50px;margin-left:50px;"><ol style="font-size:20px;"><li>Blood cannot be manufactured – it can only come from generous donors</li>
            <li>Type O-negative blood (red cells) can be transfused to patients of all blood types. It is always in great demand and often in short supply.</li>
            <li>Type AB-positive plasma can be transfused to patients of all other blood types. AB plasma is also usually in short supply.</li>
            </ol></p>
      </div>
	  </div>

	     <hr style="width:70%;color:#ff0000;">

     <div class="row" style="padding:50px;" >
       <h4 style="text-align:center;"> FACTS ABOUT THE BLOOD DONATION PROCESS </h4><hr style="width:10%;color:#ff0000;">
		   <p style="font-size:20px;margin-right:50px;margin-left:50px;"><ol style="font-size:20px;"><li>Donating blood is a safe process. A sterile needle is used only once for each donor and then discarded.</li>
            <li>Blood donation is a simple four-step process: registration, medical history and mini-physical, donation and refreshments.</li>
            <li>Every blood donor is given a mini-physical, checking the donor's temperature, blood pressure, pulse and hemoglobin to ensure it is safe for the donor to give blood.</li>
            <li>The actual blood donation typically takes less than 10-12 minutes. The entire process, from the time you arrive to the time you leave, takes about an hour and 15 min.</li>
            <li>A healthy donor may donate red blood cells every 56 days, or double red cells every 112 days.</li>
            <li>All donated blood is tested for HIV, hepatitis B and C, syphilis and other infectious diseases before it can be transfused to patients.</li></ol></p>
      </div>


      <div class="row">
    <div class="col s12" style="background:#b71c1c;padding:50px;" >
       <h4 style="text-align:center;"> FACTS ABOUT DONORS </h4><hr style="width:10%;color:#ff0000;">
          <p style="font-size:20px;margin-right:50px;margin-left:50px;"><ol style="font-size:20px;"><li>The number one reason donors say they give blood is because they "want to help others."</li>
            <li>Two most common reasons cited by people who don't give blood are: "Never thought about it" and "I don't like needles."</li>
            <li>If you began donating blood at age 18 and donated every 90 days until you reached 60, you would have donated 30 gallons of blood, potentially helping save more than 500 lives!</li>
            <li>Only 7 percent of people in India have O-negative blood type. O-negative blood type donors are universal donors as their blood can be given to people of all blood types.</li>
            <li>Type O-negative blood is needed in emergencies before the patient's blood type is known and with newborns who need blood.</li>
            </ol></p>
      </div>
    </div>
     </div>
     


        
          


      <?php

             include('resourcesend.php');

      ?>
    </body>
  </html>
