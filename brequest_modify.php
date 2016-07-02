<?php
include_once("config.php");	
   if($_SESSION['loggedIn']==0){
        header("Location: login.php");
}
else{
      $_SESSION['loggedIn']=1;


      $data=$coll->find(array('blood_request.username' =>$_SESSION['username']));

foreach($data as $obj)
{
    $pname=$obj['blood_request']['pname'];
    $email=$obj['blood_request']['email'];
    $contact=$obj['blood_request']['contact'];
    $bloodgroup=$obj['blood_request']['bloodgroup'];
    $NoU=$obj['blood_request']['NoU'];
   // $state=$obj['blood_request']['state'];
   // $city=$obj['blood_request']['city'];
    $rdate=$obj['blood_request']['rdate'];
    $ldate=$obj['blood_request']['ldate'];
    $reason=$obj['blood_request']['reason'];
    $reason=$obj['blood_request']['reason'];
    $password=$obj['blood_request']['password'];
    $role=$obj['blood_request']['role'];
}

   if(isset($_POST["submit"]))
  {
try
{
      //,'username' => $_SESSION['username'],'password' => $password,'role' => $role
  
  $res = $coll->update(array('blood_request.username' =>$_SESSION['username']),array('$set'=>array('blood_request.pname' => $_POST['pname'], 'blood_request.email' =>$_POST['email'],'blood_request.contact' => $_POST['contact'],'blood_request.bloodgroup' => $_POST['bloodgroup'],'blood_request.NoU' => $_POST['NoU'],'blood_request.rdate' => $_POST['rdate'],'blood_request.ldate' => $_POST['ldate'],'blood_request.reason' => $_POST['reason'])));
  if($res)
  {
    echo "<script type='text/javascript'>alert('Your details are updated !'); window.location.href='dashboard.php';</script>";  
    // header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
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

                             <form name="brequest" method="POST" class="col s12" action="<?=$_SERVER["PHP_SELF"]; ?>">
                                    <div class="row">

                             <p>* All Fields Are Required </p>
                                      <div class="input-field col s12">
                                        <input name="pname" id="pname" value="<?php echo $pname ?>"  type="text" class="validate" required>
                                        <label for="pname">Patient Name *</label>
                                      </div>
                                    </div> 

                                    <div class="row">
                                      <div class="input-field col s6">
                                        <input name="email" id="email" value="<?php echo $email ?>" type="email" class="validate" required>
                                        <label for="email">Email *</label>
                                      </div>

                                      <div class="input-field col s6">
                                        <input name="contact" id="contact" value="<?php echo $contact ?>" type="number" class="validate" required>
                                        <label for="contact" >Contact *</label>
                                      </div>
                                    </div> 

                                    <div class="row">
                                      <div class="input-field col s6">
                                      <label>Required Blood Group *</label><br><br>
                                      <select name="bloodgroup" class="browser-default" id="bloodgroup" value="<?php echo $bloodgroup ?>" required>
                                         <option value="" disabled selected>Select Required Blood Group</option>
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

                                      <div class="input-field col s6">
                                      <label>Number of Units *</label><br><br>
                                      <select name="NoU" class="browser-default" id="NoU" value="<?php echo $NoU ?>" required>
                                         <option value="" disabled selected>Select Number Of Units</option>
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                         <option value="6">6</option>
                                         <option value="7">7</option>
                                         <option value="8">8</option>
                                         <option value="9">9</option>
                                         <option value="10">10</option>
                                      </select>
                                      </div>
                                    </div>  
        

                                  <!--  <div class="row">
                                      <div class="input-field col s6">
                                      <label>State</label><br><br>
                                      <select name="state" class="browser-default" id="state" value="<?php echo $state ?>">
                                         <option value="" disabled selected>Select Your State</option>
                                         
                                      </select>
                                      </div>

                                      <div class="input-field col s6">
                                      <label>City</label><br><br>
                                      <select name="city" class="browser-default" id="city" value="<?php echo $city ?>">
                                         <option value="" disabled selected>Select Your City</option>
                                         
                                      </select>
                                      </div>
                                    </div>  -->

                                    <div class="row">
                                      <div class="input-field col s6">
                                         <input name="rdate" placeholder="Request Date *" id="rdate" type="date" class="datepicker" value="<?php echo $rdate ?>" required>
                                      </div>

                                      <div class="input-field col s6">
                                        <input name="ldate" placeholder="Last Date *" id="ldate" type="date" class="datepicker" value="<?php echo $ldate ?>" required>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="input-field col s12">
                                        <textarea name="reason" id="reason" value="" class="materialize-textarea"><?php echo $reason ?></textarea>
                                        <label for="reason">Reason For Blood Requirement</label>
                                      </div>
                                    </div>  
      
                                    <div class="row">       
                                       
                                       <div class="input-field col s12" align="center">
                                            <button name="submit" class="waves-effect waves-light btn">Update</button>
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
