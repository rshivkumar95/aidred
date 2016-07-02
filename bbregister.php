<?php
  //session_start();
include_once("config.php");
$res=1;
if(isset($_POST["submit"])):
  {
try
{
    $doc1=$coll->findOne(array('blood_bank.username'=>$_POST['username']));
    $doc2=$coll->findOne(array('blood_donor.username'=>$_POST['username']));
    $doc3=$coll->findOne(array('blood_request.username'=>$_POST['username']));
    $doc4=$coll->findOne(array('blood_event.username'=>$_POST['username']));
    if(!($doc1 or $doc2 or $doc3 or $doc4)) 
    {
      $res = $coll->insert(array('blood_bank'=>array('bname' => $_POST['bname'], 'type' =>$_POST['group1'],'email' => $_POST['email'],'state' => $_POST['state'],'city' => $_POST['city'],'description' => $_POST['desc'],'contact' => $_POST['bcontact'],'que'=> $_POST['que'],'ans'=>$_POST['ans'],'username' => $_POST['username'],'password' => $_POST['password'],'A+'=>0,'A-'=>0,'AB+'=>0,'AB-'=>0,'B+'=>0,'B-'=>0,'O-'=>0,'O+'=>0,'rcc'=>0,'ffp'=>0,'total'=>0,'sed'=>date("y-m-d"),'requestedto'=>[],'accepted'=>[],'role' =>'bank')));
      if($res):
           echo "<script type='text/javascript'>alert('You are successfully registered | Login to Continue '); window.location.href='login.php';</script>";  
            // header("Location: login.php");
           $_SESSION["loggedIn"]=0;
            // $_SESSION["whois"]=$_POST['role'];
        

        endif;
    }
   else
    {
      $res=0;
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
endif;

         
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
           <h5 style="text-align:center;color:#d32f2f;">Register Your Blood Bank</h5><hr style="width:10%;color:#ff0000;">
                      <h6 align="left" id="error" style="color:red;"><? if(!$res):echo "Username already exists"; endif; ?></h6>
                             <form name="bbregister" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
    
                              <div class="row">
				<p>* All Fields Are Required </p>
                                <div class="input-field col s12">
                                  <input  id="bname" name="bname" type="text" class="validate" required>
                                  <label for="bname">Name of Blood Bank *</label>
                                </div>
                              </div>

                              <div class="row">
                              <div class="input-field col s12">
                              <label for="type">Enter type of blood bank *</label></br></br>
                              
                                    <input class="with-gap" name="group1" value="Government" type="radio" id="test1" checked required/>
                                    <label for="test1">Government</label>
                             
                                      <input class="with-gap" name="group1" value="private" type="radio" id="test2" required/>
                                           <label for="test2">Private</label>
                                    
                              
                                </div>
                              </div>   
      
                              <div class="row">
                                    <div class="input-field col s12">
                                       <input id="email" name="email" type="email" class="validate" required>
                                        <label for="email">Email *</label>
                                    </div>
                              </div>
                              <div class="row">
                                   <div class="input-field col s6">
                                      <label for="state">State</label></br></br>  
                                       <select class="browser-default" id="state" name="state"></select>
                                  </div>

                                    <div class="input-field col s6">
                                      <label for="city">City</label></br></br>
                                      <select class="browser-default" id="city" name="city"></select>
                                    </div>
                              </div>
 
                              <div class="row">
                            
                                <div class="input-field col s12">
                                  <textarea  id="desc" name="desc" class="materialize-textarea"></textarea>
                                  <label for="Description">Description</label>
                                </div>
                              </div>
    
  
                              <div class="row">
                                <div class="input-field col s12">
                                  <input id="bcontact" name="bcontact" type="number" class="validate" required>
                                  <label for="contact">Contact *</label>
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
                  </div><br><br>
      <div class="input-field col s6">
                                      <input  id="ans" name="ans" type="password" class="validate" required>
                                      <label for="ans">Answer for the question *</label>
                                    </div>
      </div>








                              <div class="row">
                                    <div class="input-field col s6">
                                      <input  id="buser" name="username" type="text" class="validate" required>
                                      <label for="buser">Username *</label>
                                    </div>
                                    <div class="input-field col s6">
                                      <input id="bpass" name="password" type="password" class="validate" required>
                                      <label for="password">Password *</label>
                                    </div>
                               </div>
     
  
                              <div class="row">
                                <div class="input-field col s12">  <center>
                                  <button class="btn waves-effect waves-light" type="submit" name="submit">
                                    submit
                                 </button> </center>
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
