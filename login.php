<?php
  //session_start();
include_once("config.php");
$err=1;
if($_SESSION["loggedIn"]==1){
   header("Location: dashboard.php");
   $_SESSION["loggedIn"]=1;
     }
else{

      //$_SESSION["loggedIn"]=0;
if(isset($_POST["submit"]))
  {   
           if($_POST['username']=='' or $_POST['password']=='')
         {
                 $err=0;     
         }
       else
      {   	
        $res = $coll->findOne(array('blood_donor.username' => $_POST['username'], 'blood_donor.password' =>$_POST['password']));
	$res1 = $coll->findOne(array('blood_event.username' => $_POST['username'], 'blood_event.password' =>$_POST['password']));
	$res2 = $coll->findOne(array('blood_bank.username' => $_POST['username'], 'blood_bank.password' =>$_POST['password']));
	$res3 = $coll->findOne(array('blood_request.username' => $_POST['username'], 'blood_request.password' =>$_POST['password']));
	if($res){
        echo "<script>alert('hiii');</script>";
	   header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
           		$err=1;
          	   //echo '<script>swal("Heres a message!", "Its pretty, isnt it?");</script>';
                     $cursor=$coll->find(array('blood_donor.username' => $_POST['username']));
          	   $_SESSION["role"]="donor";
        }
       elseif($res1){
	   header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
	   $err=1;
           $cursor=$coll->find(array('blood_event.username' => $_POST['username']));
	   $_SESSION["role"]="event";
          }
	elseif($res2){
	   header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
           $err=1;
	   $cursor=$coll->find(array('blood_bank.username' => $_POST['username']));
	   $_SESSION["role"]="bank";
    }
      elseif($res3){
	   header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
           $err=1;
           $cursor=$coll->find(array('blood_request.username' => $_POST['username']));
	   $_SESSION["role"]="request";
	}
	else
	{
		$err=0;
	}
        
        
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

  
 




  <div class="container  " style="background:#ffffff;margin-top:15px;border-radius: 15px 50px;width:50%;">
      
    
	  <div class="row">
	  <div class="col s12 " style="background:#ffffff;padding:50px;" >
           <h5 style="text-align:center;">Login</h5><hr style="width:10%;color:#ff0000;">
                  <h6 align="left" id="error" color=red><? if(!$err): echo "Invalid Username Or Password!"; endif;?> </h6>
				    <form name="login" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
				      <div class="row">
				        <div class="input-field col s12">
				          <input name="username" id="username" type="text" class="validate">
				          <label for="username">Username</label>
				        </div>
				      </div>

				      <div class="row">
				        <div class="input-field col s12">
				          <input name="password" id="password" type="password" class="validate">
				          <label for="password">Password</label>
				        </div>     
				      </div>

				      
				      <div class="row">       
				         
				         <div class="input-field col s12" align="center">
				              <button name="submit" class="waves-effect waves-light btn">Login</button>
				         </div>
				        
				      </div>
				     
				    </form>
            <div class="row" style="text-align:center;">
              <a href="forget_pass.php">FORGET PASSWORD ?</a>
            </div>
			 
      </div>
	  </div>

	     


      
     
</div>

        
          

      <?php
        include('resourcesend.php');
      ?>
    
      </body>
  </html>
