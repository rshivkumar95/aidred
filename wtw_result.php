<?php
  //session_start();
include_once("config.php");
         
?>


<!DOCTYPE html>
  <html>
    <head>
      <?php
        include('resources.php');
      ?>
      <style type="text/css">
           th{
            border:1px solid #000000;
            background: #d32f2f;
            color:#ffffff;
            text-align:center;           }
           td{
            background: #ffffff;
            color:#000000;
            border:1px solid #000000;
           }

      </style>
    </head>

    <body style="background:url('img/back.jpg');">
  
    
    <?php
        include('navbar.php');
    ?>

  
 




  <div class="container" style="background:#ffffff;margin-top:15px;border-radius: 15px 50px;width:80%;">
      
    
	  <div class="row">
	  <div class="col s12 " style="background:#ffffff;padding:50px;" >
           <?php
          // $_SESSION['state']=$_POST['state'];
           //$_SESSION['city']=$_POST['city'];
                   $res=$coll->find(array("blood_request.state"=>$_SESSION['state'],"blood_request.city"=>$_SESSION['city']));

                   //$total=$res.count();

                  // if($total > 0)

                   //{

                        ?>
                                <h5 style="text-align:center;color:#d32f2f;">REQUEST REPORT !</h5><hr style="width:10%;color:#ff0000;">
                                <h5 style="text-align:center;color:#000000;"><?php echo $_SESSION['city']." ( ".$_SESSION['state']." )"; ?> </h5><hr style="width:10%;color:#ff0000;">

                                <table style="border:1px solid #000000;">
                                <tr>
                                  
                                   <th>Name of Patient</th>
                                   <th>Taken From</th>
                                   <th>Last Date of Request</th>
                                   
                                   

                                </tr>
                   <?php

                          foreach ($res as $obj) {
                                
                                     
                                   

                                    echo "<tr>";
                                  
                                   echo "<td>".$obj['blood_request']['pname']."</td>";
                                   echo "<td>".implode(",",$obj['blood_request']['takenfrom'])."</td>";
                                   echo "<td>".$obj['blood_request']['ldate']."</td>";
                                   
                                   

                                    echo "</tr>";





                              }    
                               

                    ?>
                          </table>


                        <?php
//                   }



           ?> 




           
                  
                             

</div>
</div>

      
     
</div>

        <br>
        <br><br><br><br><br><br>          

      <?php
        include('resourcesend.php');
      ?>
    
      </body>
  </html>
