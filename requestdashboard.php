<?php
$res=0;
?>


                                            	<div class="col s4">
                                                    <a href="brequest_modify.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update Your Details"><i class="medium material-icons" style="color:#d32f2f;">build</i><h5 style="color:#d32f2f;">Update Details</h5></a>                                                                                                      
                                                </div>
                                                 <div class="col s4">                                                    
                                                    <a href="request_change_pass.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Change Your Password"><i class="medium material-icons" style="color:#d32f2f;">vpn_key</i><h5 style="color:#d32f2f;">Change Password</h5></a>                                                              
                                                </div>                  
                                                 <div class="col s4">                                                    
                                                    <a href="delete_request.php" onclick="return confirm('Are you sure?')" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete Your Account"><i class="medium material-icons" style="color:#d32f2f;">delete</i><h5 style="color:#d32f2f;">Deactivate Account</h5></a>                                                           
                                                </div>

                               <div class="row" style="color:#000000;text-align:left;">

                                                <div class="col s12">
                                              

                                                                  

                                  <?php

                                        $cursor = $coll->find(array('blood_donor.respondedrequestyes' =>$_SESSION['username']));
                                        
                                        
                                        $total=$cursor->count(); 

                                        if($total > 0)
                                        {
                                        	echo "<h4>Following People are interested to donate blood </h4>";
                                        }
                                  ?>
            
                                  <ul class="collapsible popout" data-collapsible="accordion">
                                  
                                  <?php
                                    foreach ($cursor as $r) {
                                      $uname=$r['blood_donor']['username'];
                                       // $res = $coll->find(array('blood_donor.username'=>$uname,'blood_donor.candonate' =>'no'));
                                           //$last_donation=$r['blood_donor']['last_donation'];
                                         $candonate=$r['blood_donor']['candonate'];
                                           if($candonate=='yes')
                                               $res=0;
                                            else
                                               $res=1;
                                           //$date = new DateTime($last_donation);
                                            //$now = new DateTime();
                                            
                                              //   $difference= $date->diff($now)->m;
                                              //$difference=$difference+1
                                                 // if($difference < 3 )
                                                     // $res=1
                                                // echo $difference;
                                              
                                  ?>
                                                     <li>
                                                    <div class="collapsible-header"><b> 
                                  <?php 
                                      echo $r['blood_donor']['name'];
                                     // echo $event_name;
                                  ?>
                                                    </b>
                                                    </div>
                                                    <div class="collapsible-body" style="padding:10px;">


                                                          <div class="row" >      
								                          <div class="col s12"><b>Donor Name :</b> <?php echo $r['blood_donor']['name']; ?></div>
								                          </div>
								                          <div class="row">      
								                          <div class="col s6"><b>Email :</b> <?php echo $r['blood_donor']['email']; ?></div>
								                          <div class="col s6"><b>Contact :</b> <?php echo $r['blood_donor']['mobileno']; ?></div>
								                          </div>
								                          <div class="row">      
								                          <div class="col s6"><b>State :</b> <?php echo $r['blood_donor']['state']; ?></div>
								                          <div class="col s6"><b>City :</b> <?php echo $r['blood_donor']['city']; ?></div>
								                          </div>
								                          <div class="row">      
								                          <div class="col s6"><b>Gender :</b> <?php echo $r['blood_donor']['gender']; ?></div>
								                          <div class="col s6"><b>DOB :</b> <?php echo $r['blood_donor']['DoB']; ?></div>
								                          </div>
                                          <div class="row">
                                                   <form name=<?php echo $uname ?> method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
                                                    <div class="col s12" style="text-align:center;"><b>Are You Taken Blood From This Donor ?</b></div>
                                                                  <div class="row" style="padding:20px;text-align:center" >  
                                                                        <div class="col s6"> 
                                                                         
                                                                        <!--?php $gname=$uname."attend";  ?--> 
                                                                        <?php $yes=$uname."yes";  ?>
                                                                        <?php $no=$uname."no";  ?>
                                                                       
                                                                        <?php $button1=$uname."yes"; ?>
                                                                        <?php $button2=$uname."no"; ?>
                                                                        
                                                                        <?php $button4=$uname."submit"; ?>
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
                                                                <?php if($res) echo "Can't Donate Now "; ?> <br>
                                                                        <button name="<?php echo $button4; ?>" type="submit" <?php if($res) echo "disabled"; ?> class="btn waves-effect waves-light">SUBMIT</button>
                                                                         
                                                                        </div>



                                                                         <?php 
                                                                                 
                                                                                 if (isset($_POST[$button4])) {
                                                                                 
                                                                                 
                                                                                          if($_POST[$button1]=='yes')
                                                                                          {                                                                                      
                                                                                                    
                                                                                                    $res=$coll->update(array('blood_donor.username'=>$uname),array('$push'=>array('blood_donor.donatedto'=>$_SESSION['username'])));
                                                                                                    $res=$coll->update(array('blood_donor.username'=>$uname),array('$set'=>array('blood_donor.candonate'=>'no','blood_donor.last_donation'=>date("y-m-d"))));
                                                                                                    $res=$coll->update(array('blood_request.username'=>$_SESSION['username']),array('$push'=>array('blood_request.takenfrom'=>$uname)));

                                                                                                                                                                                                      
                                                                                          }
                                                                                          elseif ($_POST[$button1]=='no') {
                                                                                           
                                                                                                      
                                                                                          }
                                                                                         
                                                                                         $res=$coll->update(array('blood_request.username'=>$_SESSION['username']),array('$push'=>array('blood_request.respondedto'=>$uname)));
                                                                                                    
                                                                                          // $result=$coll->update(array("blood_donor.username"=>$_SESSION["username"]),array('$push'=>array("blood_donor.respondedrequest"=>$request_name)));

                                                                                 
                                                                                 echo "<script type='text/javascript'>alert('Thank You ! Your Response is Submitted !');window.location.href='dashboard.php';</script>";

                                                                                 }

                                                                    ?>

                                                                  </div>
                                                   </form>
                                          </div>

                                                    </div>
                                                    </li>
                                      <?php
                                             
                                              }
                                    ?>
                                           </ul> 
                              


                                                </div>
                                                </div>



	
