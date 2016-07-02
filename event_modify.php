<?php
include_once("config.php");
 $res=1; $msg="";	
   if($_SESSION['loggedIn']==0){
        header("Location: login.php");
}
else{
      $_SESSION['loggedIn']=1;


      $data=$coll->find(array('blood_event.username' =>$_SESSION['username']));

        foreach($data as $obj)
        {
            $eventname=$obj['blood_event']['eventname'];
            $bbname=$obj['blood_event']['bbname'];
            $hostedby=$obj['blood_event']['hostedby'];
            $date=$obj['blood_event']['date'];
            $email=$obj['blood_event']['email'];
            $contact=$obj['blood_event']['contact'];
            //$state=$obj['blood_event']['state'];
            //$city=$obj['blood_event']['city'];
            $role=$obj['blood_event']['role'];
        }

       if(isset($_POST["update"]))
        {
            try
            {
      //,'username' => $_SESSION['username'],'password' => $password,'role' => $role
               $d1=$_POST['date'];
                 $date1 = new DateTime($d1);
          $now = new DateTime();
          if($date1>$now)
             {
 
                 $res = $coll->update(array('blood_event.username' =>$_SESSION['username']),array('$set'=>array('blood_event.eventname' => $_POST['eventname'], 'blood_event.bbname' =>$_POST['bbname'],'blood_event.hostedby' => $_POST['hostedby'],'blood_event.date' => $_POST['date'],'blood_event.email' => $_POST['email'],'blood_event.contact' => $_POST['contact'])));
                  if($res)
                  {
                    echo "<script type='text/javascript'>alert('Your details are updated !'); window.location.href='dashboard.php';</script>";  
                    // header("Location: dashboard.php");
                           $_SESSION["loggedIn"]=1;
                  }   
               }else
                 {    
                     $res=0;
                     $msg="invalid date";
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
	 <!-- <div class="col s12 "  >--><a href="dashboard.php"><h5 style="text-align:left;color:rgb(211, 47, 47);"><i class="material-icons">replay</i>  Hello <b><?php echo $_SESSION["username"];?></b></h5></a>
           <h5 style="text-align:center;">DASHBOARD</h5><hr style="width:10%;color:#ff0000;" >
                   <div class="col s6" style="padding:50px;text-align:center;border-right: thin solid #000000;" > 
                      <div class="row">
                         <h6 align="left" id="error" style="color:red;"><? if($res==0):echo $msg; endif; ?></h6>                             
 
                            <form name="event_modify" method="POST" class="col s12" action="<?=$_SERVER["PHP_SELF"]; ?>">
                                        <div class="row">
                                        <p>* All Fields Are Required </p>
                                                 <div class="input-field col s6">
                                                    <input name="eventname" id="eventname" value="<?php echo $eventname ?>" type="text" class="validate" required>
                                                    <label for="eventname">Event Name *</label><br><br>
                                                  </div>

                                                  <div class="input-field col s6">
                                                    <input name="bbname" id="bbname" value="<?php echo $bbname ?>" type="text" class="validate" required>
                                                    <label for="bbname">Blood Bank Name *</label><br><br>
                                                  </div>
                                         </div>
        
                                          <div class="row">         
                                                  <div class="input-field col s6">
                                                    <input name="hostedby" id="hostedby" value="<?php echo $hostedby ?>" type="text" class="validate" required>
                                                    <label for="hostedby">Hosted By *</label>
                                                  </div>

                                                   <div class="input-field col s6">
                                                     <input name="date" placeholder="Date *" id="date" value="<?php echo $date ?>" type="date" class="datepicker" required>
                                                  </div>
           
                                           </div>

                                           <div class="row">
                                                  <div class="input-field col s6">
                                                    <input name="email" id="email" value="<?php echo $email ?>" type="email" class="validate" required>
                                                    <label for="email" data-error="Invalid" data-success="right">Email *</label>
                                                  </div>
                                                  
                                                  <div class="input-field col s6">
                                                    <input name="contact" id="contact" value="<?php echo $contact ?>" type="number" class="validate" required>
                                                    <label for="contact" data-error="Invalid" data-success="right">Contact *</label>
                                                  </div>       
                                          </div>

      

                                        <!--  <div class="row">
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
                                         </div>  -->

    
            
                                          <div class="row">
                                             
                                             
                                             <div class="input-field col s12" align="center">
                                                  <button name="update" class="waves-effect waves-light btn">Update</button>
                                             </div>        
                                            
                                          </div>         
           
                                    </form>


                      </div>
			     </div>
            <div class="col s6" style="">
               <div class="row">
                  <?php
                         if ($_SESSION["role"]=="donor") {
                                 include("donordetails.php");
                          } 
                          elseif ($_SESSION["role"]=="event") {
                                 include("eventdetails.php");
                          } 
                          elseif ($_SESSION["role"]=="bank") {
                                include("bankdetails.php");   
                          } 
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
