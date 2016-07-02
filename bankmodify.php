<?php
include_once("config.php");	
   if($_SESSION['loggedIn']==0){
        header("Location: login.php");
}
else{
      $_SESSION['loggedIn']=1;


      $data=$coll->find(array('blood_bank.username' =>$_SESSION['username']));
foreach($data as $obj)
{
  $bname=$obj['blood_bank']['bname'];
  $type=$obj['blood_bank']['type'];
  $email=$obj['blood_bank']['email'];
  //$state=$obj['blood_bank']['state'];
  //$city=$obj['blood_bank']['city'];
  $description=$obj['blood_bank']['description'];
  $contact=$obj['blood_bank']['contact'];
} 
  

   if(isset($_POST["submit"]))
  {
try
{
  $res = $coll->update(array('blood_bank.username' =>$_SESSION['username']),array('$set'=>array('blood_bank.bname' => $_POST['bname'], 'blood_bank.type' =>$_POST['group1'],'blood_bank.email' => $_POST['email'],'blood_bank.description' => $_POST['desc'],'blood_bank.contact' => $_POST['bcontact'])));
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
                              

                       <form name="bankmodify" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
                                   <div class="row">
                                   <p>* All Fields Are Required </p>
                                    <div class="input-field col s12">
                                      <input  id="bname" name="bname" value="<?php echo $bname ?>" type="text" class="validate" required>
                                      <label for="bname">Name of Blood Bank *</label>
                                    </div>
                                   </div>
    
                                    <div class="row">
                                       <div class="input-field col s12">
                                        <label for="type">Enter type of blood bank</label><br><br>
                                  
                                          <input class="with-gap" name="group1" type="radio" id="test1" value="Government" checked/ required>
                                          <label for="test1">Government</label>
                                          <input class="with-gap" name="group1" type="radio" id="test2" value="Private"/ required>
                                          <label for="test2">Private</label>
                                        
                                  
                                      </div>
                                    </div>   
       
                                    <div class="row">
                                            <div class="input-field col s12">
                                            <input id="email" name="email"  value="<?php echo $email ?>" type="email" class="validate" required>
                                              <label for="email">Email *</label>
                                            </div>
                                    </div>
                                  <!--  <div class="row">
                                          <div class="input-field col s6">
                                          <label for="state">State</label></br></br>
             
                                          <select class="browser-default" id="state" name="state" ><?php echo $state ?></select>
     
                                          </div>
                                          <div class="input-field col s6">
                                          <label for="city">City</label></br></br>
     
                                          <select class="browser-default" id="city" name="city" ><?php echo $city ?></select>
     
                                          </div>
                                    </div>-->
                                    <div class="row">
                                          <div class="input-field col s12">
                                          <textarea  id="desc" name="desc"  class="materialize-textarea"><?php echo $description ?></textarea>
                                          <label for="Description">Description </label>
                                          </div>
                                    </div>
    
  
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input  id="bcontact" name="bcontact" type="number" class="validate" value="<?php echo $contact ?>" required>
                                        <label for="contact">Contact *</label>
                                      </div>
                                    </div>
    
 

                                    <div class="row">
                                         <div class="input-field col s12">  <center>
                                            <button class="btn waves-effect waves-light" type="modify" name="submit">
                                            Modify
                                           </button> </center>
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
