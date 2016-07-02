<?php
 include("config.php");
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title></title>
	
	<style type="text/css">
	<!--
		@page { margin-left: 2cm; margin-right: 2cm; margin-top: 1.91cm; margin-bottom: 2cm }
		p { margin-bottom: 0.25cm; line-height: 120% }
		td p { margin-bottom: 0cm }
		a:link { so-language: zxx }
	-->
	</style>
</head>
<body lang="en-IN" dir="ltr"><br><br>
<p align="center" style="margin-bottom: 0cm; line-height: 100%"><font size="7" style="font-size: 36pt;">AidRed</font></p>
<p align="center" style="margin-bottom: 0cm; line-height: 100%"><font size="4" style="font-size: 14pt"><a href="http://www.aidred.com/">www.aidred.com</a></font></p>
<p align="center" style="margin-bottom: 0cm; line-height: 100%"><br></p>
<p align="center" style="margin-bottom: 0cm; line-height: 100%"><br></p>
<p align="center" style="margin-bottom: 0cm; line-height: 100%"><br></p>
	
<?php    
		

	    //$_SESSION['bloodgroup']="";
		if($_SESSION['state']=='select state' and $_SESSION['city']=='select city' and $_SESSION['bloodgroup']=='Choose Blood group')
		{

			$cursor = $coll->find(array("blood_donor.role"=>'donor'));//->sort($sort);
            $total=$cursor->count(); 
             if($total>0)
            {


       ?>
           <h3><center>Blood Donors From <?php echo "India" ?></center></h3>
    <div style="margin:20px;"><table width="100%" cellpadding="4" cellspacing="0" style="margin:0 auto;">
	<col width="85*">
	<col width="85*">
	<col width="85*">
	<tr valign="top">
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Name</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>State</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>City</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Blood
			Group</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Contact
			No.</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Email</b></font></p>
		</td>
	</tr>
	   <?php

	        foreach($cursor as $obj)
	        	 {
	                        echo "<tr valign='top'>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['name']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['state']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['city']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['bloodgroup']."</font></p>";
		echo "</td>";
		echo "<td  style='border: 1px solid #000000; padding: 0.1cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['mobileno']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['email']."</font></p>";
		echo "</td>";
	    echo "</tr>";   	 	
	        	 }echo "</table>";	
	        }
		}


		elseif($_SESSION['state']!='select state' and $_SESSION['city']=='select city' and $_SESSION['bloodgroup']=='Choose Blood group')
		{

			 $cursor = $coll->find(array('blood_donor.state' =>$_SESSION['state']));//->sort($sort);
             $total=$cursor->count(); 
             if($total>0)
            {


       ?>
           <h3><center>Blood Donors From <?php echo $_SESSION['state'] ?></center></h3>
       <table width="100%" cellpadding="4" cellspacing="0" style="margin:0 auto;">
	<col width="85*">
	<col width="85*">
	<col width="85*">
	<tr valign="top">
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Name</b></font></p>
		</td>
				<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>City</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Blood
			Group</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Contact
			No.</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Email</b></font></p>
		</td>
	</tr>
	   <?php

	        foreach($cursor as $obj)
	        	 {
	                        echo "<tr valign='top'>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['name']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['city']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['bloodgroup']."</font></p>";
		echo "</td>";
		echo "<td  style='border: 1px solid #000000; padding: 0.1cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['mobileno']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['email']."</font></p>";
		echo "</td>";
	    echo "</tr>";   	 	
	        	 }
	        }

		elseif($total==0)
		{
			 echo "<h3><center> No Blood Donors From " .$_SESSION['state']. "</center></h3>"; 
		}
			//echo "ok";
		}
	    elseif($_SESSION['state']!='select state' and $_SESSION['city']!='select city' and $_SESSION['bloodgroup']=='Choose Blood group') 
		{

			$cursor = $coll->find(array('blood_donor.state' =>$_SESSION['state'],'blood_donor.city' =>$_SESSION['city']));//->sort($sort);
            $total=$cursor->count(); 
             if($total>0)
            {


       ?>
           <h3><center>Blood Donors From <?php echo $_SESSION['city']."(".$_SESSION['state'].')'?></center></h3>
       <table width="100%" cellpadding="4" cellspacing="0" style="margin:0 auto;">
	<col width="85*">
	<col width="85*">
	<col width="85*">
	<tr valign="top">
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Name</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Blood
			Group</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Contact
			No.</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Email</b></font></p>
		</td>
	</tr>
	   <?php

	        foreach($cursor as $obj)
	        	 {
	                        echo "<tr valign='top'>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['name']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['bloodgroup']."</font></p>";
		echo "</td>";
		echo "<td  style='border: 1px solid #000000; padding: 0.1cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['mobileno']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['email']."</font></p>";
		echo "</td>";
	    echo "</tr>";   	 	
	        	 }
	        }

	        elseif($total==0)
		{
			 echo "<h3><center> No Blood Donors From " .$_SESSION['city']. "</center></h3>"; 
		}

		}

		elseif($_SESSION['state']!='select state' and $_SESSION['city']!='select city' and $_SESSION['bloodgroup']!='Choose Blood group')
		{
             $cursor = $coll->find(array('blood_donor.state' =>$_SESSION['state'],'blood_donor.city' =>$_SESSION['city'],'blood_donor.bloodgroup' =>$_SESSION['bloodgroup']));  
             $total=$cursor->count(); 
             if($total>0)
            {


       ?>
           <h3><center>Blood Donors With Blood Group <?php echo $_SESSION['bloodgroup'] ?></center></h3>
       <table width="100%" cellpadding="4" cellspacing="0" style="margin:0 auto;">
	<col width="85*">
	<col width="85*">
	<col width="85*">
	<tr valign="top">
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Name</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>State</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>City</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Contact
			No.</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Email</b></font></p>
		</td>
	</tr>
	   <?php

	        foreach($cursor as $obj)
	        	 {
	                        echo "<tr valign='top'>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['name']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['state']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['city']."</font></p>";
		echo "</td>";
		echo "<td  style='border: 1px solid #000000; padding: 0.1cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['mobileno']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 12pt'>".$obj['blood_donor']['email']."</font></p>";
		echo "</td>";
	    echo "</tr>";   	 	
	        	 }
	        }

	    elseif($total==0)
		{
			 echo "<h3><center> No Blood Donors With Blood Group " .$_SESSION['bloodgroup']." In " .$_SESSION['city']."(".$_SESSION['state'].").</center></h3>"; 
		}
		}

		elseif($_SESSION['state']=='select state' and $_SESSION['city']=='select city' and $_SESSION['bloodgroup']!='Choose Blood group')
		{

			$cursor = $coll->find(array('blood_donor.bloodgroup' =>$_SESSION['bloodgroup']));//->sort($sort);
            $total=$cursor->count(); 
             if($total>0)
            {


       ?>
          <?php echo "<h3><center>Blood Donors From India With Blood Group " .$_SESSION['bloodgroup']. "</center></h3>"; ?>
    <div style="margin:20px;"><table width="100%" cellpadding="4" cellspacing="0" style="margin:0 auto;">
	<col width="85*">
	<col width="85*">
	<col width="85*">
	<tr valign="top">
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Name</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>State</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>City</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Contact
			No.</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Email</b></font></p>
		</td>
	</tr>
	   <?php

	        foreach($cursor as $obj)
	        	 {
	                        echo "<tr valign='top'>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['name']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['state']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['city']."</font></p>";
		echo "</td>";	
		echo "<td  style='border: 1px solid #000000; padding: 0.1cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['mobileno']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['email']."</font></p>";
		echo "</td>";
	    echo "</tr>";   	 	
	        	 }	
	        }

	    elseif($total==0)
		{
			 echo "<h3><center> No Blood Donors With Blood Group " .$_SESSION['bloodgroup']." In India</center></h3>"; 
		}
		}

		elseif($_SESSION['state']!='select state' and $_SESSION['city']=='select city' and $_SESSION['bloodgroup']!='Choose Blood group')
		{

			$cursor = $coll->find(array('blood_donor.state' =>$_SESSION['state'],'blood_donor.bloodgroup' =>$_SESSION['bloodgroup']));//->sort($sort);
            $total=$cursor->count(); 
             if($total>0)
            {


       ?>
          <?php echo "<h3><center>Blood Donors From ".$_SESSION['state']. " With Blood Group " .$_SESSION['bloodgroup']. "</center></h3>"; ?>
    <div style="margin:20px;"><table width="100%" cellpadding="4" cellspacing="0" style="margin:0 auto;">
	<col width="85*">
	<col width="85*">
	<col width="85*">
	<tr valign="top">
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Name</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>State</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:15%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>City</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Contact
			No.</b></font></p>
		</td>
		<td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm;width:20%">
			<p align="center"><font size="2" style="font-size: 12pt"><b>Email</b></font></p>
		</td>
	</tr>
	   <?php

	        foreach($cursor as $obj)
	        	 {
	                        echo "<tr valign='top'>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['name']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['state']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['city']."</font></p>";
		echo "</td>";	
		echo "<td  style='border: 1px solid #000000; padding: 0.1cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['mobileno']."</font></p>";
		echo "</td>";
		echo "<td  style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm'>";
		echo "<p align='center'><font size='2' style='font-size: 10pt'>".$obj['blood_donor']['email']."</font></p>";
		echo "</td>";
	    echo "</tr>";   	 	
	        	 }	
	        }

	    elseif($total==0)
		{
			 echo "<h3><center> No Blood Donors With Blood Group " .$_SESSION['bloodgroup']." In ".$_SESSION['state']."</center></h3>"; 
		}
		}
	?>


</table>
<p align="center" style="margin-bottom: 0cm; line-height: 100%"><br>
</p>
</body>
</html>
