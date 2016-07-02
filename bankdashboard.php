                                                 <div class="col s6">                                                    
                                                    <a href="stock_update.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update Your Bank Stock"><i class="medium material-icons" style="color:#d32f2f;">build</i><h5 style="color:#d32f2f;">Update Stock</h5></a>                                                           
                                                </div>
                                                <div class="col s6">
                                                    <a href="bankmodify.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update Your Details"><i class="medium material-icons" style="color:#d32f2f;">build</i><h5 style="color:#d32f2f;">Update Details</h5></a>                                                                                                      
                                                </div>
                                                <div class="row">
                                                 <div class="col s6">                                                    
                                                    <a href="bank_change_pass.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Change Your Password"><i class="medium material-icons" style="color:#d32f2f;">vpn_key</i><h5 style="color:#d32f2f;">Change Password</h5></a>                                                              
                                                </div>                  
                                                 <div class="col s6">                                                    
                                                    <a href="delete_bank.php" onclick="return confirm('Are you sure?')" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete Your Account"><i class="medium material-icons" style="color:#d32f2f;">delete</i><h5 style="color:#d32f2f;">Deactivate Account</h5></a>                                                           
                                                </div>
                                               </div>
                      

                         
                  <div class="row" style="color:#000000;text-align:left;">

                                                <div class="col s12">
                                              

                                                                  

                                  <?php
                                      
                                        $cursor = $coll->find(array('blood_donor.connectedbb' =>$_SESSION['username']));
                                        $total=$cursor->count(); 

                                        if($total > 0)
                                        {
                                            echo "<h4>Connected Blood Donors With Your Bank</h4>";
                                        }
                                  ?>
            
                                  <ul class="collapsible popout" data-collapsible="accordion">
                                  
                                  <?php
                                    foreach ($cursor as $r) {
                                      $uname=$r['blood_donor']['username'];
                                      //$uname=$r['blood_donor']['username'];
                                       // $res = $coll->find(array('blood_donor.username'=>$uname,'blood_donor.candonate' =>'no'));
                                           //$last_donation=$r['blood_donor']['last_donation'];
                                         $candonate=$r['blood_donor']['candonate'];
                                           if($candonate=='yes'){
                                            $res=0;
                                                 
                                                      
                                             }
                                            else
                                               $res=1;
                                       
                                        
                                  ?>
                                                     <li>
                                                    <div class="collapsible-header"><b> 
                                  <?php 
                                      echo $r['blood_donor']['name'];

                                      $uname=$r['blood_donor']['username'];
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
                                                             <?php
                                                                       $button4=$uname."submit";

                                                             ?>
                                          
                                                                        <div class="row">
                                                                   <form name=<?php echo $uname ?> method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
                                                                    <!--div class="col s12" style="text-align:center;"><b>Request for Blood Donation</b></div-->
                                                                      
                                                                  <div>
                                                                     <div class="col s12" style="text-align:center">  
                                                                           <?php //if($res) echo "Can't Donate Now "; ?> <br>
                                                                        <!--button name="<?php //echo $button4; ?>" type="submit" <?php //if($res) echo "disabled"; ?> class="btn waves-effect waves-light">SUBMIT</button-->
                                                                         
                                                                        </div>



                                                                         <?php 
                                                                                 
                                                                                /* if (isset($_POST[$button4])) {
                                                                                 
                                                                                 

                                                                                         
                                                                                         $res=$coll->update(array('blood_donor.username'=>$uname),array('$set'=>array('blood_donor.bankrequested'=>"yes")));
                                                                                          $res=$coll->update(array('blood_bank.username'=>$_SESSION['username']),array('$push'=>array('blood_bank.requestedto'=>$uname)));
                                                                                                    
                                                                                         //// // $result=$coll->update(array("blood_donor.username"=>$_SESSION["username"]),array('$push'=>array("blood_donor.respondedrequest"=>$request_name)));

                                                                                 
                                                                                 echo "<script type='text/javascript'>alert('Thank You ! Your Response is Submitted !');window.location.href='dashboard.php';</script>";

                                                                                 }*/

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



    




	
