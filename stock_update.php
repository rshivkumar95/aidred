<?php
include_once("config.php");	
$res1=1;
   if($_SESSION['loggedIn']==0){
        header("Location: login.php");
}
else{
      $_SESSION['loggedIn']=1;


      $data=$coll->find(array('blood_bank.username' =>$_SESSION['username']));
foreach($data as $obj)
{
  $apositive=$obj['blood_bank']['A+'];
  $anegative=$obj['blood_bank']['A-'];
  $bpositive=$obj['blood_bank']['B+'];
  $bnegative=$obj['blood_bank']['B-'];
  $abpositive=$obj['blood_bank']['AB+'];
  $abnegative=$obj['blood_bank']['AB-'];
  $opositive=$obj['blood_bank']['O+'];
  $onegative=$obj['blood_bank']['O-'];
  $rcc=$obj['blood_bank']['rcc'];
  $ffp=$obj['blood_bank']['ffp'];  
}   
if(isset($_POST["submit"]))   
{ 
try 
{   

     
         $newapositive=intval($_POST['A+']);
         $newanegative=intval($_POST['A-']);
         $newbpositive=intval($_POST['B+']);
         $newbnegative=intval($_POST['B-']);
         $newabpositive=intval($_POST['AB+']);
         $newabnegative=intval($_POST['AB-']);
         $newonegative=intval($_POST['O-']);
         $newopositive=intval($_POST['O+']);
         $newrcc=intval($_POST['rcc']);
         $newffp=intval($_POST['ffp']);         

   if($newpositive<0 and $newnegative<0 and $newbpositive<0 and $newbnegative<0 and $newabpositive<0 and $newabnegative<0 and $newonegative<0 and $onegative<0 and $newopositive<0 and $newrcc<0 and $newffp<0)
   {
  
          $res1=0;
         $msg1="Stock value can not be negative !";
        
    }
    else
    {
       $total=$_POST["A+"]+$_POST["B+"]+$_POST["A-"]+$_POST["B-"]+$_POST["AB+"]+$_POST["AB-"]+$_POST["O+"]+$_POST["O-"]+$_POST["rcc"]+$_POST["ffp"];
         $res = $coll->update(array('blood_bank.username'=>$_SESSION['username']),array('$set'=> array('blood_bank.A+' => $newapositive,'blood_bank.A-' =>$newanegative,'blood_bank.AB+' => $newabpositive,'blood_bank.AB-' => $newabnegative,'blood_bank.B+' =>$newbpositive,'blood_bank.B-' => $newbnegative,'blood_bank.O+' => $newopositive,'blood_bank.O-' =>$newonegative,'blood_bank.rcc' => $newrcc,'blood_bank.ffp' => $newffp,'blood_bank.sed'=>date("y-m-d"),'blood_bank.total'=>intval($total))));
         
         if($res)   {
                    echo "<script type='text/javascript'>alert('Your details are updated !');
                    window.location.href='dashboard.php';</script>";       // header("Location: dashboard.php");
                    $_SESSION["loggedIn"]=1;         
          }

    }
}
catch (MongoConnectionException $e)
{
  //if there was an errand,we catch and display the problem here
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
                               <h6 align="left" id="error" style="color:red;"><? if(!$res1):echo $msg1; endif; ?></h6>

                      <div class="row">
                              

                       <form name="bankmodify" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
                                   <div class="row">
                                   <div class="input-field col s2">
                                      <input  id="A+" name="A+" value="<?php echo $apositive ?>" type="number" min="0">
                                      <label for="A+">A+ </label>
                                    </div>
                                    <div class="input-field col s2">
                                      <input  id="A-" name="A-" value="<?php echo $anegative ?>" type="number" min="0">
                                      <label for="A-">A- </label>
                                    </div>
                                    <div class="input-field col s2">
                                      <input  id="B+" name="B+" value="<?php echo $bpositive ?>" type="number" min="0">
                                      <label for="B+">B+ </label>
                                    </div>
                                    <div class="input-field col s2">
                                      <input  id="B-" name="B-" value="<?php echo $bnegative ?>" type="number" min="0">
                                      <label for="B-">B- </label>
                                    </div>

                                   </div>
                                   <div class="row">
        
                                   <div class="input-field col s2">
                                      <input  id="AB+" name="AB+" value="<?php echo $abpositive ?>" type="number" min="0">
                                      <label for="AB+">AB+ </label>
                                    </div>
                                    <div class="input-field col s2">
                                      <input  id="AB-" name="AB-" value="<?php echo $abnegative ?>" type="number" min="0">
                                      <label for="AB-">AB- </label>
                                    </div>
                                    <div class="input-field col s2">
                                      <input  id="O+" name="O+" value="<?php echo $opositive ?>" type="number" min="0">
                                      <label for="O+">O+ </label>
                                    </div>
                                    <div class="input-field col s2">
                                      <input  id="B-" name="O-" value="<?php echo $onegative ?>" type="number" min="0">
                                      <label for="B-">O- </label>
                                    </div>

                                   </div>
                                   <div class="row" style="text-align:center;">
        
                                   <div class="input-field col s6">
                                      <input  id="rcc" name="rcc" value="<?php echo $rcc ?>" type="number" min="0">
                                      <label for="rcc">Red Cell Concentrate</label>
                                    </div>
                                    <div class="input-field col s6">
                                      <input  id="ffp" name="ffp" value="<?php echo $ffp ?>" type="number" min="0">
                                      <label for="ffp">F.F. Plasma</label>
                                    </div>
                                    

                                   </div>

                                    <div class="row">
                                         <div class="input-field col s12">  <center>
                                            <button class="btn waves-effect waves-light" type="submit" name="submit">
                                            UPDATE
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
