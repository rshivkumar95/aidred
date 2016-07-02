<?php
  //session_start();
include_once("config.php");
if($_SESSION['changepass']!=1)
{
  header("Location: index.php");
}

$err=1;
      //$_SESSION["loggedIn"]=0;
if(isset($_POST["submit"]))
  {   
  
         if($_POST['newpassword']===$_POST['repassword'])
       {

         if($_SESSION['role']=='donor')
            {
                $res1 = $coll->update(array('blood_donor.username' =>$_SESSION['username']),array('$set'=>array('blood_donor.password' => $_POST['newpassword'])));
                if($res1)
                  //  header("Location: login.php");
                 echo "<script type='text/javascript'>alert('Password Changed ! Login With New Password !'); window.location.href='login.php';</script>";

		    $_SESSION['username']="";
        $_SESSION['changepass']=0;
          }
        elseif($_SESSION['role']=='bank')
            {
                $res1 = $coll->update(array('blood_bank.username' =>$_SESSION['username']),array('$set'=>array('blood_bank.password' => $_POST['newpassword'])));
                if($res1)
                    echo "<script type='text/javascript'>alert('Password Changed ! Login With New Password !'); window.location.href='login.php';</script>";
                    //header("Location: login.php");
  			$_SESSION['username']="";
        $_SESSION['changepass']=0;
          }
           
          if($_SESSION['role']=='request')
            {
                $res1 = $coll->update(array('blood_request.username' =>$_SESSION['username']),array('$set'=>array('blood_request.password' => $_POST['newpassword'])));
                if($res1)
                   // header("Location: login.php");
                   echo "<script type='text/javascript'>alert('Password Changed ! Login With New Password !'); window.location.href='login.php';</script>";

        $_SESSION['username']="";
        $_SESSION['changepass']=0;
          }
        elseif($_SESSION['role']=='event')
            {
                $res1 = $coll->update(array('blood_event.username' =>$_SESSION['username']),array('$set'=>array('blood_event.password' => $_POST['newpassword'])));
                if($res1)
                    echo "<script type='text/javascript'>alert('Password Changed ! Login With New Password !'); window.location.href='login.php';</script>";
                    //header("Location: login.php");
        $_SESSION['username']="";
        $_SESSION['changepass']=0;
          }
            

       }
      else
      {
                  $error=1;
                     $msg="New Password not Match";
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
           <h5 style="text-align:center;">Change password</h5><hr style="width:10%;color:#ff0000;">
                  <h6 align="left" id="error" color=red><? if(!$err): echo "Invalid Username Or Password!"; endif;?> </h6>
				    <form name="login" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
				      <div class="row">
				        <div class="input-field col s12">
				          <input name="newpassword" id="newpassword" type="password" class="validate">
				          <label for="newpassword">New Password</label>
				        </div>
				      </div>

				      <div class="row">
				        <div class="input-field col s12">
				          <input name="repassword" id="repassword" type="password" class="validate">
				          <label for="repassword">Re-type Password</label>
				        </div>     
				      </div>

				      
				      <div class="row">       
				         
				         <div class="input-field col s12" align="center">
				              <button name="submit" class="waves-effect waves-light btn">Change Password</button>
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
