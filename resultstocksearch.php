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
           $_SESSION['state']=$_POST['state'];
           $_SESSION['city']=$_POST['city'];
                   $res=$coll->find(array("blood_bank.state"=>$_SESSION['state'],"blood_bank.city"=>$_SESSION['city']));

                   //$total=$res.count();

                  // if($total > 0)

                   //{

                        ?>
                                <h5 style="text-align:center;color:#d32f2f;">Available Blood Stock</h5><hr style="width:10%;color:#ff0000;">
                                <h5 style="text-align:center;color:#000000;"><?php echo $_POST['city']." ( ".$_POST['state']." )"; ?> </h5><hr style="width:10%;color:#ff0000;">

                                <table style="border:1px solid #000000;">
                                <tr>
                                  
                                   <th>Blood Bank Name</th>
                                   <th>A+</th>
                                   <th>A-</th>
                                   <th>B+</th>
                                   <th>B-</th>
                                   <th>AB+</th>
                                   <th>AB-</th>
                                   <th>O+</th>
                                   <th>O-</th>
                                   <th>Red-Cell Concentrate</th>
                                   <th>F.F Plasma</th>
                                   <th>TOTAL</th>
                                   <th>Last Updated on</th>
                                   

                                </tr>
                   <?php

                          foreach ($res as $obj) {
                                
                                     
                                    $apositive=$apositive + $obj['blood_bank']['A+'];
                                   $anegative=$anegative + $obj['blood_bank']['A-'];
                                   $bpositive=$bpositive + $obj['blood_bank']['B+'];
                                   $bnegative=$benegative + $obj['blood_bank']['B-'];
                                   $abpositive=$abpositive + $obj['blood_bank']['AB+'];
                                   $abnegative=$abnegative + $obj['blood_bank']['AB-'];
                                   $opositive=$opositive + $obj['blood_bank']['O+'];
                                   $onegative=$onegative + $obj['blood_bank']['O-'];
                                   $rcc=$rcc + $obj['blood_bank']['rcc'];
                                   $ffp=$ffp + $obj['blood_bank']['ffp'];
                                   $total= $total + $obj['blood_bank']['total'];

                                    echo "<tr>";
                                  
                                   echo "<td>".$obj['blood_bank']['bname']."</td>";
                                   echo "<td>".$obj['blood_bank']['A+']."</td>";
                                   echo "<td>".$obj['blood_bank']['A-']."</td>";
                                   echo "<td>".$obj['blood_bank']['B+']."</td>";
                                   echo "<td>".$obj['blood_bank']['B-']."</td>";
                                   echo "<td>".$obj['blood_bank']['AB+']."</td>";
                                   echo "<td>".$obj['blood_bank']['AB-']."</td>";
                                   echo "<td>".$obj['blood_bank']['O+']."</td>";
                                   echo "<td>".$obj['blood_bank']['O-']."</td>";
                                   echo "<td>".$obj['blood_bank']['rcc']."</td>";
                                   echo "<td>".$obj['blood_bank']['ffp']."</td>";
                                   echo "<td>".$obj['blood_bank']['total']."</td>";
                                   echo "<td>".$obj['blood_bank']['sed']."</td>";
                                   

                                    echo "</tr>";





                              }    
                               echo "<tr><b>";
                                  echo  "<td>TOTAL</td>";
                                   echo "<td>".$apositive."</td>";
                                   echo "<td>".$anegative."</td>";
                                   echo "<td>".$bpositive."</td>";
                                   echo "<td>".$bnegative."</td>";
                                   echo "<td>".$abpositive."</td>";
                                   echo "<td>".$abnegative."</td>";
                                   echo "<td>".$opositive."</td>";
                                   echo "<td>".$onegative."</td>";
                                   echo "<td>".$rcc."</td>";
                                   echo "<td>".$ffp."</td>";
                                   echo "<td>".$total."</td>";
                                   

                                    echo "</tr></b>";


                    ?>
                          </table>


                        <?php
//                   }



           ?> 




           
                  
                             

</div>
</div>

      
     
</div>

        
          

      <?php
        include('resourcesend.php');
      ?>
    
      </body>
  </html>
