<?php
include_once("config.php");
$res="";$msg="";	
   if($_SESSION['loggedIn']==0){
        header("Location: login.php");
}
else{
      $_SESSION['loggedIn']=1;


      $data = $coll->find(array('blood_donor.username' =>  $_SESSION['username']));


foreach($data as $obj)
{
    $dname=$obj['blood_donor']['name'];
    $email=$obj['blood_donor']['email'];
    $contact=$obj['blood_donor']['mobileno'];
    //$state=$obj['blood_donor']['state'];
    //$city=$obj['blood_donor']['city'];
    $dob=$obj['blood_donor']['DoB'];
    $bloodgroup=$obj['blood_donor']['bloodgroup'];
    $gender=$obj['blood_donor']['gender'];
    $role=$obj['blood_donor']['role'];
}

   if(isset($_POST["modify"]))
  {
    


try
{
      //,'username' => $_SESSION['username'],'password' => $password,'role' => $role
  
    $d1=$_POST['dob'];
          $date = new DateTime($d1);
          $now = new DateTime();
         
          $age= $date->diff($now)->y;//format("%d days, %h hours and %i minuts");

          if($age>18)
          {

                  $res = $coll->update(array('blood_donor.username' =>$_SESSION['username']),array('$set'=>array('blood_donor.name' => $_POST['name'], 'blood_donor.email' =>$_POST['email'],'blood_donor.mobileno' => $_POST['mno'],'blood_donor.DoB' => $_POST['dob'],'blood_donor.bloodgroup' => $_POST['bloodgrp'],'blood_donor.gender' => $_POST['gender'],'blood_donor.role' =>'donor')));
                  		if($res)
                  		{
                        echo "<script type='text/javascript'>alert('Your details are updated !'); window.location.href='dashboard.php';</script>";	
                           		$_SESSION["loggedIn"]=1;
                              
                               //header("Location: dashboard.php");
                      }
          }
        else
        {
            $res=0;
            $msg="You are not eligible";
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
               <h6 align="left" id="error" style="color:red;"><? if(!$res):echo $msg; endif; ?></h6>            
       <div class="col s6" style="padding:50px;text-align:center;border-right: thin solid #000000;" > 
                      <div class="row">
                              

                        <form name="dmodify" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
      
                         <div class="row">
                         <p>* All Fields Are Required </p>
                           <div class="input-field col s12">
                            <input id="name" name="name" value="<?php echo $dname ?>" type="text" class="validate" required>
                           <label for="first_name">Name *</label>
                             </div>
                         </div>
       
                          <div class="row">
                                <div class="input-field col s6">
                                   <input id="email"  name="email" value="<?php echo $email ?>" type="email" class="validate" required>
                                  <label for="email">Email *</label>
                                </div>
                                  <div class="input-field col s6">
                                  <input id="mno" type="number" name="mno" value="<?php echo $contact ?>" class="validate" required>
                                  <label for="mno">mobile No. *</label>
                              </div>
                          </div>


                           <!--<div class="row">
                             <div class="input-field col s6">
                               <label for="state">Select state</label><br><br>
                               <select class="browser-default" id="state" name="state" value="<?php echo $state ?>">
                               <option value="" disabled selected >Choose state</option>
                               </select>
                             </div>
                             <div class="input-field col s6">
                               <label for="state">Select city</label><br><br>
                               <select class="browser-default" id="city"   name="city" value="<?php echo $city ?>">
                               <option value="" disabled selected>Choose city</option>
                               </select>
                             </div>
                         </div>-->
     
                          <div class="row">
                            <div class="input-field col s6">
                               <label>Select DOB</label><br> 
                               <input type="date" id="dob" name="dob" value="<?php echo $dob ?>" class="datepicker">
                             </div>

                             <div class="input-field col s6">
                               <label for="state">Select Bloodgroup</label><br><br>
                                <select class="browser-default" id="bloodgrp" name="bloodgrp">
                                 <option value="" disabled selected>Choose Blood group</option>
                                <option <?php if($bloodgroup=='A+') echo 'selected'?> value="A+">A+</option>
                                 <option <?php if($bloodgroup=='A-') echo 'selected'?> value="A-">A-</option>
                                 <option <?php if($bloodgroup=='B+'){ echo 'selected';}?> value="B+">B+</option>
                                  <option <?php if($bloodgroup=='B-') echo 'selected'?> value="B-">B-</option>
                                 <option <?php if($bloodgroup=='O+') echo 'selected'?> value="O+">O+</option>
                                  <option <?php if($bloodgroup=='O-') echo 'selected'?> value="O-">O-</option>
                                   <option <?php if($bloodgroup=='AB+') echo 'selected'?> value="AB+">AB+</option>
                             <option <?php if($bloodgroup=='AB-') echo 'selected'?> value="AB-">AB-</option>
                               </select>
                             </div>
                         </div>
   
  
   
                        <div class="row">
                           <div class="input-field col s6">
                              <label>Gender</label><br>    
                               
                             <input class="with-gap" name="gender" value="Male" type="radio" <?php if($gender=='Male'){ echo 'checked';}?> id="male" checked  />
                               <label for="male">Male</label>
                          
                               
                              <input <?php if($gender=='female') echo 'checked'?> class="with-gap" name="gender" value="Female" type="radio" id="female"  />
                              <label for="female">Female</label>
                          
                          </div>
                      
                        </div>
   
  

     
  
                             <div class="row">
                              <div class="input-field col s12 text-center"> 
                                <button class="btn waves-effect waves-light" type="submit" name="modify" id="modify" >
                                  Modify
                               </button> 
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
