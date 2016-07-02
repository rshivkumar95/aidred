                                                <div class="col s6">
                                                    <a href="dmodify1.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update Your Medical Details"><i class="medium material-icons" style="color:#d32f2f;">build</i><h5 style="color:#d32f2f;">Update Medical Details</h5></a>                                                                                                      
                                                </div>
                                                <div class="col s6">
                                                    <a href="dmodify.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update Your Details"><i class="medium material-icons" style="color:#d32f2f;">build</i><h5 style="color:#d32f2f;">Update Details</h5></a>                                                                                                      
                                                </div></div>
                                                <div class="row">
                                                 <div class="col s6">                                                    
                                                    <a href="donor_change_pass.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Change Your Password"><i class="medium material-icons" style="color:#d32f2f;">vpn_key</i><h5 style="color:#d32f2f;">Change Password</h5></a>                                                              
                                                </div>                  
                                                 <div class="col s6">                                                    
                                                    <a href="delete_donor.php" onclick="return confirm('Are you sure?')" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete Your Account"><i class="medium material-icons" style="color:#d32f2f;">delete</i><h5 style="color:#d32f2f;">Deactivate Account</h5></a>                                                           
                                                </div>
                                                



<?php 

/*$res1=$coll->find(array("blood_donor.username"=>$_SESSION['username'],"blood_donor.bankrequested"=>"yes","blood_donor.candonate"=>"yes",));

if($res1)
{
   foreach ($res1 as $asd) {
     $connectedbb=$asd['blood_donor']['connectedbb'];
     }*/
   ?>

   <!--div class='row'><h5 style='margin-top:50px;color:#000000;'><br><br>Your Blood Bank Has Requested you for Blood Donation !</h5>


                                                              <div class="col s12" style="text-align:center">  
                                                                        <form name="accept" method="POST" action="">
                                                                            <button name="accept" type="submit" class="btn waves-effect waves-light">Accept</button>                                                                        
                                                                        </form>
                                                              </div>
                                                                        <?php/*

                                                                          if(isset($_POST['accept']))
                                                                           {
                                                                               $res = $coll->update(array('blood_donor.username' =>$_SESSION['username']),array('$set'=>array('blood_donor.candonate'=>'no','blood_donor.bankrequested'=>'no')));                                                                               
                                                                               $result=$coll->update(array("blood_bank.username"=>$connectedbb),array('$push'=>array("blood_donor.respondedrequestyes"=>$request_name)));
                                                                           }*/
                                                                        ?>
                                                             


   </div-->


<?php
//}


$res1=$coll->find(array("blood_donor.username"=>$_SESSION['username']));

foreach($res1 as $obj)
{

$last_donation=$obj['blood_donor']['last_donation'];

}

$date = new DateTime($last_donation);
$now = new DateTime();

            $difference= $date->diff($now)->m;
            //$difference=$difference+1;
            //$msg='Your request will expire in  '   .$difference .    ' days!';
            if($difference < 3)
            {
              echo "<div class='row'><h4 style='margin-top:50px'>You Cant Donate right now !</h4></div>";

            }
            else{


   
  


    $res=$coll->find(array("blood_donor.username"=>$_SESSION['username']));

foreach($res as $obj)
{
    $state=$obj['blood_donor']['state'];
    $city=$obj['blood_donor']['city'];
    $bloodgroup=$obj['blood_donor']['bloodgroup'];
}


?>



                                                <div class="row" style="color:#000000;text-align:left;">

                                                <div class="col s12">
                                              

                                                                  

                                  <?php

                                        $cursor = $coll->find(array('blood_request.state' =>$state,'blood_request.city' =>$city,'blood_request.bloodgroup'=>$bloodgroup));
                                        $total=$cursor->count(); 
                                        if($total > 0)
                                        {
                                          echo "<h4>Following People require" .$bloodgroup. " in " .$city. "</h4>";
                                        }
                                  ?>
            
                                  <ul class="collapsible popout" data-collapsible="accordion">
                                  
                                  <?php
                                    foreach ($cursor as $r) {
                                        $get=$r['blood_request']['username']; 
                                        $res=$coll->findOne(array("blood_donor.username"=>$_SESSION['username'],"blood_donor.respondedrequest"=>$get));
                                        
                                  ?>
                                                     <li>
                                                    <div class="collapsible-header"><b> 
                                  <?php 
                                      echo $r['blood_request']['pname'];
                                     // echo $event_name;
                                  ?>
                                                    </b>
                                                    </div>
                                                    <div class="collapsible-body" style="padding:10px;">


                                                          <div class="row">      
                                                          <div class="col s12"><b>Patient Name :</b> <?php echo $r['blood_request']['pname']; ?></div>
                                                          </div>
                                                          <div class="row">      
                                                          <div class="col s6"><b>Required Blood Group :</b> <?php echo $r['blood_request']['bloodgroup']; ?></div>
                                                          <div class="col s6"><b>No. of Units :</b> <?php echo $r['blood_request']['NoU']; ?></div>
                                                          </div>
                                                          <div class="row">      
                                                          <div class="col s6"><b>Email :</b> <?php echo $r['blood_request']['email']; ?></div>
                                                          <div class="col s6"><b>Contact :</b> <?php echo $r['blood_request']['contact']; ?></div>
                                                          </div>
                                                          <div class="row">      
                                                          <div class="col s6"><b>Request date :</b> <?php echo $r['blood_request']['rdate']; ?></div>
                                                          <div class="col s6"><b>Last date :</b> <?php echo $r['blood_request']['ldate']; ?></div>
                                                          </div>
                                                          <div class="row">      
                                                          <div class="col s12"><b>Reason :</b> <?php echo $r['blood_request']['reason']; ?></div>
                                                          </div>
                                                          <div class="row">  
                                                          <form name=<?php echo $r['blood_request']['username']; ?> method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">    
                                                          <div class="col s12" style="text-align:center;"><b>Are You Interested in Donating Blood To This Patient ?</b></div>
                                                                  <div class="row" style="padding:20px;text-align:center" >  
                                                                        <div class="col s6"> 
                                                                        <?php $request_name = $r['blood_request']['username'];  ?> 
                                                                        <?php $gname=$request_name."attend";  ?> 
                                                                        <?php $yes=$request_name."yes";  ?>
                                                                        <?php $no=$request_name."no";  ?>
                                                                        <?php $maybe=$request_name."maybe";  ?> 
                                                                        <?php $button1=$request_name."yes"; ?>
                                                                        <?php $button2=$request_name."no"; ?>
                                                                        <?php $button3=$request_name."maybe"; ?>
                                                                        <?php $button4=$request_name."submit"; ?>
                                                                         <input name="<?php echo $button1; ?>" type="radio" value="yes" id="<?php echo $button1; ?>" checked/>
                                                                         <label for="<?php echo $button1; ?>">YES</label>
                                
                                                                         </div>
                                                                        <div class="col s6">  
                                                                        <input name="<?php echo $button1; ?>" type="radio" value="no" id="<?php echo $button2; ?>" />
                                                                         <label for="<?php echo $button2; ?>">NO</label>
                                                                        
                                                                        </div>
                                                                        
                                                                  </div>
                                                                  <div>
                                                                     <div class="col s12" style="text-align:center">  
                                                                        <button name="<?php echo $button4; ?>" type="submit" class="btn waves-effect waves-light" <?php if($res){ echo "disabled";}?> id="<?php echo $button4; ?>" >RESPOND</button>
                                                                         
                                                                        </div>
                                                                  </div>
                                                                  
                                                                  
                                                                    <?php 
                                                                                 
                                                                                 if (isset($_POST[$button4])) {
                                                                                 
                                                                                 
                                                                                          if($_POST[$button1]=='yes')
                                                                                          {                                                                                      
                                                                                                    $ctrl=getNextSequence($yes);
                                                                                                  // $msg=$_POST[$button1];
                                                                                                    //echo "<script type='text/javascript'>".$msg."</script>";
                                                                                                    $res = $coll->update(array('blood_request.username' =>$request_name),array('$set'=>array('blood_request.donateyes' => intval($ctrl))));
                                                                                                    //$res=$coll->update(array('blood_donor.username'=>$_SESSION['username']),array('$push'=>array('blood_donor.respondedbank'=>$request_name)));
                                                                                                    $result=$coll->update(array("blood_donor.username"=>$_SESSION["username"]),array('$push'=>array("blood_donor.respondedrequestyes"=>$request_name)));
                                                                                          }
                                                                                          elseif ($_POST[$button1]=='no') {
                                                                                           
                                                                                           $ctrl=getNextSequence($no);
                                                                                                      $res = $coll->update(array('blood_request.username' =>$request_name),array('$set'=>array('blood_request.donateno' => intval($ctrl))));
                                                                                                      $result=$coll->update(array("blood_donor.username"=>$_SESSION["username"]),array('$push'=>array("blood_donor.respondedrequestno"=>$request_name)));
                                                                                          }
                                                                                         
                                                                                           $result=$coll->update(array("blood_donor.username"=>$_SESSION["username"]),array('$push'=>array("blood_donor.respondedrequest"=>$request_name)));

                                                                                 
                                                                                 echo "<script type='text/javascript'>alert('Thank You ! Your Response is Submitted !');window.location.href='dashboard.php';</script>";

                                                                                 }

                                                                    ?>

                                                          </div>
                                                          </form>
                                                         </div>
                                                    </li>
                                      <?php
                                             
                                              }
                                           // }
                                    ?>
                                           </ul> 
                              


                                                </div>
                                                </div>

<?php

}

?>


	
