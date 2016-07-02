<?php
  //session_start();
include_once("config.php");
$res=1;$msg="";
if(isset($_POST["submit"]))
{
try
{
         $doc1=$coll->findOne(array('blood_bank.username'=>$_POST['username']));
         $doc2=$coll->findOne(array('blood_donor.username'=>$_POST['username']));
          $doc3=$coll->findOne(array('blood_request.username'=>$_POST['username']));
          $doc4=$coll->findOne(array('blood_event.username'=>$_POST['username']));

        
             $d1=$_POST['date'];
          $date = new DateTime($d1);
          $now = new DateTime();
          //$d2=date("yyyy-mm-dd");
          //$diff=$d1>diff($d2);
          //echo $diff->y;
        //date_diff('yyyy',$d1, $d2);
          //$age= $date->diff($now)->y;//format("%d days, %h hours and %i minuts");
		//$weight=$_POST['weight'];



      if($date>$now)
       {
    if(!($doc1 or $doc2 or $doc3 or $doc4 )) 
  {

  			$res = $coll->insert(array('blood_event'=>array('eventname' => $_POST['eventname'], 'bbname' =>$_POST['bbname'],'hostedby' => $_POST['hostedby'],'date' => $_POST['date'],'email' => $_POST['email'],'contact' => $_POST['contact'],'state' => $_POST['state'],'city' => $_POST['city'],'username' => $_POST['username'],'password' => $_POST['password'],'que'=>$_POST['que'],'ans'=>$_POST['ans'],'attendyes'=>intval(0),'attendno'=>intval(0),'attendmaybe'=>intval(0),'takenfrom'=>[],'respondedto'=>[],'role' =>'event')));
  
		if($res)
		{
        $collection->insert(array('_id'=>$_POST['username'].'yes','seq'=> intval(0)));
        $collection->insert(array('_id'=>$_POST['username'].'no','seq'=> intval(0)));
        $collection->insert(array('_id'=>$_POST['username'].'maybe','seq'=> intval(0)));
         echo "<script type='text/javascript'>alert('You are successfully registered | Login to Continue '); window.location.href='login.php';</script>";  
         // header("Location: login.php");
           $_SESSION["loggedIn"]=0;
           $_SESSION["whois"]=$_POST['role'];
        }
        
        }
           else
        {
            $res=0;
            $msg="Alredy exist";
        }
       }  
         else
        {
            $res=0;
             $msg="Invalid date";
        }
 
          
}
catch (MongoConnectionException $e)
{
  //if there was an error,we catch and display the problem here
  echo $e->getMessage();
}

catch (MongoException $e)
{

  echo $e->getMessage();
}
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

  
 




  <div class="container  " style="background:#ffffff;margin-top:15px;border-radius: 15px 50px;width:50%;">
      
    
	  <div class="row">
	  <div class="col s12 " style="background:#ffffff;padding:50px;" >
           <h5 style="text-align:center;color:#d32f2f;">Register Your Blood Donation Event</h5><hr style="width:10%;color:#ff0000;">
                      
                             
          <h6 align="left" id="error" style="color:red;"><? if($res==0):echo $msg ; endif; ?></h6>
        <form name="event_regi" method="POST" class="col s12" action="<?=$_SERVER["PHP_SELF"]; ?>">
             <div class="row">
              <p>* All Fields Are Required </p>
              <div class="input-field col s6">
                <input name="eventname" id="eventname" type="text" class="validate" required>
                <label for="eventname">Event Name *</label>
              </div>
              
              <div class="input-field col s6">
                <input name="bbname" id="bbname" type="text" class="validate" required>
                <label for="bbname">Blood Bank Name *</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input name="hostedby" id="hostedby" type="text" class="validate" required>
                <label for="hostedby">Hosted By *</label>
              </div>

              <div class="input-field col s6">
                 <input name="date" placeholder="date *" id="date" type="date" class="datepicker" style="color:black;" required>
                 
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input name="email" id="email" type="email" class="validate" required>
                <label for="email" >Email *</label>
              </div>

              <div class="input-field col s6">
                <input  name="contact" id="contact" type="number" class="validate" required>
                <label for="contact" >Contact *</label>
              </div>
            </div> 

        

            <div class="row">
              <div class="input-field col s6">
              <label>State *</label><br><br>
              <select name="state" class="browser-default" id="state">
                 <option value="" disabled selected>Select Your State</option>
                 
              </select>
              </div>

              <div class="input-field col s6">
              <label>City *</label><br><br>
              <select name="city" class="browser-default" id="city">
                 <option value="" disabled selected>Select Your City</option>
                 
              </select>
              </div>
            </div>  

                         <div class="row">
                         <div class="input-field col s6">
                     <label for="que">Security Question*</label><br><br>
                      <select class="browser-default" id="que" name="que" required>
                       <option value="" disabled selected>Security Question*</option>
                       <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                       <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
                       <option value="What street did you live on in third grade?">What street did you live on in third grade?</option>
                       <option value="What is your oldest sibling’s birthday month and year?">What is your oldest sibling’s birthday month and year?</option>
                       <option value="In what city or town was your first job?">In what city or town was your first job?</option>
                       <option value="What was the house number and street name you lived in as a child?">What was the house number and street name you lived in as a child?</option>
                       <option value="What were the last four digits of your childhood telephone number?">What were the last four digits of your childhood telephone number?</option>
                       <option value="What primary school did you attend?">What primary school did you attend? </option>
                     </select>
                  </div><br><br>
                       <div class="input-field col s6">
                       <input id="ans" name="ans" type="password" class="validate" required>
                       <label for="ans">Your Answer*</label>
                     </div>
                </div>
   
     

            <div class="row">
              <div class="input-field col s6">
                <input name="username" id="username" type="text" class="validate" required>
                <label for="username">Username *</label>
              </div>
              
              <div class="input-field col s6">
                <input name="password" id="password" type="password" class="validate" required>
                <label for="password">Password *</label>
              </div>
            </div>
      
            <div class="row">       
               
               <div class="input-field col s12" align="center">
                    <button name="submit" class="waves-effect waves-light btn">Submit</button>
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
