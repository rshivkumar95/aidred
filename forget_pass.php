<?php
  include_once("config.php");
     $res=0;$res1=0;$res2=0;$res3=0;
     $error=0;
     $msg="";
 if(isset($_POST["submit"]))
         {
    $res = $coll->findOne(array('blood_donor.username' => $_POST['username'], 'blood_donor.que' =>$_POST['que'],'blood_donor.ans' =>$_POST['ans']));
 
	$res1 = $coll->findOne(array('blood_event.username' => $_POST['username'], 'blood_event.que' =>$_POST['que'],'blood_event.ans' =>$_POST['ans']));
	$res2 = $coll->findOne(array('blood_bank.username' => $_POST['username'], 'blood_bank.que' =>$_POST['que'], 'blood_bank.ans' =>$_POST['ans']));
	$res3 = $coll->findOne(array('blood_request.username' => $_POST['username'], 'blood_request.que' =>$_POST['que'],'blood_request.ans' =>$_POST['ans']));          



          if($res)
            {
                $_SESSION['role']='donor';
                $_SESSION['changepass']=1;
               $_SESSION['username']=$_POST['username'];
              header("Location:change_pass.php");
            }
          elseif($res1){
		          $_SESSION['role']='event';
               $_SESSION['username']=$_POST['username'];
               $_SESSION['changepass']=1;
                 header("Location: change_pass.php");
            }
  
   elseif($res2){
		$_SESSION['role']='bank';
               $_SESSION['username']=$_POST['username'];
               $_SESSION['changepass']=1;
                 header("Location: change_pass.php");
            }
     elseif($res3){
		$_SESSION['role']='request';
               $_SESSION['username']=$_POST['username'];
               $_SESSION['changepass']=1;
                 header("Location: change_pass.php");
            }
            else
            {
              $error=1;
              $msg='Wrong information provided';
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

  
 




  <div class="container" style="background:#ffffff;margin-top:15px;margin-bottom:150px;width:50%;padding:50px;">
      
    <h6 align="center" id="error" color=red><?php if($error): echo $msg; endif;?> </h6>
     <form name="forget_pass" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">

      <div class="row">
                  <div class="input-field col s12">    
                  <input id="username" name="username" type="text" class="validate" required>
                       <label for="username">Username *</label>        
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
                <div class="input-field col s12" align="center">  
                  <button class="btn waves-effect waves-light" type="submit" name="submit">submit</button> 
                </div>    
               </div>
               </form>
   </div>
              
          

      <?php
        include('resourcesend.php');
      ?>
    
      </body>
  </html>

