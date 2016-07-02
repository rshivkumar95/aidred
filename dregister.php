<?php
  //session_start();
include_once("config.php");
$res=1;
$msg="";



if(isset($_POST["submit"]))
{

    try
      {
         $doc1=$coll->findOne(array('blood_bank.username'=>$_POST['username']));
         $doc2=$coll->findOne(array('blood_donor.username'=>$_POST['username']));
         $doc3=$coll->findOne(array('blood_request.username'=>$_POST['username']));
         $doc4=$coll->findOne(array('blood_event.username'=>$_POST['username']));
           
           $d1=$_POST['DoB'];
          $date = new DateTime($d1);
          $now = new DateTime();
          //$d2=date("yyyy-mm-dd");
          //$diff=$d1>diff($d2);
          //echo $diff->y;
        //date_diff('yyyy',$d1, $d2);
          $age= $date->diff($now)->y;//format("%d days, %h hours and %i minuts");
		$weight=$_POST['weight'];

          if($age>18 && $age<80 && $date<$now && $weight>50)
          {

        if(!($doc1 or $doc2 or $doc3 or $doc4 ))         
        {
          /*$res = $coll->insert(array('blood_donor'=>array('name' => $_POST['name'], 'email' =>$_POST['email'],'mobileno' => $_POST['mno'],'state' => $_POST['state'],'city' => $_POST['city'],'DoB' => $_POST['DoB'],'bloodgroup' => $_POST['bloodgrp'],'gender' => $_POST['gender'],'username' => $_POST['username'],'password' => $_POST['password'],'que'=>$_POST['que'],'ans'=>$_POST['ans'],'respondedbank'=>[],'respondedrequestyes'=>[],'respondedrequestno'=>[],'respondedrequest'=>[],'role' =>'donor')));*/

        $_SESSION['name']=$_POST['name'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['mno']=$_POST['mno'];
	$_SESSION['state']=$_POST['state'];
	$_SESSION['city']=$_POST['city'];
	$_SESSION['DoB']=$_POST['DoB'];
        $_SESSION['weight']=$_POST['weight'];
	$_SESSION['bloodgrp']=$_POST['bloodgrp'];
	$_SESSION['gender']=$_POST['gender'];
	$_SESSION['username']=$_POST['username'];
	$_SESSION['password']=$_POST['password'];
	$_SESSION['que']=$_POST['que'];
	$_SESSION['ans']=$_POST['ans'];
 
          header("Location: eligible.php");
             
          if($res)
            {
              echo "<script type='text/javascript'>alert('You are successfully registered | Login to Continue '); window.location.href='login.php';</script>";  
              //header("Location: login.php");
              $_SESSION["loggedIn"]=0;
              $_SESSION["whois"]=$_POST['role'];
            }
        }
   
      else
        {
            $res=0;
            $msg="Username already exists";
        }  
      }
      else  {
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
           <h5 style="text-align:center;color:#d32f2f;">Register as Blood Donor</h5><hr style="width:10%;color:#ff0000;">
            <h6 align="left" id="error" style="color:red;"><? if(!$res):echo $msg; endif; ?></h6>
                  <form name="dregister" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
      
                   <div class="row">
                     <p>* All Fields Are Required </p>
                     <div class="input-field col s12">
                       <input id="name" name="name" type="text" class="validate" required>
                       <label for="first_name">Name *</label>
                     </div>
                   </div>
       
                    <div class="row">
                      <div class="input-field col s6">
                         <input id="email" name="email" type="email" class="validate" required>
                         <label for="email">Email *</label>
                      </div>
                      <div class="input-field col s6">
                         <input id="mno" name="mno" type="number" class="validate" required>
                         <label for="mno">Contact Number *</label>
                      </div>
                   </div>


                   <div class="row">
                     <div class="input-field col s6">
                       <label for="state">Select state</label><br><br>
                       <select class="browser-default" id="state" name="state">
                       <option value="" disabled selected >Choose state</option>
                       </select>
                     </div>
                     <div class="input-field col s6">
                       <label for="state">Select city</label><br><br>
                       <select class="browser-default" id="city" name="city">
                       <option value="" disabled selected>Choose city</option>
                       </select>
                     </div>
                 </div>
     
                <div class="row">
                  <div class="input-field col s6">
                     <label for="birthdate">Date of Birth *</label><br> 
                     <input name="DoB" type="date" id="DoB" name="birthdate" class="datepicker" required >
                  </div>

                  
                   <div class="input-field col s6">   
                       <label for="weight">Weight *</label><br>
                         <input id="weight" name="weight" type="number" class="validate" required>
                      </div>
                   </div>
                   <div class="row">
                  <div class="input-field col s6">
                     <label for="state">Select Bloodgroup *</label><br><br>
                      <select class="browser-default" id="bloodgrp" name="bloodgrp" required>
                       <option value="" disabled selected>Choose Blood group</option>
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
                     <div class="input-field col s6">
                      <label>Gender *</label><br>    
                     
                     <input class="with-gap" name="gender" value="male" type="radio" id="male" checked />
                     <label for="male">Male</label>
                
                     
                    <input class="with-gap" name="gender" value="female" type="radio" id="female" />
                     <label for="female">Female</label>
                
                    </div>
  
                </div>



                                       <div class="row">
                         <div class="input-field col s6">
                     <label for="que">Security Question*</label><br><br>
                      <select class="browser-default" id="que" name="que" required>
                       <option value="" disabled selected>Security Question*</option>
                       <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                       <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?

                              </option>
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
                  <input id="username" name="username" type="text" class="validate" required>
                       <label for="username">Username *</label>        
                  </div>  
                 
                  <div class="input-field col s6"> 
                     <input id="password" name="password" type="password" class="validate" required>
                       <label for="password">Password *</label>  
                  </div>
               </div>
   

  
               <div class="row">
                <div class="input-field col s12" align="center">  
                  <button class="btn waves-effect waves-light" type="submit" name="submit">Register</button> 
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
