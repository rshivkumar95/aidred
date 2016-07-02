<?php
  //session_start();
include_once("config.php");
$res =1;$msg="";
      if(isset($_POST["submit"]))
  {
try
{
    $d1=$_POST['ldate'];
          $date = new DateTime($d1);
          $now = new DateTime();
   if($date>$now)
    {

   $doc=$coll->findOne(array('blood_request.username' =>$_POST['username']));
   $doc2=$coll->findOne(array('blood_donor.username'=>$_POST['username']));
   $doc3=$coll->findOne(array('blood_bank.username'=>$_POST['username']));
   $doc4=$coll->findOne(array('blood_event.username'=>$_POST['username']));
   if(!($doc or $doc2 or $doc3 or $doc4 ))
   {
  
  $res = $coll->insert(array('blood_request'=>array('pname' => $_POST['pname'], 'email' =>$_POST['email'],'contact' => $_POST['contact'],'bloodgroup' => $_POST['bloodgroup'],'NoU' => $_POST['NoU'],'state' => $_POST['state'],'city' => $_POST['city'],'rdate' =>date("y-m-d"),'ldate' => $_POST['ldate'],'reason' => $_POST['reason'],'que'=>$_POST['que'],'ans'=>$_POST['ans'],'username' => $_POST['username'],'password' => $_POST['password'],'donateyes'=>intval(0),'donateno'=>intval(0),'takenfrom'=>[],'respondedto'=>[],'role' =>'request')));
   
  if($res)
  {
         $collection->insert(array('_id'=>$_POST['username'].'yes','seq'=> intval(0)));
         $collection->insert(array('_id'=>$_POST['username'].'no','seq'=> intval(0)));
        echo "<script type='text/javascript'>alert('You are successfully registered | Login to Continue '); window.location.href='login.php';</script>";  
    // header("Location: login.php");
           $_SESSION["loggedIn"]=0;
        }

        }
  else
     {
            $msg="Username already exist!!";
            $res=0;
           }  
   }
else
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
           <h5 style="text-align:center;color:#d32f2f;">Register Your Blood Request</h5><hr style="width:10%;color:#ff0000;">
                      
                             
                   <h6 align="left" id="error" style="color:red;"><? if(!$res):echo $msg; endif; ?></h6>
    <form name="brequest" method="POST" class="col s12" action="<?=$_SERVER["PHP_SELF"]; ?>">
      <div class="row">
        <div class="input-field col s12">
          <input name="pname" id="pname" type="text" class="validate" required>
          <label for="pname">Patient Name *</label>
        </div>
      </div> 

      <div class="row">
        <div class="input-field col s6">
          <input name="email" id="email" type="email" class="validate" required>
          <label for="email">Email *</label>
        </div>

        <div class="input-field col s6">
          <input name="contact" id="contact" type="number" class="validate" required>
          <label for="contact">Contact *</label>
        </div>
      </div> 

      <div class="row">
        <div class="input-field col s6">
        <label>Required Blood Group *</label><br><br>
        <select name="bloodgroup" class="browser-default" id="bloodgroup" required>
           <option value="" disabled selected>Select Required Blood Group *</option>
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
        <select name="NoU" class="browser-default" id="NoU" required>
           <option value="" disabled selected>Select Number Of Units *</option>
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
        

      <div class="row">
        <div class="input-field col s6">
        <label>State</label><br><br>
        <select name="state" class="browser-default" id="state">
           <option value="" disabled selected>Select Your State *</option>
           
        </select>
        </div>

        <div class="input-field col s6">
        <label>City</label><br><br>
        <select name="city" class="browser-default" id="city" >
           <option value="" disabled selected>Select Your City *</option>
           
        </select>
        </div>
      </div>  

      <div class="row">
        

        <div class="input-field col s12">
            <label>Last Date *</label><br><br>
          <input name="ldate" placeholder="Last Date *" id="ldate" type="date" class="datepicker" required>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="reason" id="reason" class="materialize-textarea" required></textarea>
          <label for="reason">Reason For Blood Requirement *</label>
        </div>
      </div>  
      <div class="row">
         <div class="input-field col s6">
                     <label for="security">Select security question *</label><br><br>
                      <select class="browser-default" id="que" name="que" required>
                       <option value="" disabled selected>select any security question</option>
                       <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                       <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
                       <option value="What street did you live on in third grade?">What street did you live on in third grade?</option>
                       <option value="What is your oldest sibling’s birthday month and year?">What is your oldest sibling’s birthday month and year?</option>
                       <option value="In what city or town was your first job?">In what city or town was your first job?</option>
                       <option value="What was the house number and street name you lived in as a child?">What was the house number and street name you lived in as a child?</option>
                       <option value="What were the last four digits of your childhood telephone number?">What were the last four digits of your childhood telephone number?</option>
                       <option value="What primary school did you attend? ">What primary school did you attend? </option>
                     </select>
                  </div></div>
      <div class="row">
      <div class="input-field col s6">
                                      <input  id="ans" name="ans" type="text" class="validate" required>
                                      <label for="ans">Answer for the question *</label>
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
