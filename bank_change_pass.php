<?php
include_once("config.php");	
$error=0;
   if($_SESSION['loggedIn']==0){
        header("Location: login.php");
}
else{
      $_SESSION['loggedIn']=1;

  if(isset($_POST["submit"]))
  {
try
{
      
       if($_POST['newpassword']===$_POST['repassword'])
       {

            $res = $coll->findOne(array('blood_bank.username' => $_SESSION['username'], 'blood_bank.password' =>$_POST['oldpassword']));
            if($res)
             {
                $res1 = $coll->update(array('blood_bank.username' =>$_SESSION['username']),array('$set'=>array('blood_bank.password' => $_POST['newpassword'])));
                if($res1)
                    header("Location: dashboard.php");
             }
            else
             {
                $error=1; 
                $msg="Old Password not Match";
             }
       }
      else
      {
                  $error=1;
                     $msg="New Password not Match";
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
                              

                                    <h6 align="left" id="error" color=red><?php if($error): echo $msg; endif;?> </h6>
                                  <form name="login" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
                                   

                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input id="oldpassword" name="oldpassword" type="password" class="validate" required>
                                        <label for="oldpassword">Old Password</label>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input id="newpassword" name="newpassword" type="password" class="validate" required>
                                        <label for="newpassword">New Password</label>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input id="repassword" name="repassword" type="password" class="validate" required>
                                        <label for="repassword">Re-Enter New Password</label>
                                      </div>
                                    </div>
                                    
                                    <div class="row">       
                                       
                                       <div class="input-field col s12">  <center>
                                      <button class="btn waves-effect waves-light" type="submit" name="submit">
                                        save
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
