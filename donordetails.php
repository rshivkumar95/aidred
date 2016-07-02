<?php
include_once("config.php");	


     
            $result=$coll->find(array('blood_donor.username'=>$_SESSION["username"]));
                          
           $state="";
           $city="";

          foreach($result as $obj)
          {    
             $state=$obj['blood_donor']['state'];
             $city=$obj['blood_donor']['city'];

?>

<div class="col s12">

<ul class="collection with-header">
        <li class="collection-header"><h4><?php echo $obj['blood_donor']['name']; ?></h4></li>
        <li class="collection-item"><div>Email :<?php echo $obj['blood_donor']['email']; ?></div></li>
        <li class="collection-item"><div>Contact No. :<?php echo $obj['blood_donor']['mobileno']; ?></div></li>
        <li class="collection-item"><div>State :<?php echo $obj['blood_donor']['state']; ?>&nbsp;&nbsp;&nbsp;City :<?php echo $obj['blood_donor']['city']; ?></div></li>
        <li class="collection-item"><div>Date of Birth :<?php echo $obj['blood_donor']['DoB']; ?></div></li>
        <li class="collection-item"><div>Blood Group :<?php echo $obj['blood_donor']['bloodgroup']; ?>&nbsp;&nbsp;&nbsp;Gender :<?php echo $obj['blood_donor']['gender']; ?></div></li>

      </ul>

</div>

<div class="col s12" style="text-align:center;">

<ul class="collection with-header"><b>
        <li class="collection-header"><h4>MEDICAL DETAILS</h4></li>
        <li class="collection-item"><div class="row"><div class="col s6">BPLow : <?php echo $obj['blood_donor']['BPlow'];?></div><div class="col s6">BPHigh : <?php echo $obj['blood_donor']['BPhigh'];?></div></li>
        <li class="collection-item"><div class="row"><div class="col s6">HB : <?php echo $obj['blood_donor']['HB'];?></div><div class="col s6">Temperature : <?php echo $obj['blood_donor']['temperature'];?></div></li>
        <li class="collection-item"><div class="row"><div class="col s6">Pulse : <?php echo $obj['blood_donor']['pulse'];?></div><div class="col s6">Blood Bank : <?php echo $obj['blood_donor']['connectedbb'];?></div></li>
        <li class="collection-item"><div class="row"><div class="col s12">Donated To : <?php echo "".implode(",", $obj['blood_donor']['donatedto'])."<br/>"?></div></li>

        
        </b>
       
      </ul>

</div>      






  

<?php
}

?>

 <div class="row"> 
   
     <div class="col s12" style="padding:50px">
               

                                  <?php

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
                                                      echo "<div class='row'><h4>You Cant Donate right now !</h4></div>";

                                                    }
                                                    else{
                                                    	   


							                                        $cursor = $coll->find(array('blood_event.state' =>$state,'blood_event.city' =>$city));
							                                        $total=$cursor->count(); 
							                                        if($total > 0)
							                                        {
							                                          echo "<h4>Upcoming Events in" .$city. "</h4>";
							                                        }
                                  ?>
            
                                  <ul class="collapsible popout" data-collapsible="accordion">
                                  
                                  <?php
                                    foreach ($cursor as $r) {
                                        $edate=$r['blood_event']['date'];                                 
                                    	$endate = new DateTime($edate);
                                        $now = new DateTime();
                                        if($endate>$now)
                                        {
                                         $get=$r['blood_event']['username']; 
                                         $res=$coll->findOne(array("blood_donor.username"=>$_SESSION['username'],"blood_donor.respondedbank"=>$get));
                                        
                                  ?>
                                                     <li>
                                                    <div class="collapsible-header"><b> 
                                  <?php 
                                      echo $r['blood_event']['eventname'];
                                     // echo $event_name;
                                  ?>
                                                    </b>
                                                    </div>
                                                    <div class="collapsible-body" style="padding:10px;">


                                                          <div class="row">      
                                                          <div class="col s12"><b>Event Name :</b> <?php echo $r['blood_event']['eventname']; ?></div>
                                                          </div>
                                                          <div class="row">      
                                                          <div class="col s6"><b>Blood bank name :</b> <?php echo $r['blood_event']['bbname']; ?></div>
                                                          <div class="col s6"><b>Contact :</b> <?php echo $r['blood_event']['contact']; ?></div>
                                                          </div>
                                                          <div class="row">      
                                                          <div class="col s6"><b>Hosted By :</b> <?php echo $r['blood_event']['hostedby']; ?></div>
                                                          <div class="col s6"><b>Date :</b> <?php echo $r['blood_event']['date']; ?></div>
                                                          </div>
                                                          <div class="row">  
                                                          <form name=<?php echo $r['blood_event']['username']; ?> method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">    
                                                          <div class="col s12" style="text-align:center;"><b>Want to Attend</b></div>
                                                                  <div class="row" style="padding:20px;">  
                                                                        <div class="col s4"> 
                                                                        <?php $event_name = $r['blood_event']['username'];  ?> 
                                                                        <?php $gname=$event_name."attend";  ?> 
                                                                        <?php $yes=$event_name."yes";  ?>
                                                                        <?php $no=$event_name."no";  ?>
                                                                        <?php $maybe=$event_name."maybe";  ?> 
                                                                        <?php $button1=$event_name."yes"; ?>
                                                                        <?php $button2=$event_name."no"; ?>
                                                                        <?php $button3=$event_name."maybe"; ?>
                                                                        <?php $button4=$event_name."submit"; ?>
                                                                         <input name="<?php echo $button1; ?>" type="radio" value="yes" id="<?php echo $button1; ?>" checked/>
                                                                         <label for="<?php echo $button1; ?>">YES</label>
                                
                                                                         </div>
                                                                        <div class="col s4">  
                                                                        <input name="<?php echo $button1; ?>" type="radio" value="no" id="<?php echo $button2; ?>" />
                                                                         <label for="<?php echo $button2; ?>">NO</label>
                                                                        
                                                                        </div>
                                                                        <div class="col s4">  
                                                                        <input name="<?php echo $button1; ?>" type="radio" value="maybe" id="<?php echo $button3; ?>" />
                                                                         <label for="<?php echo $button3; ?>">MAYBE</label>
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
                                                                                                    $res = $coll->update(array('blood_event.username' =>$event_name),array('$set'=>array('blood_event.attendyes' => intval($ctrl))));
                                                                                                    $res=$coll->update(array('blood_donor.username'=>$_SESSION['username']),array('$push'=>array('blood_donor.respondedeventyes'=>$event_name)));
                                                                                                    
                                                                                          }
                                                                                          elseif ($_POST[$button1]=='no') {
                                                                                           
                                                                                           $ctrl=getNextSequence($no);
                                                                                                      $res = $coll->update(array('blood_event.username' =>$event_name),array('$set'=>array('blood_event.attendno' => intval($ctrl))));
                                                                                                      $res=$coll->update(array('blood_donor.username'=>$_SESSION['username']),array('$push'=>array('blood_donor.respondedeventno'=>$event_name)));
                                                                                          }
                                                                                          elseif ($_POST[$button1]=='maybe') {
                                                                                           
                                                                                           $ctrl=getNextSequence($maybe);
                                                                                                      $res = $coll->update(array('blood_event.username' =>$event_name),array('$set'=>array('blood_event.attendmaybe' => intval($ctrl))));
                                                                                                      $res=$coll->update(array('blood_donor.username'=>$_SESSION['username']),array('$push'=>array('blood_donor.respondedeventmaybe'=>$event_name)));
                                                                                          }
                                                                                 
                                                                                 $result=$coll->update(array("blood_donor.username"=>$_SESSION["username"]),array('$push'=>array("blood_donor.respondedbank"=>$event_name)));
                                                                                 echo "<script type='text/javascript'>alert('Thank You ! Your Response is Submitted !');window.location.href='dashboard.php';</script>";

                                                                                 }

                                                                    ?>

                                                          </div>
                                                          </form>
                                                         </div>
                                                    </li>
                                      <?php
                                               }
                                             
                                              }
                                    ?>
                                           </ul> 



        <?php
   }

   ?>                                                                   

     </div>
   </div>  

   