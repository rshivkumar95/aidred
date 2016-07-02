 <?php
        include('config.php');
 $res1=1;
$msg1="";


  if(isset($_POST["submit"]))
  {
	
	

     $var=$_SESSION['gender'];
	


    if($_POST["bp1"]<100 && $_POST["bp1"]>50)
     {
       if($_POST["bp2"]<180 && $_POST["bp2"]>80)
        {     
          if(($var=="male" and $_POST["hb"]>13.5) || ($_SESSION['gender']=="female" && $_POST["hb"]>12.5))
           
            
            {
              if($_POST["tmp"]>15 && $_POST["tmp"]<36) 
               {    
              if($_POST["hem"]<38)
               {
                 if(intval($_POST["pulse"])>60 || intval($_POST["pulse"])<100)
                  {
                 
		   if($_POST["medicine"]=="noo")
		   {
			
		    if($_POST["disease"]=="n")
		    {
		      
            if(empty($_POST['dd']))
            {
               $ldate="0000-00-00";
               $candonate="yes";
            }
            else
            {
                //$ldate="0000-00-00";
               //$candonate="yes";
                $date = new DateTime($_POST['dd']);
               $now = new DateTime();
              
            $difference= $date->diff($now)->m;
               //$difference=$difference+1;
                //$msg='Your request will expire in  '   .$difference .    ' days!';
               if($difference < 3)
               {
                   $ldate = new DateTime($_POST['dd']);
                   $candonate="no";
               }
               else
               {
                 $ldate = new DateTime($_POST['dd']);
                   $candonate="yes";
               }
            
            }
           $res = $coll->insert(array('blood_donor'=>array('name' => $_SESSION['name'], 'email' =>$_SESSION['email'],'mobileno' => $_SESSION['mno'],'state' => $_SESSION['state'],'city' => $_SESSION['city'],'DoB' => $_SESSION['DoB'],'weight'=>$_SESSION['weight'],'bloodgroup' => $_SESSION['bloodgrp'],'gender' => $_SESSION['gender'],'username' => $_SESSION['username'],'password' => $_SESSION['password'],'que'=>$_SESSION['que'],'ans'=>$_SESSION['ans'],'BPlow'=>$_POST['bp1'],'BPhigh'=>$_POST['bp2'],'HB'=>$_POST['hb'],'temperature'=>$_POST['tmp'],'hemotocrit'=>$_POST['hem'],'pulse'=>$_POST['pulse'],'medicine'=>$_POST['medicine'],'disease'=>$_POST['disease'],'connectedbb'=>$_POST['connectedbb'],'last_donation'=>$ldate,'respondedbank'=>[],'respondedeventyes'=>[],'respondedeventno'=>[],'respondedeventmaybe'=>[],'respondedrequestyes'=>[],'respondedrequestno'=>[],'respondedrequest'=>[],'donatedto'=>[],'candonate'=>$candonate,'role' =>'donor')));

          if($res)
            {
              echo "<script type='text/javascript'>alert('You are successfully registered | Login to Continue '); window.location.href='login.php';</script>";  
              //header("Location: login.php");
              $_SESSION["loggedIn"]=0;
              $_SESSION["whois"]=$_POST['role'];
                $_SESSION['username']="";
            }
                       



	                    
	    }else{ $res1=0; $msg1="you have disease";}
 	   }else{ $res1=0; $msg1="you are not eligible";}
          }else{ $res1=0; $msg1="your pulse rate should be between 60 to 100";}
         }else{ $res1=0; $msg1="your Hematocrit should be greater than 38";}
        }else{ $res1=0; $msg1="your temperature is not valid";}
       }else{ $res1=0; $msg1="your hb is less ";}       
      }else{ $res1=0; $msg1="your bp is not valid ";}
     }else{ $res1=0; $msg1="your bp is not valid ";}



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
        <h5 style="text-align:center;color:#d32f2f;">Enter your medical information</h5><hr style="width:10%;color:#ff0000;">
            <h6 align="left" id="error" style="color:red;"><? if(!$res1):echo $msg1; endif; ?></h6>
                  <form name="eligible" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
      
                  
                      <div class="row">
                      <div class="input-field col s3">
                       <input id="bp1" name="bp1" type="text" class="validate" required>
                       <label for="bp1">BP low*</label><!--less than 180/100 gt80/50 -->
                     </div>
                   <div class="input-field col s3">
                       <input id="bp2" name="bp2" type="text" class="validate" required>
                       <label for="bp2">BP high*</label><!--less than 180/100 gt80/50 -->
                     </div>
                       <div class="input-field col s6">
                       <input id="hb" name="hb" type="text" class="validate" required>
                       <label for="hb">HB *</label>
                   </div>
       
                    <div class="row">
                      <div class="input-field col s6">
                         <input id="tmp" name="tmp" type="text" class="validate" required>
                         <label for="tmp">Temperature %*</label><!--less than 99.5-->
                      </div>
                      <div class="input-field col s6">
                         <input id="hem" name="hem" type="number" class="validate" required>
                         <label for="hem">Hematocrit *</label><!--at least 38%-->
                      </div>
                   </div>

             
                     <div class="row">
                       <div class="input-field col s6">
                         <input id="pulse" name="pulse" type="number" class="validate" required>
                         <label for="pulse">pulse *</label>
                      </div>
                    
                     <div class="input-field col s6">
                      <label>Are you taking any medicine ?</label><br>    
                     
                     <input class="with-gap" name="medicine" value="yess" type="radio" id="yess" checked />
                     <label for="yess">Yes</label>
                
                     
                    <input class="with-gap" name="medicine" value="noo" type="radio" id="noo" />
                     <label for="noo">No</label>
                
                   
                    </div>
                </div>



                    <div class="input-field col s6">
                      <label>Do you have any disease?</label><br>    
                     
                     <input class="with-gap" name="disease" value="y" type="radio" id="y" checked />
                     <label for="y">Yes</label>
                
                     
                    <input class="with-gap" name="disease" value="n" type="radio" id="n" />
                     <label for="n">No</label>
                
                    </div>
                       <div class="input-field col s6">
                     <label for="birthdate">Your last donation date*</label><br> 
                     <input name="dd" type="date" id="dd" class="datepicker" required >
                  </div>

                </div>  

              
              <div class="row">
               <div class="input-field col s8"  align="center">
                     <label for="connectedbb">Do you want to connect with any blood bank? *</label><br><br>
                      <select class="browser-default" id="connectedbb" name="connectedbb" required>
                       <option value="none">Blood bank</option>
                       <?php  
                 $res=$coll->find(array("blood_bank.state"=>$_SESSION['state'],"blood_bank.city"=>$_SESSION['city'])); 

                 foreach ($res as $obj) {
                   
                 


                 ?>
                       <option value="<?php echo $obj['blood_bank']['username']; ?>"><?php echo $obj['blood_bank']['bname']; ?></option>
                       <?php } ?>
                     </select>
                  </div>
                </div>
                
                  
           


        <div class="row">
                <div class="input-field col s12" align="center">  
                  <button class="btn waves-effect waves-light" type="submit" name="submit">submit</button> 
                </div>    
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
