 <?php
        include('config.php');
 $res1=1;
$msg1="";
if($_SESSION['loggedIn']==0){
        header("Location: login.php");
}
else{
      $_SESSION['loggedIn']=1;


      $data = $coll->find(array('blood_donor.username' =>  $_SESSION['username']));


foreach($data as $obj)
{
    $gender=$obj['blood_donor']['gender'];
    $BPlow=$obj['blood_donor']['BPlow'];
    $BPhigh=$obj['blood_donor']['BPhigh'];
    $HB=$obj['blood_donor']['HB'];
    $temperature=$obj['blood_donor']['temperature'];
    $hemotocrit=$obj['blood_donor']['hemotocrit'];
    $pulse=$obj['blood_donor']['pulse'];
    $medicine=$obj['blood_donor']['medicine'];
    $disease=$obj['blood_donor']['disease'];
   // $last_donation=$obj['blood_donor']['last_donation'];
    $role=$obj['blood_donor']['role'];
    $connectedbb=$obj['blood_donor']['connectedbb'];
    $state=$obj['blood_donor']['state'];
    $city=$obj['blood_donor']['city'];
}


  if(isset($_POST["submit"]))
  {
	
	try
  {

                    
	


    if($_POST["bp1"]<100 && $_POST["bp1"]>50)
     {
       if($_POST["bp2"]<180 && $_POST["bp2"]>80)
        {     
          if($_POST["hb"]>13)            
            
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
		      


          //  if(empty($_POST['dd']))
            //{
              // $ldate="0000-00-00";
             /*  $candonate="yes";
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
            
            }*/

             $res = $coll->update(array('blood_donor.username' =>$_SESSION['username']),array('$set'=>array('blood_donor.BPlow' => $_POST['bp1'], 'blood_donor.BPhigh' =>$_POST['bp2'],'blood_donor.HB' => $_POST['hb'],'blood_donor.temperature' => $_POST['tmp'],'blood_donor.hemotocrit' => $_POST['hem'],'blood_donor.pulse' => $_POST['pulse'],'blood_donor.medicine' => $_POST['medicine'],'blood_donor.disease' => $_POST['disease'],'blood_donor.connectedbb'=> $_POST['connectedbb'],'blood_donor.role' =>'donor')));
          if($res)
                      {
                        echo "<script type='text/javascript'>alert('Your details are updated !'); window.location.href='dashboard.php';</script>";  
                              $_SESSION["loggedIn"]=1;
                              
                               //header("Location: dashboard.php");
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
               <h6 align="left" id="error" style="color:red;"><? if(!$res1):echo $msg1; endif; ?></h6>            
       <div class="col s6" style="padding:50px;text-align:center;border-right: thin solid #000000;" > 
                      <div class="row">
                  <form name="eligible" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
      
                  
                      <div class="row">
                      <div class="input-field col s3">
                       <input id="bp1" name="bp1" type="text" class="validate" value="<?php echo $BPlow ?>" required>
                       <label for="bp1">BP low*</label><!--less than 180/100 gt80/50 -->
                     </div>

                   <div class="input-field col s3">
                       <input id="bp2" name="bp2" type="text" class="validate" value="<?php echo $BPhigh ?>" required>
                       <label for="bp2">BP high*</label><!--less than 180/100 gt80/50 -->
                     </div>
                       <div class="input-field col s6">
                       <input id="hb" name="hb" type="text" class="validate" value="<?php echo $HB ?>" required>
                       <label for="hb">HB *</label>
                   </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                         <input id="tmp" name="tmp" type="text" class="validate" value="<?php echo $temperature ?>" required>
                         <label for="tmp">Temperature %*</label><!--less than 99.5-->
                      </div>
                      <div class="input-field col s6">
                         <input id="hem" name="hem" type="number" class="validate" value="<?php echo $hemotocrit ?>" required>
                         <label for="hem">Hematocrit *</label><!--at least 38%-->
                      </div>
                   </div>

             
                     <div class="row">
                       <div class="input-field col s6">
                         <input id="pulse" name="pulse" type="number" class="validate" value="<?php echo $pulse ?>" required>
                         <label for="pulse">pulse *</label>
                      </div>
                    
                     <div class="input-field col s6">
                      <label>Are you taking any medicine ?</label><br>    
                     
                     <input class="with-gap" name="medicine" value="yess" type="radio" <?php if($medicine=='yess') echo 'checked'; ?> id="yess" checked />
                     <label for="yess">Yes</label>
                
                     
                    <input class="with-gap" name="medicine" value="noo" type="radio" <?php if($medicine=='noo') echo 'checked'; ?> id="noo" />
                     <label for="noo">No</label>
                
                   
                    </div>
                </div>

                  <div class="row">

                    <div class="input-field col s6">
                      <label>Do you have any disease?</label><br>    
                     
                     <input class="with-gap" name="disease" value="y" type="radio" <?php if($disease=='y') echo 'checked'; ?> id="y" checked />
                     <label for="y">Yes</label>
                
                     
                    <input class="with-gap" name="disease" value="n" type="radio" <?php if($disease=='n') echo 'checked'; ?> id="n" />
                     <label for="n">No</label>
                
                    </div>
                     <!--  <div class="input-field col s6">
                     <label for="birthdate">Your last donation date*</label><br> 
                     <input name="dd" type="date" id="dd" value="<?php echo $last_donation ?>" class="datepicker" required >
                  </div>-->

                </div>  

            
              <div class="row">
               <div class="input-field col s12"  align="center">
                     <label for="connectedbb">Do you want to connect with any blood bank? *</label><br><br>
                      <select class="browser-default" id="connectedbb" name="connectedbb" required>
                       <option value="none">Blood bank</option>
                       <?php  
                 $res=$coll->find(array("blood_bank.state"=>$state,"blood_bank.city"=>$city)); 

                 foreach ($res as $obj) {
                   
                 


                 ?>
                       <option value="<?php echo $obj['blood_bank']['username']; ?>" <?php if($obj['blood_bank']['username']==$connectedbb) echo "selected";?>><?php echo $obj['blood_bank']['bname']; ?></option>
                       <?php } ?>
                     </select>
                  </div>
                </div>
                
                 
           


        <div class="row">
                <div class="input-field col s12" align="center">  
                  <button class="btn waves-effect waves-light" type="submit" name="submit">Modify</button> 
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
